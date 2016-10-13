(function($){

    App.module.controller("entry", function($scope, $rootScope, $http, $timeout, Contentfields){

        var collection = COLLECTION,
            entry      = COLLECTION_ENTRY || {},
            locales    = LOCALES || [];

        if (typeof COLLECTION != 'undefined') {
            if (COLLECTION.singlePath) {
                if (COLLECTION_ENTRY != null) {
                    window.COCKPIT_MEDIA_BASE_URL = '/uploads/'+COLLECTION_ENTRY["_id"];
                }
            }
        }
        
        // init entry and its fields
        if (collection.fields && collection.fields.length) {

            collection.fields.forEach(function(field){

                // default values
                if (!entry["_id"] && field["default"]) {
                    if (field.type === "boolean") {
                        if ((field["default"] === 0 || field['default'].toLowerCase() === "false")) {
                            entry[field.name] = false;
                        }
                        if ((field["default"] === 1 || field['default'].toLowerCase() === "true")) {
                            entry[field.name] = true;
                        }
                    } else {
                        entry[field.name] = field["default"];
                    }
                }

                // localize fields
                if (locales.length && field["localize"]) {

                    if (!entry[field.name]) {
                        entry[field.name] = '';
                    }


                    locales.forEach(function(locale){
                        if (!entry[field.name+'_'+locale]) {
                            entry[field.name+'_'+locale] = '';
                        }
                    });

                    $scope.hasLocals = true;
                }
            });
        }

        $scope.collection = collection;
        $scope.entry      = entry;
        $scope.versions   = [];
        $scope.locales    = locales;
        $scope.locale     = '';

        if (locales.length) {
            $scope.$watch('locale', function(newValue, oldValue){
                if (newValue !== oldValue) $scope.collection = angular.copy($scope.collection);
            });
        }

        $scope.loadVersions = function() {

            if (!$scope.entry["_id"]) {
                return;
            }

            $http.post(App.route("/api/collections/getVersions"), {"id":$scope.entry["_id"], "colId":$scope.collection["_id"]}).success(function(data){

                if (data) {
                    $scope.versions = data;
                }

            }).error(App.module.callbacks.error.http);
        };

        $scope.clearVersions = function() {

            if (!$scope.entry["_id"]) {
                return;
            }

            App.Ui.confirm(App.i18n.get("Are you sure?"), function(){

                $http.post(App.route("/api/collections/clearVersions"), {"id":$scope.entry["_id"], "colId":$scope.collection["_id"]}).success(function(data){
                    $timeout(function(){
                        $scope.versions = [];
                        App.notify(App.i18n.get("Version history cleared!"), "success");
                    }, 0);
                }).error(App.module.callbacks.error.http);
            });
        };

        $scope.restoreVersion = function(versionId) {

            if (!versionId || !$scope.entry["_id"]) {
                return;
            }


            App.Ui.confirm(App.i18n.get("Are you sure?"), function(){

                var msg = UIkit.notify(['<i class="uk-icon-spinner uk-icon-spin"></i>', App.i18n.get("Restoring version...")].join(" "), {timeout:0});

                $http.post(App.route("/api/collections/restoreVersion"), {"docId":$scope.entry["_id"], "colId":$scope.collection["_id"],"versionId":versionId}).success(function(data){

                    setTimeout(function(){
                        msg.close();
                        location.href = App.route("/collections/entry/"+$scope.collection["_id"]+'/'+$scope.entry["_id"]);
                    }, 1000);
                }).error(App.module.callbacks.error.http);
            });
        };

        $scope.save = function(){

            var entry = angular.copy($scope.entry);
            
            if ($scope.validateForm(entry)) {
                $http.post(App.route("/api/collections/saveentry"), {"collection": collection, "entry":entry, "createversion": false}).success(function(data){

                    if (data && Object.keys(data).length) {
                        
                        var site_base  = COCKPIT_SITE_BASE_URL.replace(/^\/+|\/+$/g, ""),
                            media_base = COCKPIT_MEDIA_BASE_URL.replace(/^\/+|\/+$/g, ""),
                            site2media = media_base.replace(site_base, "").replace(/^\/+|\/+$/g, "");
                        
                        for (var i = 0; i < collection.fields.length; i++) {
                            if (collection.fields[i]['type'] == "photopicker") {
                                var name = collection.fields[i]['name'];
                                
                                var temp_dirs = {};
                                var to_remove = [];
                                for (var j = 0; j < data[name].length; j++) {
                                    if (data[name][j]["removed"] == true) {
                                        to_remove.push(data[name][j]["path"]);
                                        data[name].splice(j, 1);
                                        j--;
                                        continue;
                                    }
                                    
                                    if (typeof data[name][j]["temp_folder"] == "undefined") data[name][j]["temp_folder"] = "";
                                    
                                    if (data[name][j]["temp_folder"] != "") {
                                        var temp_folder = data[name][j]["temp_folder"];
                                        var file = data[name][j]["path"].replace(temp_folder, "").replace(/^\/+|\/+$/g, "");
                                        if (typeof temp_dirs[temp_folder] == "undefined") {
                                            temp_dirs[temp_folder] = {
                                                "path": temp_folder,
                                                "dest": 'site:'+['uploads', data["_id"]].join('/').replace(/^\/+|\/+$/g, ""),
                                                "files": [],
                                                "remove_source_dir": true
                                            };
                                        }
                                        temp_dirs[temp_folder]["files"].push(file);
                                        
                                        data[name][j]["path"] = [temp_dirs[temp_folder]["dest"], file].join('/').replace(/^\/+|\/+$/g, "");
                                        data[name][j]["temp_folder"] = "";
                                    }
                              
                                }
                                
                                if (to_remove.length > 0) {
                                    var options = {
                                        "cmd":"removefiles",
                                        "paths": to_remove
                                    };

                                    $.post(App.route('/mediamanager/api'), options);
                                }
                                
                                $.each(temp_dirs, function(i, e) {
                                    var options = {
                                        "cmd":"movefiles",
                                        "path": e.path,
                                        "dest": e.dest,
                                        "files": e.files,
                                        "remove_source_dir": e.remove_source_dir
                                    };

                                    $.post(App.route('/mediamanager/api'), options);
                                    
                                });
                                       
                            }
                        }
                        
                        $http.post(App.route("/api/collections/saveentry"), {"collection": collection, "entry":data, "createversion": true}).success(function(data){
                            $scope.entry = data;
                            if (!$scope.$$phase) $scope.$apply();
                            COLLECTION_ENTRY = data;
                            window.COCKPIT_MEDIA_BASE_URL = '/uploads/'+COLLECTION_ENTRY["_id"];
                            App.notify(App.i18n.get("Запись сохранена"), "success");

                            $scope.loadVersions();
                        });
                    }

                }).error(App.module.callbacks.error.http);
            }
        };

        $scope.getFieldname = function(field) {
            return $scope.locale && field.localize ? field.name + '_' + $scope.locale : field.name;
        };

        $scope.validateForm = function(entry){
            var valid = true;

            $scope.collection.fields.forEach(function(field){
                delete field.error;
                if (field.required && (entry[field.name] === undefined || entry[field.name] === '')) {
                    field.error = App.i18n.get('This field is required.');
                    valid = false;
                }
            });

            return valid;
        };

        $scope.fieldsInArea = function(area) {
            // main - это общая таба
            // side - это справа
            // другое - это если совпадает с именем таба
            
            // если табов нет, то применяем классическую схему

            var fields = [], aside = ['select','date','time','media','boolean','tags','region'];
            
            var tabs = $scope.collection.tabs;
            var show_tabs = true;
            if (typeof tabs == "undefined" || tabs.length == 0) show_tabs = false;
            else {
                var t = tabs;
                tabs = ['main', 'side'];
                for (var i = 0; i < t.length; ++i) {
                    tabs.push(t[i].name);
                }
            }
            
            if (!show_tabs) {
                if (area=="main") {
                    fields = $scope.collection.fields.filter(function(field){
                        return aside.indexOf(field.type) == -1;
                    });
                }
                else if (area=="side"){
                    fields = $scope.collection.fields.filter(function(field){
                        return aside.indexOf(field.type) > -1;
                    });
                }
            } else {
                if (area=="main") {
                    fields = $scope.collection.fields.filter(function(field){
                        var tab = field.tab;
                        if (tab == "main" || tab == "" || typeof tab == "undefined" || tabs.indexOf(tab) == -1) return 1;
                        return 0;
                    });
                } else {
                    fields = $scope.collection.fields.filter(function(field){
                        var tab = field.tab;
                        if (tab == area) return 1;
                        return 0;
                    });
                }
            }
            return fields;
        };

        $scope.loadVersions();


        // bind clobal command + save
        Mousetrap.bindGlobal(['command+s', 'ctrl+s'], function(e) {
            if (e.preventDefault) {
                e.preventDefault();
            } else {
                e.returnValue = false; // ie
            }
            $scope.save();
            return false;
        });

    });

})(jQuery);

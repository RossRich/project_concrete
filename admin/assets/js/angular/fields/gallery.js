/**
 * Gallery field.
 */

(function($){

    angular.module('cockpit.fields').directive("gallery", ['$timeout', function($timeout){

        return {

            restrict: 'E',
            require: 'ngModel',
            scope: {
                images: '@'
            },
            templateUrl: App.base('/assets/js/angular/fields/tpl/gallery.html'),

            link: function (scope, elm, attrs, ngModel) {

                $timeout(function(){
                    
                    if (typeof ngModel.$viewValue == "undefined") ngModel.$viewValue = [];
                    
                    if (ngModel.$viewValue == 0) {
                        scope.images = [];
                    } else {
                        scope.images = ngModel.$viewValue.slice();
                        //ngModel.$viewValue = [];
                    }                    

                    scope.pickImage = function(){
                        
                        App.assets.require(window.CockpitPathPicker ? [] : 'modules/core/Mediamanager/assets/pathpicker.js', function() {

                            new CockpitPathPicker(function(path){
                                
                                var site_base  = COCKPIT_SITE_BASE_URL.replace(/^\/+|\/+$/g, ""),
                                    media_base = COCKPIT_MEDIA_BASE_URL.replace(/^\/+|\/+$/g, ""),
                                    site2media = media_base.replace(site_base, "").replace(/^\/+|\/+$/g, "");

                                if(String(path).match(/\.(jpg|jpeg|png|gif|mp4|mpeg|webm|ogv|wmv)$/i)){

                                    scope.images.push({"path":path, "title":""});
                                    ngModel.$viewValue.push({"path":path, "title":""});
                                    App.notify(App.i18n.get("%s media file(s) added", 1));

                                    if (!scope.$$phase) scope.$apply();

                                } else {
                                    
                                    var options = {
                                        "cmd":"ls",
                                        "path": String(path).replace("site:"+site2media, "")
                                    };
                                    
                                    if (typeof COLLECTION != 'undefined' && COLLECTION.singlePath) {
                                        if (COLLECTION_ENTRY != null) {
                                            options.mode = "entry";
                                            options.entry_id = COLLECTION_ENTRY["_id"];                    
                                        }
                                    }

                                    $.post(App.route('/mediamanager/api'), options, function(data){

                                        var count = 0;

                                        if (data && data.files && data.files.length) {

                                            data.files.forEach(function(file) {

                                                if(file.name.match(/\.(jpg|jpeg|png|gif|mp4|mpeg|webm|ogv|wmv)$/i)) {
                                                    scope.images.push({"path":("site:"+site2media+'/'+file.path), "title":""});
                                                    ngModel.$viewValue.push({"path":("site:"+site2media+'/'+file.path), "title":""});
                                                    count = count + 1;
                                                }
                                            });

                                            if (!scope.$$phase) scope.$apply();
                                        }

                                        App.notify(App.i18n.get("%s media file(s) added", count));

                                    }, "json");
                                }

                            }, "*");
                        });
                    };

                    scope.removeImage = function(index) {
                        scope.images.splice(index, 1);
                        ngModel.$viewValue.splice(index, 1);
                        //if (!scope.$$phase) scope.$apply();
                        //scope.images = [];
                        //ngModel.$viewValue = [];
                    };

                    scope.emptyGallery = function() {

                        App.Ui.confirm(App.i18n.get("Are you sure?"), function(){
                            scope.images = [];
                            ngModel.$viewValue = [];
                            if (!scope.$$phase) scope.$apply();
                        });
                    };

                    scope.updateTitle = function(img) {

                        var title = prompt(App.i18n.get("Title"), img.title);

                        if (title!==null) {

                            img.title = title;
                        }
                    };


                    App.assets.require(UIkit.sortable ? []:['assets/vendor/uikit/js/components/sortable.min.js'], function(){

                        var $list = elm.find('.uk-grid').on("change.uk.sortable",function(e, sortable, ele){

                            ele = angular.element(ele);

                            $timeout(function(){
                                //scope.images = [];
                                //ngModel.$viewValue = [];
                                scope.images.splice(ele.index(), 0, scope.images.splice(scope.images.indexOf(ele.scope().img), 1)[0]);
                                ngModel.$viewValue = scope.images.slice();
                                if (!scope.$$phase) scope.$apply();
								//ngModel.$viewValue.splice(scope.images);
                            });
                        });

                        UIkit.sortable($list);
                    });

                    scope.$watch('images', function() {

                        //ngModel.$setViewValue(scope.images);

                        if (!scope.$root.$$phase) {
                            scope.$apply();
                        }
                    });
                });
            }
        };

    }]);

})(jQuery);

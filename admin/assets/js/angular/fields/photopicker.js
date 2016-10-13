/**
 * Gallery field.
 */

(function($){

    angular.module('cockpit.fields').directive("photopicker", ['$timeout', function($timeout){

        return {

            restrict: 'E',
            require: 'ngModel',
            scope: {
                images: "=ngModel",
            },
            templateUrl: App.base('/assets/js/angular/fields/tpl/photopicker.html'),

            link: function (scope, elm, attrs, ngModel) {

                $timeout(function(){
                    
                    if (!angular.isArray(scope.images)) {
                        scope.images = [];
                    }
                    
                    var site_base  = COCKPIT_SITE_BASE_URL.replace(/^\/+|\/+$/g, ""),
                        media_base = COCKPIT_MEDIA_BASE_URL.replace(/^\/+|\/+$/g, ""),
                        site2media = media_base.replace(site_base, "").replace(/^\/+|\/+$/g, "");
                    
                    /*
                    var getImageSize = function(img) {
                        var url = img.path.replace("site:", COCKPIT_SITE_BASE_URL);
                        var image = new Image();
                        image.link = img;
                        image.onload = function() {
                            this.link.width = this.width;
                            this.link.height = this.height;
                            if (!scope.$$phase) scope.$apply();
                        }
                        image.src = url;
                    }
                    
                    for (img in scope.images) {
                        getImageSize(scope.images[img]);
                    }
                    */
                    
                    App.assets.require(UIkit.Utils.xhrupload ? [] : ['assets/vendor/uikit/js/components/upload.min.js'], function() {
                        var uploadsettings = {
                            "action": App.route('/mediamanager/api'),
                            "single": true,
                            "params": {"cmd":"upload", "mode":"temp_folder", "uniq": "true"},
                            "before": function(o) {
                                if (typeof scope.temp_folder != "undefined") {
                                    o.params["path"] = scope.temp_folder;
                                }
                            },
                            "loadstart": function(){
                                var loader = elm.find(".photo-loader");
                                var progressBar = loader.find(".uk-progress-bar");
                                loader.removeClass("uk-hidden");                                
                                progressBar.css("width", "5%");
                                progressBar.text("0%");
                            },
                            "progress": function(percent){
                                if (percent == 100) percent = 99;
                                var loader = elm.find(".photo-loader");
                                var progressBar = loader.find(".uk-progress-bar");
                                progressBar.css("width", percent+"%");
                                progressBar.text(percent+"%");
                            },
                            "complete": function(response) {
                                response = $.parseJSON(response);
                                if (response && response.path) {
                                    scope.temp_folder = response.path;
                                }
                                
                                if (response && response.uploaded && response.uploaded.length) {
                                    for (var i = 0; i < response.uploaded.length; i++) {
                                        var mediapath = 'site:'+[site2media, response.path, response.uploaded[i]].join('/').replace(/^\/+|\/+$/g, "");
                                        var temp_folder = 'site:'+[site2media, response.path].join('/').replace(/^\/+|\/+$/g, "");
                                        var image = {
                                            "path": mediapath,
                                            "title": "",
                                            "folder": "",
                                            temp_folder: temp_folder
                                        };                                        
                                        scope.images.push(image);
                                        //var index = scope.images.push(image);
                                        //getImageSize(scope.images[index - 1]);
                                    }
                                    if (!scope.$$phase) {
                                        scope.$apply();
                                    }
                                }
                            },
                            "allcomplete": function(response){
                                var loader = elm.find(".photo-loader");
                                var progressBar = loader.find(".uk-progress-bar");
                                progressBar.css("width", "100%");
                                progressBar.text("100%");
                                loader.addClass("uk-hidden");
                            }
                        };
                        var uploadselect = new UIkit.uploadSelect(elm.find('input.js-upload-select'), uploadsettings);
                    });


                        
                        // Создать уникальную временную папку
                        // Открыть окно выбора файлов на локальном компьютере
                        // Сохранять файлы во временную папку
                        // При сохранении записи:
                        // Если запись вновь создаваемая, то создать папку для записи
                        // Сихнранизировать постоянную и временную папку:
                        // Лишние файлы из постоянной папки удалить
                        // Файлы из временной папки переместить в постоянную, при этом
                        // изменить пути в массиве
                        
                        // Модуль галереи ответственнен за отображение изображений в форме записи
                        // Модуль медиаменеджера ответственнен за загрузку файлов, создание временно папки и синхранизации
                        
                        ///////////////////
                                                                
                    scope.getUrl = function(img) {
                        return img.path.replace("site:", COCKPIT_SITE_BASE_URL);
                    }
                    
                    scope.removeImage = function(index) {
                        scope.images[index]["removed"] = true;
                        if (!scope.$$phase) scope.$apply();
                    };

                    scope.emptyGallery = function() {

                        App.Ui.confirm(App.i18n.get("Are you sure?"), function(){
                            for (var i = 0; i < scope.images.length; i++) scope.images[i]["removed"] = true;
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
                                scope.images.splice(ele.index(), 0, scope.images.splice(scope.images.indexOf(ele.scope().img), 1)[0]);
                            });
                        });

                        UIkit.sortable($list);
                    });

                });
            }
        };

    }]);

})(jQuery);

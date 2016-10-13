(function($){
  
    angular.module('cockpit.fields').run(['Contentfields', function(Contentfields) {

        Contentfields.register('yamap', {
            label: 'Yandex map',
            template: function(model, options) {
              	//return '<ya-map ya-zoom="8" ya-center="[37.64,55.76]"></ya-map>';
                return '<yamap-field class="uk-width-1-1" options=\''+JSON.stringify(options.options || false)+'\' ng-model="'+model+'"></yamap>';
            }
        });

    }]);
 
  	angular.module('cockpit.fields').directive("yamapField", ['$timeout', function($timeout, yamapFieldCounter) {      	
 		return {
            require: 'ngModel',
            restrict: 'E',
            replace: true,
          	templateUrl: App.base('/modules/addons/yamap/assets/tpl/yamap.html'),
          	compile: function() {
                return {
                    pre: function(scope, elm, attrs, ngModel) {
                      	scope.templateFactory = false;
                        scope.balloonEdit = {
                            build: function (data) {
                                var BalloonContentLayout = scope.templateFactory.get('labelTpl');
                                BalloonContentLayout.superclass.build.call(this);
                              	this.htmlContainer = $(this._element);
                                this.htmlContainer.find('button[name=save]').bind('click', {$this: this}, this.onSaveClick);
                            },

                            clear: function () {
                                this.htmlContainer.find('button[name=save]').unbind('click', this.onSaveClick);
                                var BalloonContentLayout = scope.templateFactory.get('labelTpl');
                                BalloonContentLayout.superclass.clear.call(this);
                            },

                            onSaveClick: function (event) {
                              	var $this = event.data.$this;
                              	$this._data.properties._data.iconContent = $this.htmlContainer.find('[name=value]').val();
								scope.map.balloon.close();
                              	scope.$apply();
                              	return false;
                            }
                        };
                    },
                    post: function (scope, elm, attrs, ngModel) {
                        var geoObject = function(coord) {
                            this.point = {                  
                                geometry: {
                                    type: "Point",
                                    coordinates: coord
                                },
                                properties: {
                                    iconContent: "Новая точка"
                                }
                            };
                          	this.setTitle = function(title) {
                              	this.point.properties.iconContent = title;
                            };
                            this.setCoords = function(coords) {
                              	this.point.geometry.coordinates = coords;
                            };
                            this.getData = function() {
                              	return {
                                  	title: this.point.properties.iconContent,
                                  	coords: this.point.geometry.coordinates
                                };
                            };
                        };
                        var addMode = false;
                        scope.showLoader = true;
                        scope.addBtn = function(e) {
                            addMode = e.originalEvent.target._selected;
                        };
                        scope.addPoint = function(e) {
                            if (addMode) {
                                var coords = e.get('coords');
                                scope.geoObjects.push(new geoObject(coords));
                            }
                        };
                      	scope.moveCenter = function(e) {
                          	scope.center = e.get('newCenter');
                          	scope.zoom = e.get('newZoom');
                        }
                        scope.delPoint = function(e, i) {
                            scope.geoObjects.splice(i,1);
                        };
                      	scope.movePoint = function(objScope, index) {
                          	scope.geoObjects[index].setCoords(objScope.getCoord());
                        }
                      	
                        $timeout(function(){
                            if (!ngModel.$viewValue) {
                                ngModel.$setViewValue({
                                    geoObjects: [],
                                    zoom: 10,
                                    center: [37.64,55.76]
                                });
                            }
                          
                            scope.center = ngModel.$viewValue.center;
                            scope.zoom = ngModel.$viewValue.zoom;
                          
                          	scope.geoObjects = [];
                            for (var i in ngModel.$viewValue.geoObjects) {
                              	if (typeof ngModel.$viewValue.geoObjects[i].coords != 'undefined') {
                              		var obj = new geoObject(ngModel.$viewValue.geoObjects[i].coords);
                                  	if (typeof ngModel.$viewValue.geoObjects[i].title != 'undefined') obj.setTitle(ngModel.$viewValue.geoObjects[i].title);
                              		scope.geoObjects.push(obj);
                                }
                            }
                          
                            scope.$watch('center', function() {
                                var value = ngModel.$viewValue;
                                value.center = scope.center;
                                ngModel.$setViewValue(value);
                            });

                            scope.$watch('zoom', function() {
                                var value = ngModel.$viewValue;
                                value.zoom = scope.zoom;
                                ngModel.$setViewValue(value);
                            });

                            scope.$watch('geoObjects', function() {
                                var value = ngModel.$viewValue;
                                value.geoObjects = [];
                                for (var i in scope.geoObjects) {
                                  	value.geoObjects.push(scope.geoObjects[i].getData());
                                }
                                ngModel.$setViewValue(value);
                            }, true);
                        });                      
                      
                        scope.afterInit = function(map) {
                          	scope.map = map;
                          	map.setZoom(scope.zoom);
                            scope.showLoader = false;
                        };                      
                      
                    } // link
            	}
            } // compile
        }
    }]);
      
})(jQuery);
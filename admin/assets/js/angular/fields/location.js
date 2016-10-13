/**
 * Map field.
 */

(function($){

    angular.module('cockpit.fields').directive("locationfield", ['$timeout', '$compile', function($timeout, $compile){


        var uuid = 0;

        return {
            restrict    : 'EA',
            require     : '?ngModel',
            scope       : {latlng: '@'},
            replace     : true,
            template    : '<div>\
                                <div class="uk-form uk-form-icon uk-margin-small-bottom uk-width-1-1">\
                                    <i class="uk-icon-search"></i><input class="uk-width-1-1" placeholder="Для поиска координаты введите адрес включая город">\
                                </div>\
                                <div class="js-map" style="min-height:300px;"> \
                                Загрузка карты... \
                                </div> \
                                <div class="uk-text-small uk-margin-small-top">LAT: <span class="uk-text-muted">{{ latlng.lat }}</span> LNG: <span class="uk-text-muted">{{ latlng.lng }}</span> <input type="checkbox" /> Показывать объект на карте</div> \
                           </div>',
            link        : function (scope, elm, attrs, ngModel) {
                $timeout(function() {
                    var mapId = 'google-maps-location-'+(++uuid);
            
                    var point = new google.maps.LatLng(44.725374, 37.764201);
                    var activity = false;
            
                    ngModel.$render = function() {

                        try {

                            if (ngModel.$viewValue && ngModel.$viewValue.lat && ngModel.$viewValue.lng) {
                                point = new google.maps.LatLng(ngModel.$viewValue.lat, ngModel.$viewValue.lng);
                                activity = ngModel.$viewValue.active;
                            }

                        } catch(e) {}
                    };

                    ngModel.$render();
                                                                                     
                    elm.find('.js-map').attr('id', mapId);
                    map = new GMaps({
                        div: mapId,
                        lat: point.lat(),
                        lng: point.lng(),
                        zoom: 12
                  });
                    var marker = map.addMarker({
                        lat: point.lat(),
                        lng: point.lng(),
                        draggable: true
                    });
                    updateScope({lat: marker.getPosition().lat(), lng:marker.getPosition().lng()} );
                    updateScope2(activity);
        
                    google.maps.event.addListener(marker, 'dragend', function () {
                        activity = true;
                        var activity_input = elm.find('input')[1];
                        activity_input.checked = true;
                        updateScope({lat: marker.getPosition().lat(), lng:marker.getPosition().lng()} );
                        updateScope2(activity);
                    });
        
                    var input = elm.find('input')[0];
                    input.onkeypress = function(e) {
                        event = event || window.event;
                        if ((event.keyCode == 0xA)||(event.keyCode == 0xD)) {
                            if (event.preventDefault) {
                                event.preventDefault();
                            } else {
                                event.returnValue = false; // ie
                            }
                            activity = true;
                            var activity_input = elm.find('input')[1];
                            
                            var address = $(input).val().toLowerCase();
                            var nvrsk = address.indexOf('новороссйик');
                            var gel = address.indexOf('геленджик');
                            var anapa = address.indexOf('анапа');
                            
                            if (nvrsk == -1 && gel == -1 && anapa == -1) address = 'Новороссйиск ' + $(input).val();
                            
                            activity_input.checked = true;                            
                            map.removeMarkers();                            
                            GMaps.geocode({
                                address: address,
                                callback: function(results, status) {
                                    if (status=='OK') {
                                        var latlng = results[0].geometry.location;
                                        map.setCenter(latlng.lat(), latlng.lng());
                                        var marker = map.addMarker({
                                            lat: latlng.lat(),
                                            lng: latlng.lng(),
                                            draggable: true
                                        });
                                        updateScope({lat: marker.getPosition().lat(), lng:marker.getPosition().lng()} );
                                        updateScope2(activity);
                                        google.maps.event.addListener(marker, 'dragend', function () {
                                            updateScope({lat: marker.getPosition().lat(), lng:marker.getPosition().lng()} );
                                            updateScope2(activity);
                                        });
                                    }
                                }
                            });
                            return false;
                        } 
                    };
    
                    var activity_input = elm.find('input')[1];
                    if (activity) activity_input.checked = true; else activity_input.checked = false;
                    activity_input.onchange = function(event) {
                        event = event || window.event;
                        if (activity_input.checked) updateScope2(true); else updateScope2(false);
                    };
            
                });
                function updateScope(latlng) {

                    var value = ngModel.$viewValue;
                    if (typeof value == "undefined" || value == "") value = {};
                    value.lat = latlng.lat;
                    value.lng = latlng.lng;
                    ngModel.$setViewValue(value);

                    scope.latlng = value;

                    if (!scope.$root.$$phase) {
                        scope.$apply();
                    }
                }
                function updateScope2(activity) {

                    var value = ngModel.$viewValue;
                    if (typeof value == "undefined" || value == "") value = {};
                    value.active = activity;
                    ngModel.$setViewValue(value);

                    scope.latlng = value;

                    if (!scope.$root.$$phase) {
                        scope.$apply();
                    }
                }
            }
        };
    }]);

})(jQuery);

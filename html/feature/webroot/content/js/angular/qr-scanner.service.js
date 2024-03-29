(function(){
    'use strict';

    angular.module('feature')
        .service('qrScanner' , [
            function qrScanner() {
                var service = this;

                var listeners = [];

                service.isScanning = false;

                service.getIsScanning = function() {
                    return service.isScanning;
                };

                service.setIsScanning = function(bool) {
                    service.isScanning = bool;
                };

                service.setString = function(string) {
                    publish(string);
                };

                service.subscribe = function(callback) {
                    listeners.push(callback);
                };

                service.unsubscribe = function(callback) {
                    for( var i = 0; i < listeners.length; ++i){
                        if ( listeners[i] === callback) {
                            listeners.splice(i, 1);
                            --i;
                        }
                    }
                };

                function publish(string) {
                    listeners.forEach(function (listener) {
                        listener(string);
                    })
                }
            }
        ]);
})();
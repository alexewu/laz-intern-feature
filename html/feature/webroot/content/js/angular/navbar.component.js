(function() {

    var app = angular.module("feature");

    app.component("navbar", {
        templateUrl: 'feature/webroot/content/js/angular/navbar.html',
        controller: 'navbarController',
    });

    app.controller('navbarController', navbarController);

    function navbarController() {
        var ctrl = this;

    }
})();
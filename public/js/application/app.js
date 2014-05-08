"use strict";

(function () {
    var iimsApp = angular.module("iimsApp", []);

    iimsApp.config(["$interpolateProvider", function($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    }]);

    iimsApp.config(["$httpProvider", function ($httpProvider) {
        $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    }]);
})();
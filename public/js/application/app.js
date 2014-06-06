"use strict";

var _app = _app || {};

(function () {
    _app = angular.module("iimsApp", []);

    _app.config(["$interpolateProvider", function($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    }]);

    _app.config(["$httpProvider", function ($httpProvider) {
        $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    }]);
})();
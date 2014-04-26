"use strict";

(function () {
    var iimsApp = angular.module("iimsApp", []);

    iimsApp.config(["$interpolateProvider", function($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    }]);
})();
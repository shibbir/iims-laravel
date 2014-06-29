"use strict";

(function(app) {
    app.controller("BaseCtrl", ["$scope", function($scope) {

        $scope.isNumber = function(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        };
    }]);
})(_app);
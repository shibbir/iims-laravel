"use strict";

(function(app) {
    app.controller("SalesInvoiceCtrl", ["$scope", "apiService", "$http", function($scope, apiService, $http) {
        $scope.init = function() {
            $scope.categories = [];
            apiService.get("/categories").then(function(result) {
                if(result.data) {
                    angular.forEach(result.data, function(value, key) {
                        $scope.categories.push({
                            id: key,
                            title: value
                        });
                    });
                }
            });
        }();
    }]);
})(angular.module("iimsApp"));
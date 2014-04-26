"use strict";

(function(app) {
    app.controller("dashboardCtrl", ["$scope", "apiService", function($scope, apiService) {
        $scope.getOrganization = function() {
            apiService.call("/organization/", "GET").then(function(result) {
                $scope.organization = result;
            });
        }();
    }]);
})(angular.module("iimsApp"));
"use strict";

(function(app) {
    app.controller("dashboardCtrl", ["$scope", "apiService", "notifierService", function($scope, apiService, notifierService) {
        $scope.getOrganization = function() {
            apiService.call("/organizations/1", "GET").then(function(result) {
                $scope.organization = result;
            });
        }();
        $scope.updateOrganization = function() {
            apiService.call("/organizations/" + $scope.organization.id, $("form[name=OrganizationEditForm]").serialize(), "PATCH").then(function(result) {
                var response = {
                    responseType: result.responseType,
                    message: "Record updated successfully."
                };
                notifierService.notify(response);
            });
        };
    }]);
})(angular.module("iimsApp"));
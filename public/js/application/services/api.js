"use strict";

(function(app) {
    app.factory("apiService", [
        "$http", "$q", function($http, $q) {
            var get = function(url, config) {
                return $http.get(url, config);
            };
            var save = function(url, data, method) {
                var deferred = $q.defer();
                $http({
                    url: url,
                    method: method ? method : "POST",
                    data: data,
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
                    }
                }).success(function(result) {
                    deferred.resolve(result);
                }).error(function(result, status) {
                    deferred.reject(status);
                });
                return deferred.promise;
            };
            return {
                get: get,
                save: save
            };
        }
    ]);
})(angular.module("iimsApp"));
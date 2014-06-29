"use strict";

(function(app) {
    app.factory("customerService", ["apiService", function(apiService) {

        var findCustomerByQuery = function(query) {
            var config = {
                params: {
                    q: query
                }
            };
            return apiService.get("/customers", config);
        };

        return {
            findCustomerByQuery: findCustomerByQuery
        };
    }]);
})(_app);
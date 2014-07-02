"use strict";

(function(app) {
    app.factory("productService", ["apiService", function(apiService) {

        var verifyProductSerial = function(productId, serial) {
            return apiService.get("/products/" + productId + "/serial/" + serial);
        };

        return {
            verifyProductSerial: verifyProductSerial
        };
    }]);
})(_app);
"use strict";

(function(app) {
    app.controller("SalesInvoiceCtrl", ["$scope", "apiService", "notifierService", function($scope, apiService, notifierService) {
        $scope.init = function() {
            $scope.data = {};
            $scope.categories = [];
            $scope.cartItems = [];
            apiService.get("/categories/").success(function(result) {
                if(result) {
                    angular.forEach(result, function(value, key) {
                        $scope.categories.push({
                            id: key,
                            title: value
                        });
                    });
                    $scope.data.category = $scope.categories[0];
                    $scope.getProducts();
                }
            }).error(function() {
                notifierService.notifyError("Oops! Something happened.")
            });
        }();
        $scope.searchCustomer = function() {
            $scope.customerFetchingInProgress = true;
            var config = {
                params: {
                    q: $scope.data.customerSearchKey
                }
            };
            apiService.get("/customers/", config).then(function(result) {
                if(result.data.length) {
                    $scope.customer = result.data[0];
                }
                else {
                    notifierService.notifyError("Customer not found!");
                    $scope.customer = {};
                }
                $scope.customerFetchingInProgress = false;
            });
        };
        $scope.isAlreadyAddedToCart = function(item) {
            var productExistsInCart = false;
            for(var index = 0; index < $scope.cartItems.length; index++) {
                if($scope.cartItems[index].id === item.id) {
                    productExistsInCart = true;
                    break;
                }
            }
            return productExistsInCart;
        };
        $scope.getProducts = function() {
            $scope.productsFetchingInProgress = true;
            if($scope.data.category) {
                apiService.get("/categories/" + $scope.data.category.id + "/products").then(function(result) {
                    $scope.products = result.data.data;
                    $scope.productsFetchingInProgress = false;
                });
            } else {
                $scope.products = [];
            }
        };
        $scope.addItemToCart = function(item) {
            if(!$scope.isAlreadyAddedToCart(item)) {
                var quantityArray = [];
                for(var index = 1; index <= item.quantity; index++) {
                    quantityArray.push(index);
                }
                item.quantityArray = quantityArray;
                $scope.cartItems.push(item);
            }
        };
        $scope.removeItemFromCart = function(item, index) {
            if($scope.cartItems[index].id === item.id) {
                $scope.cartItems.splice(index, 1);
            }
        };

        $scope.getGrandTotal = function() {
            var price = 0;
            _.each($scope.cartItems, function(item) {
                price += item.selectedQuantity * item.retail_price;
            });
            if($scope.data.serviceCharge) {
                price += $scope.data.serviceCharge;
            }
            if($scope.data.totalDiscount) {
                price -= $scope.data.totalDiscount;
            }
            if($scope.data.vat) {
                price += $scope.data.vat;
            }
            return price;
        };
    }]);
})(_app);
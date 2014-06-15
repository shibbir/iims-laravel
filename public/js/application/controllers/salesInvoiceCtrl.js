"use strict";

(function(app) {
    app.controller("SalesInvoiceCtrl", ["$scope", "apiService", "notifierService", function($scope, apiService, notifierService) {
        $scope.init = function() {
            $scope.data = {};
            $scope.customers = [];
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
                    $scope.getProductsByCategory();
                }
            }).error(function() {
                notifierService.notifyError("Oops! Something happened.")
            });
        }();

        $scope.searchCustomer = function() {
            $scope.selectedCustomer = null;
            $scope.customerFetchingInProgress = true;
            var config = {
                params: {
                    q: $scope.data.customerSearchKey
                }
            };
            apiService.get("/customers/", config).success(function(result) {
                if(result.length) {
                    $scope.customers = result;
                    if(result.length === 1) {
                        $scope.selectCustomer($scope.customers[0]);
                    }
                    else {
                        notifierService.notifyInfo("Multiple customers found!");
                    }
                }
                else {
                    notifierService.notifyError("Customer not found!");
                    $scope.customers = [];
                }
                $scope.customerFetchingInProgress = false;
            }).error(function() {
                notifierService.notifyError("Oops! Something happened.")
            });
        };

        $scope.deSelectAllCustomers = function() {
            _.each($scope.customers, function(customer) {
                customer.isSelected = false;
            });
        };

        $scope.selectCustomer = function(customer) {
            $scope.deSelectAllCustomers();
            customer.isSelected = true;
            $scope.selectedCustomer = angular.copy(customer);
            notifierService.notifySuccess("Customer is now added!");
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

        $scope.getProductsByCategory = function(page) {
            $scope.productsFetchingInProgress = true;
            if($scope.data.category) {
                if(page) {
                    var config = {
                        params: {
                            page: page
                        }
                    };
                }
                apiService.get("/categories/" + $scope.data.category.id + "/products", config).success(function(result) {
                    $scope.products = result.data;
                    $scope.productsFetchingInProgress = false;
                    var tempResult = angular.copy(result);
                    delete tempResult.data;
                    $scope.paginationData = tempResult;
                    $scope.paginationData.pages = [];

                    for ( var i = 1; i <= $scope.paginationData.last_page; i++ ) {
                        $scope.paginationData.pages.push(i);
                    }
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

        $scope.createSalesInvoice = function() {
            if($scope.selectedCustomer && $scope.cartItems.length) {
                if(confirm("Are you sure?")) {
                    window.location = "/sales";
                }
            }
            else {
                notifierService.notifyError("Please fix the errors!");
            }
        };
    }]);
})(_app);
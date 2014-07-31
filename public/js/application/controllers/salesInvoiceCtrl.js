"use strict";

(function(app) {
    app.controller("SalesInvoiceCtrl", [
        "$scope", "$locale", "$window", "apiService", "notifierService", "customerService", "productService", function($scope, $locale, $window, apiService, notifierService, customerService, productService) {
            $scope.init = function() {
                $scope.locale = $locale;

                apiService.get("/categories/").success(function(result) {
                    if (result) {
                        $scope.categories = $scope.categories || [];
                        angular.forEach(result, function(value, key) {
                            $scope.categories.push({
                                id: key,
                                title: value
                            });
                        });
                        $scope.initSalesInvoice();
                    }
                }).error(function() {
                    notifierService.notifyError("Oops! Something happened.");
                });
            }();

            $scope.searchCustomer = function() {
                $scope.selectedCustomer = null;
                $scope.customerFetchingInProgress = true;

                customerService.findCustomerByQuery($scope.data.customerSearchKey).success(function(result) {
                    if (result.length) {
                        $scope.customers = result;
                        if (result.length === 1) {
                            $scope.selectCustomer($scope.customers[0]);
                        } else {
                            notifierService.notifyInfo("Multiple customers found!");
                        }
                    } else {
                        notifierService.notifyError("Customer not found!");
                        $scope.customers = [];
                    }
                    $scope.customerFetchingInProgress = false;
                }).error(function() {
                    notifierService.notifyError("Oops! Something happened.");
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

            $scope.isProductAlreadyAddedToCart = function(item) {
                var productExistsInCart = false;
                for (var index = 0; index < $scope.cartItems.length; index++) {
                    if ($scope.cartItems[index].id === item.id) {
                        productExistsInCart = true;
                        break;
                    }
                }
                return productExistsInCart;
            };

            $scope.getProductsByCategory = function(page) {
                $scope.productsFetchingInProgress = true;
                if ($scope.data.category) {
                    if (page) {
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

                        for (var i = 1; i <= $scope.paginationData.last_page; i++) {
                            $scope.paginationData.pages.push(i);
                        }
                    });
                } else {
                    $scope.products = [];
                }
            };

            $scope.addItemToCart = function(item) {
                if (!$scope.isProductAlreadyAddedToCart(item)) {
                    var quantityArray = [];
                    for (var index = 1; index <= item.quantity; index++) {
                        quantityArray.push(index);
                    }
                    item.quantityArray = quantityArray;
                    $scope.cartItems.push(item);
                }
            };

            $scope.removeItemFromCart = function(item, index) {
                if ($scope.cartItems[index].id === item.id) {
                    $scope.cartItems.splice(index, 1);
                }
            };

            $scope.getTotalAmount = function() {
                var totalAmount = 0;
                _.each($scope.cartItems, function(item) {
                    totalAmount += item.selectedQuantity * item.retail_price;
                });
                return totalAmount;
            };

            $scope.getGrandTotal = function() {
                var price = 0;

                price += $scope.getTotalAmount();

                if ($scope.data.serviceCharge) {
                    price += $scope.data.serviceCharge;
                }
                if ($scope.data.discount) {
                    price -= $scope.data.discount;
                }
                if ($scope.data.vat) {
                    price += $scope.data.vat;
                }
                return price;
            };

            $scope.isValidSalesInvoiceForm = function() {

                var isValidSalesInvoiceForm = true;

                if (!$scope.data.vat) {
                    $scope.data.vat = 0;
                }
                if (!$scope.data.discount) {
                    $scope.data.discount = 0;
                }
                if (!$scope.data.serviceCharge) {
                    $scope.data.serviceCharge = 0;
                }

                if (!$scope.selectedCustomer || !$scope.cartItems.length) {
                    isValidSalesInvoiceForm = false;
                }

                if(isValidSalesInvoiceForm) {
                    for(var index = 0; index < $scope.cartItems.length; index++) {
                        var t = $scope.cartItems[index];

                        if(!$scope.isSerialNumberVerifiedForItem(t)) {
                            isValidSalesInvoiceForm = false;
                            break;
                        }
                    }
                }

                return isValidSalesInvoiceForm;
            };

            $scope.initSalesInvoice = function() {
                $scope.data = {};

                $scope.data.category = $scope.categories[0];
                $scope.getProductsByCategory();

                $scope.customers = [];
                $scope.cartItems = [];
            };

            $scope.clearProductSerial = function(data) {

                data.serial = "";
                data.isValid = false;
                data.isChecked = false;
            };

            $scope.verifyProductSerial = function(productId, data) {
                data.isChecked = true;
                var serialAlreadyAdded = false;

                for(var index = 0; index < $scope.serialManager.serialNumbers.length; index++) {
                    var t = $scope.serialManager.serialNumbers[index];
                    if(t.isValid && t.serial === data.serial) {
                        serialAlreadyAdded = true;
                        break;
                    }
                }

                if(!serialAlreadyAdded) {
                    $scope.serialNumberCheckingInProgress = true;
                    productService.verifyProductSerial(productId, data.serial).success(function() {
                        $scope.serialNumberCheckingInProgress = false;
                        data.isValid = true;
                    }).error(function() {
                        $scope.serialNumberCheckingInProgress = false;
                        data.isValid = false;
                    });
                }
            };

            $scope.resetSerialForAnItem = function(cartItem) {
                delete cartItem.serialNumbers;
            };

            $scope.isSerialNumberVerifiedForItem = function(item) {
                var isSerialNumberVerifiedForItem = true;

                if(item.serialNumbers) {
                    for(var index = 0; index < item.serialNumbers.length; index++) {
                        if(!item.serialNumbers[index].serial || !item.serialNumbers[index].isValid) {
                            isSerialNumberVerifiedForItem = false;
                            break;
                        }
                    }
                } else {
                    isSerialNumberVerifiedForItem = false;
                }

                return isSerialNumberVerifiedForItem;
            };

            $scope.isSerialNumberVerifiedForAllItemsInSerialManager = function() {
                var isSerialNumberVerifiedForAllItems = true;

                if($scope.serialManager) {
                    for(var index = 0; index < $scope.serialManager.serialNumbers.length; index++) {
                        var t = $scope.serialManager.serialNumbers[index];
                        if(!t.serial || !t.isValid) {
                            isSerialNumberVerifiedForAllItems = false;
                            break;
                        }
                    }
                }

                return isSerialNumberVerifiedForAllItems;
            };

            $scope.persistSerialManagerInSelectedProduct = function() {
                $scope.resetSerialForAnItem($scope.selectedProduct);

                if($scope.serialManager) {
                    if($scope.isSerialNumberVerifiedForAllItemsInSerialManager()) {
                        $scope.selectedProduct.serialNumbers = angular.copy($scope.serialManager.serialNumbers);
                        $("#ModalSerialManager").modal("hide");
                        notifierService.notifySuccess("Serial number added for product id: " + $scope.selectedProduct.id);
                    }
                }
            };

            $scope.initSerialManager = function(cartItem) {

                $scope.selectedProduct = cartItem;

                var serialNumbers = [];
                for (var index = 0; index < $scope.selectedProduct.selectedQuantity; index++) {
                    serialNumbers.push({
                        isValid: false
                    });
                }
                $scope.serialManager = {
                    serialNumbers: $scope.selectedProduct.serialNumbers || serialNumbers
                };
            };

            $scope.createSalesInvoice = function() {
                if ($scope.isValidSalesInvoiceForm()) {
                    if (confirm("Are you sure?")) {
                        var products = [];
                        _.each($scope.cartItems, function(cartItem) {
                            var serialNumbers = [];
                            _.each(cartItem.serialNumbers, function(item) {
                                serialNumbers.push(item.serial);
                            });
                            products.push({
                                id: cartItem.id,
                                quantity: cartItem.selectedQuantity,
                                serial_numbers: serialNumbers
                            });
                        });
                        var data = {
                            customer_id: $scope.selectedCustomer.id,
                            products: products,
                            vat: $scope.data.vat,
                            discount: $scope.data.discount,
                            service_charge: $scope.data.serviceCharge
                        };
                        apiService.post("/sales/", data).success(function(salesId) {
                            window.location = "/sales/" + salesId;
                        }).error(function() {
                            notifierService.notifyError("Oops! Something happened.");
                        });
                    }
                } else {
                    notifierService.notifyError("Please fix the errors first!");
                }
            };
        }]);
})(_app);
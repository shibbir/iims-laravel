@extends('layouts.master')

@section('title')
    Create New Sales Invoice
@stop

@section('content')
    <div ng-controller="SalesInvoiceCtrl">
        <h2>Sale Invoice Create Form</h2>
        <hr />

        <div id="customerSection">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="form-group">
                        <input type="search" ng-model="data.customerSearchKey" placeholder="Search for customer" class="form-control" />
                    </div>
                </div>
                <div class="col-xs-12 col-md-2">
                    <a class="btn btn-primary" ng-click="searchCustomer()" ng-disabled="!data.customerSearchKey">
                        <i class="fa fa-search"></i>
                        Search
                    </a>
                </div>
                <div class="col-md-1" ng-if="customerFetchingInProgress">
                    <i class="fa-li fa fa-spin fa-2x fa-cog green"></i>
                </div>
            </div>
            <div ng-if="!selectedCustomer">
                <div class="alert alert-danger">
                    <i class="fa fa-warning fa-lg"></i>
                    No customer selected yet.
                </div>
            </div>
            <div ng-if="customers.length">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="customer in customers">
                            <td ng-bind="$index + 1"></td>
                            <td ng-bind="customer.first_name"></td>
                            <td ng-bind="customer.last_name"></td>
                            <td ng-bind="customer.contact"></td>
                            <td ng-bind="customer.address"></td>
                            <td ng-if="customer.isSelected"><i class="fa fa-check fa-2x green"></i></td>
                            <td ng-if="!customer.isSelected">
                                <button ng-click="selectCustomer(customer)" class="btn btn-info btn-xs">
                                    <i class="fa fa-check"></i>
                                    Select
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <hr />

        <div id="productSection">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control"
                                ng-model="data.category"
                                ng-change="getProductsByCategory()"
                                ng-options="option as option.title for option in categories"></select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-offset-5 col-md-offset-1" ng-if="productsFetchingInProgress" style="margin-top: 22px;">
                    <i class="fa-li fa fa-spin fa-2x fa-cog green"></i>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <label>All Products</label>
                    <div ng-if="products.length">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Available</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="product in products">
                                    <td ng-bind="$index + 1"></td>
                                    <td ng-bind="product.title"></td>
                                    <td>[[ product.quantity ]] in 3 variants</td>
                                    <td ng-bind="product.updated_at"></td>
                                    <td>
                                        <button class="btn btn-success btn-xs" ng-click="addItemToCart(product)" ng-disabled="isAlreadyAddedToCart(product)">
                                            <i class="fa fa-plus"></i>
                                            Add
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <hr />

                        <div class="pull-right" ng-if="paginationData && paginationData.last_page > 1">
                            <ul class="pagination">
                                <li ng-if="paginationData.current_page === 1" class="disabled">
                                    <span>«</span>
                                </li>
                                <li ng-if="paginationData.current_page !== 1">
                                    <a ng-click="getProductsByCategory(1)">«</a>
                                </li>
                                <li
                                    ng-repeat="page in paginationData.pages"
                                    ng-disabled="paginationData.current_page === page"
                                    ng-class="(paginationData.current_page === page) ? 'active' : ''">
                                    <span ng-if="paginationData.current_page === page" ng-bind="page"></span>
                                    <a ng-if="paginationData.current_page !== page" ng-click="getProductsByCategory(page)" ng-bind="page"></a>
                                </li>
                                <li ng-if="paginationData.current_page === paginationData.last_page" class="disabled">
                                    <span>»</span>
                                </li>
                                <li ng-if="paginationData.current_page !== paginationData.last_page">
                                    <a ng-click="getProductsByCategory(paginationData.last_page)">»</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div ng-if="!products.length">
                        <div class="alert alert-info">
                            <i class="fa fa-warning fa-lg"></i>
                            Sorry. Nothing found for this category.
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <fieldset>
                        <legend>
                            <i class="fa fa-shopping-cart"></i>
                            Invoice Cart
                        </legend>
                        <div ng-if="cartItems.length">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th class="text-center">Total Price</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="cartItem in cartItems">
                                        <td ng-bind="$index + 1"></td>
                                        <td ng-bind="cartItem.title"></td>
                                        <td ng-bind="cartItem.retail_price | currency:'$'"></td>
                                        <td class="col-xs-1">
                                            <select class="form-control input-sm"
                                                    ng-init="cartItem.selectedQuantity=1"
                                                    ng-model="cartItem.selectedQuantity"
                                                    ng-options="qty as qty for qty in cartItem.quantityArray"></select>
                                        </td>
                                        <td class="text-center" ng-bind="cartItem.selectedQuantity * cartItem.retail_price | currency:'$'"></td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-xs" ng-click="removeItemFromCart(cartItem, $index)">
                                                <i class="fa fa-trash-o"></i>
                                                Discard
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div ng-if="!cartItems.length">
                            <div class="alert alert-danger">
                                <i class="fa fa-warning fa-lg"></i>
                                Nothing is added to the cart yet!
                            </div>
                        </div>
                    <fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-4 col-sm-offset-7">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Service Charge</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" ng-model="data.serviceCharge" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Total Discount</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" ng-model="data.totalDiscount" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">VAT</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" ng-model="data.vat" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Grand Total</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" ng-value="getGrandTotal()" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <hr />

        <div class="pull-right">
            <button class="btn btn-primary" ng-click="createSalesInvoice()">
                <i class="fa fa-plus"></i>
                Create Invoice
            </button>
        </div>
    </div>

@stop
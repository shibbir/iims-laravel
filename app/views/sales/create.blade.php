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
                        <input type="text" ng-model="data.customerSearchKey" placeholder="search customer by contact" class="form-control" />
                    </div>
                </div>
                <div class="col-xs-12 col-md-2">
                    <a class="btn btn-primary" ng-click="searchCustomer()" ng-disabled="!data.customerSearchKey">Search</a>
                </div>
                <div class="col-md-1" ng-if="customerFetchingInProgress">
                    <i class="fa-li fa fa-spin fa-2x fa-cog green"></i>
                </div>
            </div>
            <div ng-if="!customer.id">No customer selected yet.</div>
            <div ng-if="customer.id">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td ng-bind="customer.first_name"></td>
                            <td ng-bind="customer.last_name"></td>
                            <td ng-bind="customer.contact"></td>
                            <td ng-bind="customer.address"></td>
                            <td ng-if="customer.id"><i class="fa fa-check fa-2x green"></i></td>
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
                                ng-change="getProducts()"
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
                                    <th>Title</th>
                                    <th>Available</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="product in products">
                                    <td ng-bind="product.title"></td>
                                    <td>[[ product.quantity ]] in 3 variants</td>
                                    <td ng-bind="product.updated_at"></td>
                                    <td>
                                        <button class="btn btn-success btn-xs" ng-click="addItemToCart(product)" ng-disabled="isAlreadyAddedToCart(product)">Add</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div ng-if="!products.length">
                        Sorry. Nothing found for this category.
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <fieldset>
                        <legend>Invoice Cart</legend>
                        <div ng-if="cartItems.length">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th class="text-center">Total Price</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="cartItem in cartItems">
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
                                            <button class="btn btn-danger btn-xs" ng-click="removeItemFromCart(cartItem, $index)">Discard</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div ng-if="!cartItems.length">
                            No products added yet!
                        </div>
                    <fieldset>
                </div>
            </div>
            <div class="row" id="">
                <div class="col-xs-12 col-md-4 col-sm-offset-7">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Service Charge</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Total Discount</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">VAT</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Grand Total</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
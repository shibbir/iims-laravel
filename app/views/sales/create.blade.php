@extends('layouts.master')

@section('title')
    Create New Sales Invoice
@stop

@section('content')

    <div data-ng-controller="SalesInvoiceCtrl">
        @include('sales.serial-manager-modal')
        <h2>Sale Invoice Create Form</h2>
        <hr />

        <div id="customerSection">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="form-group">
                        <input type="search" data-ng-model="data.customerSearchKey" placeholder="Search for customer" class="form-control" />
                    </div>
                </div>
                <div class="col-xs-12 col-md-2">
                    <a class="btn btn-primary" data-ng-click="searchCustomer()" data-ng-disabled="!data.customerSearchKey">
                        <i class="fa fa-search"></i>
                        Search
                    </a>
                </div>
                <div class="col-md-1" data-ng-if="customerFetchingInProgress">
                    <i class="fa-li fa fa-spin fa-2x fa-cog green"></i>
                </div>
            </div>
            <div data-ng-if="!selectedCustomer">
                <div class="alert alert-danger">
                    <i class="fa fa-warning fa-lg"></i>
                    No customer selected yet.
                </div>
            </div>
            <div data-ng-if="customers.length">
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
                        <tr data-ng-repeat="customer in customers">
                            <td data-ng-bind="$index + 1"></td>
                            <td data-ng-bind="customer.first_name"></td>
                            <td data-ng-bind="customer.last_name"></td>
                            <td data-ng-bind="customer.contact"></td>
                            <td data-ng-bind="customer.address"></td>
                            <td data-ng-if="customer.isSelected"><i class="fa fa-check fa-2x green"></i></td>
                            <td data-ng-if="!customer.isSelected">
                                <button data-ng-click="selectCustomer(customer)" class="btn btn-info btn-xs">
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
                        <label for="category">Category</label>
                        <select id="category" class="form-control"
                                data-ng-model="data.category"
                                data-ng-change="getProductsByCategory()"
                                data-ng-options="option as option.title for option in categories"></select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-offset-5 col-md-offset-1" data-ng-if="productsFetchingInProgress" style="margin-top: 22px;">
                    <i class="fa-li fa fa-spin fa-2x fa-cog green"></i>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h4>All Products From <strong data-ng-bind="data.category.title"></strong> Category</h4>
                    <div data-ng-if="products.length">
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
                                <tr data-ng-repeat="product in products">
                                    <td data-ng-bind="$index + 1"></td>
                                    <td>
                                        <a data-ng-href="/categories/[[product.category_id]]/products/[[product.id]]">[[product.title]]</a>
                                    </td>
                                    <td>[[ product.quantity ]] in 3 variants</td>
                                    <td data-ng-bind="product.updated_at"></td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs"
                                                data-ng-click="addItemToCart(product)"
                                                data-ng-disabled="isProductAlreadyAddedToCart(product)">
                                            <i class="fa fa-plus"></i>
                                            Add
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <hr />

                        <div class="pull-right" data-ng-if="paginationData && paginationData.last_page > 1">
                            <ul class="pagination">
                                <li data-ng-if="paginationData.current_page === 1" class="disabled">
                                    <span>«</span>
                                </li>
                                <li data-ng-if="paginationData.current_page !== 1">
                                    <a data-ng-click="getProductsByCategory(1)">«</a>
                                </li>
                                <li
                                    data-ng-repeat="page in paginationData.pages"
                                    data-ng-disabled="paginationData.current_page === page"
                                    data-ng-class="(paginationData.current_page === page) ? 'active' : ''">
                                    <span data-ng-if="paginationData.current_page === page" data-ng-bind="page"></span>
                                    <a data-ng-if="paginationData.current_page !== page" data-ng-click="getProductsByCategory(page)" data-ng-bind="page"></a>
                                </li>
                                <li data-ng-if="paginationData.current_page === paginationData.last_page" class="disabled">
                                    <span>»</span>
                                </li>
                                <li data-ng-if="paginationData.current_page !== paginationData.last_page">
                                    <a data-ng-click="getProductsByCategory(paginationData.last_page)">»</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div data-ng-if="!products.length">
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
                        <div data-ng-if="cartItems.length">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Unit Price ([[locale.NUMBER_FORMATS.CURRENCY_SYM]])</th>
                                        <th>Quantity</th>
                                        <th class="text-center">Total Price ([[locale.NUMBER_FORMATS.CURRENCY_SYM]])</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-ng-repeat="cartItem in cartItems">
                                        <td data-ng-bind="$index + 1"></td>
                                        <td>
                                            <a data-ng-href="/categories/[[cartItem.category_id]]/products/[[cartItem.id]]">[[cartItem.title]]</a>
                                        </td>
                                        <td data-ng-bind="cartItem.retail_price"></td>
                                        <td class="col-xs-1">
                                            <select class="form-control input-sm"
                                                    data-ng-init="cartItem.selectedQuantity=1"
                                                    data-ng-model="cartItem.selectedQuantity"
                                                    data-ng-change="resetSerialForAnItem(cartItem)"
                                                    data-ng-options="qty as qty for qty in cartItem.quantityArray"></select>
                                        </td>
                                        <td class="text-center" data-ng-bind="cartItem.selectedQuantity * cartItem.retail_price"></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-xs" data-target="#ModalSerialManager" data-toggle="modal" data-ng-click="initSerialManager(cartItem)">
                                                <i class="fa fa-ticket"></i>
                                                Manage Serial
                                            </button>
                                            <button type="button" class="btn btn-danger btn-xs" data-ng-click="removeItemFromCart(cartItem, $index)">
                                                <i class="fa fa-trash-o"></i>
                                                Discard
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div data-ng-if="!cartItems.length">
                            <div class="alert alert-danger">
                                <i class="fa fa-warning fa-lg"></i>
                                Nothing is added to the cart yet!
                            </div>
                        </div>
                    <fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-4 col-lg-offset-8 col-xs-offset-0">
                    <form class="form-horizontal" role="form" name="SaleInvoicePriceForm">
                        <div class="form-group">
                            <label class="col-sm-7 control-label">Total Amount ([[locale.NUMBER_FORMATS.CURRENCY_SYM]])</label>
                            <div class="col-sm-5">
                                <input type="text" name="total_amount" class="form-control textRight" data-ng-disabled="true" data-ng-value="getTotalAmount()" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-7 control-label">Add Service Charge ([[locale.NUMBER_FORMATS.CURRENCY_SYM]])</label>
                            <div class="col-sm-5">
                                <input type="number" name="service_charge" class="form-control textRight" data-ng-model="data.serviceCharge" data-ng-init="data.serviceCharge = 0" />
                                <span class="error" data-ng-if="SaleInvoicePriceForm.service_charge.$error.number">Not a valid number!</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-7 control-label">Add VAT ([[locale.NUMBER_FORMATS.CURRENCY_SYM]])</label>
                            <div class="col-sm-5">
                                <input type="number" name="vat" class="form-control textRight" data-ng-model="data.vat" data-ng-init="data.vat = 0" />
                                <span class="error" data-ng-if="SaleInvoicePriceForm.vat.$error.number">Not a valid number!</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-7 control-label">Less Discount ([[locale.NUMBER_FORMATS.CURRENCY_SYM]])</label>
                            <div class="col-sm-5">
                                <input type="number" name="discount" class="form-control textRight" data-ng-model="data.discount" data-ng-init="data.discount = 0" />
                                <span class="error" data-ng-if="SaleInvoicePriceForm.discount.$error.number">Not a valid number!</span>
                            </div>
                        </div>
                        <hr />
                        <div class="form-group">
                            <label class="col-sm-7 control-label">Net Payable Amount ([[locale.NUMBER_FORMATS.CURRENCY_SYM]])</label>
                            <div class="col-sm-5">
                                <input type="text" name="net_payable_amount" class="form-control textRight" data-ng-disabled="true" data-ng-value="getGrandTotal()" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <hr />

        <div class="pull-right">
            <button type="button" class="btn btn-primary" data-ng-click="createSalesInvoice()">
                <i class="fa fa-plus"></i>
                Create Invoice
            </button>
        </div>
    </div>

@stop
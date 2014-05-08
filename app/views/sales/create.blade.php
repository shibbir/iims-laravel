@extends('layouts.master')

@section('title')
    Create New Sales Invoice
@stop

@section('content')
    <div ng-controller="SalesInvoiceCtrl">
        <h2>Sale Invoice Create Form</h2>
        <hr />
        <div id="customerSection">
            <div class="form-group">
                <input type="text" ng-model="data.customerEmail" placeholder="search customer by email" class="form-control" />
            </div>
            <input type="button" value="Search" class="btn btn-primary" />
            <div ng-if="!customers">No customer selected yet.</div>
            <div ng-if="customers">
                <table>
                    show the customers
                </table>
            </div>
        </div>
        <hr />
        <div id="productSection">
            <div class="form-group">
                <label>Category</label>
                <select ng-model="data.categoryId" ng-options="option.id as option.title for option in categories" class="form-control">
                    <option value="">Select Category</option>
                </select>
            </div>
        </div>
    </div>

@stop
@extends('layouts.master')

@section('title')
    Welcome to the dashboard
@stop

@section('content')
    <div class="row" ng-controller="dashboardCtrl">
        <div class="col-xs-12 col-md-6">
            <div class="widget">
                <div class="widget-header"><h4>Quick Dashboard</h4></div>
                <div class="widget-body">
                    <ul class="cpanel">
                        <li><a class="button1" href="users/profile">My Profile</a></li>
                        <li><a class="button2" href="users">Staff</a></li>
                        <li><a class="button3" href="customers">Customer</a></li>
                        <li><a class="button4" href="products">Inventory</a></li>
                        <li><a class="button5" href="invoice">Invoice</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="widget">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <h4>Organization Information</h4>
                        </div>
                        <div ng-if="organization">
                            <div class="col-xs-6 col-md-6 textRight">
                                <a class="btn btn-primary organization-edit-modal" data-target="#ModalOrganizationEdit" data-toggle="modal">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-body">
                    @include('organization.organization-add-modal')
                    @include('organization.organization-edit-modal')

                    <div ng-if="organization">
                        <h4 ng-bind="organization.title"></h4>
                        <small ng-bind="organization.sub_title"></small>
                        <address ng-bind="organization.address"></address>
                        <p>
                            <span class="label label-primary">Mobile</span>
                            <span ng-bind="organization.mobile"></span>
                        </p>
                        <p>
                            <span class="label label-primary">Phone</span>
                            <span ng-bind="organization.phone"></span>
                        </p>
                        <p>
                            <span class="label label-info">Email</span>
                            <span ng-bind="organization.email"></span>
                        </p>
                        <p>
                            <span class="label label-info">Website</span>
                            <a target="_blank" href="[[ organization.website ]]" ng-bind="organization.website"></a>
                        </p>
                    </div>
                    <div ng-if="!organization">
                        <div class="pager text-error"><strong>Please add your organization information.</strong></div>
                        <a href="#ModalOrganizationAdd" role="button" class="btn btn-success" data-toggle="modal">
                            <i class="icon-plus icon-white icon-large"></i>
                            Add Organization Info
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="widget">
        <div class="widget-header"><h4>Pie Chart - Inventory category</h4></div>
        <div class="widget-body">
            <div id="inventory-chart"></div>
        </div>
    </div>

    <div class="widget">
        <div class="widget-header"><h4>Bar Chart - Invoice By Year</h4></div>
        <div class="widget-body">
            <label class="control-label" for="ProductCategory">Select a year</label>
            <select class="invoice-per-year input-small">
                <?php for($year = date('Y'); $year >= 2012; $year--):?>
                    <option><?=$year?></option>
                <?php endfor;?>
            </select>
            <div class="loading hide" style="display:inline;">
                <i class="icon-spinner icon-spin icon-2x"></i>
            </div>
            <div id="invoice-chart"></div>
        </div>
    </div>

@stop
@extends('layouts.master')

@section('title')
    Welcome to the dashboard
@stop

@section('content')
    <div class="row" data-ng-controller="dashboardCtrl">
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-anchor fa-lg"></i>
                    Quick Dashboard
                </div>
                <div class="panel-body">
                    <ul class="cpanel">
                        <li><a class="button1" href="/profile">Profile</a></li>
                        <li><a class="button2" href="/users">Staff</a></li>
                        <li><a class="button3" href="/customers">Customer</a></li>
                        <li><a class="button4" href="/inventory">Inventory</a></li>
                        <li><a class="button5" href="/categories">Category</a></li>
                        <li><a class="button5" href="/sales">Sales Invoice</a></li>
                        <li><a class="button5" href="/suppliers">Supplier</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <i class="fa fa-university fa-lg"></i>
                            Organization Information
                        </div>
                        <div class="col-xs-6 col-md-6 text-right">
                            <a href="/organization/edit">
                                <i class="fa fa-pencil"></i>
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if($organization)
                        <h4>{{ $organization->title }}</h4>
                        <small>{{ $organization->sub_title }}</small>
                        <address>{{ $organization->address }}</address>
                        <p>
                            <span class="label label-primary">Mobile</span>
                            <span>{{ $organization->mobile }}</span>
                        </p>
                        <p>
                            <span class="label label-primary">Phone</span>
                            <span>{{ $organization->phone }}</span>
                        </p>
                        <p>
                            <span class="label label-info">Email</span>
                            <span>{{ $organization->email }}</span>
                        </p>
                        <p>
                            <span class="label label-info">Website</span>
                            <a target="_blank" href="{{ $organization->website }}">{{ $organization->website }}</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-lg"></i>
            Pie Chart - Inventory Categories
        </div>
        <div class="panel-body">
            <div id="inventory-chart"></div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-lg"></i>
            Bar Chart - Invoice By Year
        </div>
        <div class="panel-body">
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
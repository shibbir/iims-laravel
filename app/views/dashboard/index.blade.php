@extends('layouts.master')

@section('content')
<div class="row-fluid" ng-controller="dashboardCtrl">
    <div class="span6">
        <div class="widget">
            <div class="widget-header"><h4>Quick Dashboard</h4></div>
            <div class="widget-body">
                <ul class="cpanel">
                    <li><a class="button1" href="user/profile">My Profile</a></li>
                    <li><a class="button2" href="user>">Staff</a></li>
                    <li><a class="button3" href="customer">Customer</a></li>
                    <li><a class="button4" href="inventory>">Inventory</a></li>
                    <li><a class="button5" href="invoice">Invoice</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="span6">
        <div class="widget">
            <div class="widget-header">
                <div class="row-fluid">
                    <div class="span6">
                        <h4>Organization Information</h4>
                    </div>
                    <div ng-if="organization">
                        <div class="span6 textRight">
                            <a class="btn btn-primary organization-edit-modal" data-target="#ModalOrganizationEdit" data-toggle="modal">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-body">
                <?php
                    //echo $this->load->view('organization/modal-add-organization');
                    //echo $this->load->view('organization/modal-edit-organization');
                ?>

                <div ng-if="organization">
                    <h4>[[ organization.title ]]</h4>
                    <small>[[ organization.subTitle ]]</small>
                    <address>[[ organization.address ]]</address>
                    <p><span class="label label-important">Mobile</span> [[ organization.mobile ]]</p>
                    <p><span class="label label-important">Phone</span> [[ organization.phone ]]</p>
                    <p><span class="label label-info">Email</span> [[ organization.email ]]</p>
                    <p><span class="label label-info">Website</span> <a target="_blank" href="[[ organization.website ]]">[[ organization.website ]]</a></p>
                </div>
                <div ng-if="!organization">
                    <div class="pager text-error"><strong>Please add your organization information.</strong></div>
                    <a href="#ModalOrganizationAdd" role="button" class="btn btn-success" data-toggle="modal"><i class="icon-plus icon-white icon-large"></i> Add Organization Info</a>
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

<script>
    /*
    $(function() {
        function reloadInventoryChart() {
            $('#inventory-chart').html('');
            ajaxDataReceive('dashboard', 'getInventoryChart', 'inventory-chart');
        }
        function renderInvoiceByYear(year) {
            initInvoiceCountByYear(year);
        }

        reloadInventoryChart();
        renderInvoiceByYear(2013);
        $('.invoice-per-year').on('change', function() {
            renderInvoiceByYear($(this).val());
        });
        $(document).on('event/ajax-start', function() {
            $('.loading').show();
        });
        $(document).on('event/ajax-end', function() {
            $('.loading').hide();
        });

        var renderOrganization = function () {
            $.fetchRemoteData('organization', 'getOrganization').then(function (data) {
                renderHandlebarsTemplate('#template-organization', '#placeholder-organization', data);
                renderHandlebarsTemplate('#template-organization-edit-form', '#placeholder-organization-edit-form', data);
                $.hideSpinner();
            });
        };

        var addOrganization = function() {
            $.buttonIndicator('on');
            $.postRemoteData('organization', 'add', $('.organization-add-form').serialize()).then(function (data) {
                if(data.status === 'success') {
                    renderOrganization();
                }
                showNotification(data, '#notification-organization-add');
                $.buttonIndicator('off');
            });
        };

        var updateOrganization = function() {
            $.buttonIndicator('on');
            $.postRemoteData('organization', 'edit', $('.organization-edit-form').serialize()).then(function (data) {
                if(data.status === 'success') {
                    renderOrganization();
                }
                showNotification(data, '#notification-organization-edit', 'edit');
                $.buttonIndicator('off');
            });
        };

        $(document).on('click', '.btn-add-organization', function () {
            addOrganization();
        });
        $(document).on('click', '.btn-edit-organization', function () {
            updateOrganization();
        });

        renderOrganization();
    });
    */
</script>
@stop
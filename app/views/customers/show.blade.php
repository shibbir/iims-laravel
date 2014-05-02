@extends('layouts.master')

@section('title')
    Customer Details
@stop

@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a data-target="#customer" data-toggle="tab">Customer</a></li>
        <li><a data-target="#customer-invoice" data-toggle="tab">Invoice Log</a></li>
    </ul>

    <div class="tab-content">
        <div id="customer" class="tab-pane fade active in">
            @if($customer)
                <div class="block">
                    <h3>Name: {{ $customer->first_name }} {{ $customer->last_name }}</h3>
                    <h4>Registration Date: {{ $customer->created_at }}</h4>
                    <h4>Contact Number: {{ $customer->contact }}</h4>

                    <h4><address>Address: {{ $customer->address }}</address></h4>
                    {{ link_to("/customers/{$customer->id }/edit", "Edit") }}
                </div>
            @else
                <div class="block pager text-error"><strong>Sorry, no information found! Try reloading the page.</strong></div>
            @endif
        </div>
        <div id="customer-invoice" class="tab-pane fader">
            <div id="placeholder-customerHistory"></div>
        </div>
    </div>

@stop
@extends('layouts.master')

@section('title')
    Update Customer
@stop

@section('content')

    <h2>Customer Update Form</h2>
    <hr />
    @include('shared._flashMessage')

    {{ Form::model($customer, ['method' => 'PATCH', 'route' => ['customers.update', $customer->id]]) }}
        @include('customers._formBody', ['buttonText' => 'Update Customer'])
    {{ Form::close() }}

@stop
@extends('layouts.master')

@section('content')
    <h2>Customer Update Form</h2>
    @include('shared._flashMessage')

    {{ Form::model($customer, ['method' => 'PATCH', 'route' => ['customers.update', $customer->id]]) }}
        @include('customer._formBody', ['buttonText' => 'Update Customer'])
    {{ Form::close() }}

@stop
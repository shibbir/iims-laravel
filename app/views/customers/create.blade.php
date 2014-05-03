@extends('layouts.master')

@section('title')
    Create New Customer
@stop

@section('content')

    <h2>Customer Create Form</h2>
    <hr />
    {{ Form::open(array('route' => 'customers.store')) }}
        @include('customers/_formBody')
    {{ Form::close() }}

@stop
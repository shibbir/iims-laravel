@extends('layouts.master')

@section('title')
    Add New Customer Create
@stop

@section('content')

    <h2>Customer Create Form</h2>
    {{ Form::open(array('route' => 'customers.store')) }}
        @include('customers/_formBody')
    {{ Form::close() }}

@stop
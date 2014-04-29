@extends('layouts.master')

@section('content')
    <h2>Customer Create Form</h2>

    {{ Form::open(array('route' => 'customers.store')) }}
        @include('customer._formBody')
    {{ Form::close() }}

@stop
@extends('layouts.master')

@section('title')
    Create New Supplier
@stop

@section('content')

    <h2>Supplier Create Form</h2>
    <hr />
    {{ Form::open(array('route' => 'suppliers.store')) }}
        @include('suppliers._formBody')
    {{ Form::close() }}

@stop
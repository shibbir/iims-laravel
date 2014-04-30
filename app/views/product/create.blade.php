@extends('layouts.master')

@section('content')
    <h2>Product Create Form</h2>

    {{ Form::open(array('route' => 'products.store')) }}
        @include('product._formBody')
    {{ Form::close() }}

@stop
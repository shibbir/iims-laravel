@extends('layouts.master')

@section('content')
    <h2>Product Create Form</h2>

    <hr />
    <div class="row">
        <div class="col-xs-6 col-md-4">
            {{ Form::open(array('route' => 'products.store')) }}
                @include('product._formBody')
            {{ Form::close() }}
        </div>
    </div>

@stop
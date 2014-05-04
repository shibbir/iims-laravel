@extends('layouts.master')

@section('title')
    Add New Product
@stop

@section('content')
    <h2>Product Create Form</h2>

    <hr />
    <div class="row">
        <div class="col-xs-6 col-md-4">
            {{ Form::open(array('route' => ['categories.products.store', $selected_category_id])) }}
                @include('products._formBody')
            {{ Form::close() }}
        </div>
    </div>

@stop
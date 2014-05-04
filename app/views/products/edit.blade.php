@extends('layouts.master')

@section('title')
    Update Product
@stop

@section('content')
    <h2>Product Update Form</h2>

    @include('shared._flashMessage')

    {{ Form::model($product, ['method' => 'PATCH', 'route' => ['categories.products.update', $product->category_id, $product->id]]) }}
        @include('products._formBody', ['buttonText' => 'Update Product'])
    {{ Form::close() }}

@stop
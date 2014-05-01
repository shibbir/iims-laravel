@extends('layouts.master')

@section('content')
    <h2>Product Update Form</h2>

    @include('shared._flashMessage')

    {{ Form::model($product, ['method' => 'PATCH', 'route' => ['products.update', $product->id]]) }}
        @include('product._formBody', ['buttonText' => 'Update Product'])
    {{ Form::close() }}

@stop
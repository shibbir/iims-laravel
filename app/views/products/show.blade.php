@extends('layouts.master')

@section('title')
    Product Details
@stop

@section('content')

    <p>Title: {{ $product->title }}</p>
    <p>Category: {{ $product->category->title }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Unit Price: {{ $product->unit_price }}</p>
    <p>Warranty: {{ $product->warranty }}</p>
    <p>Registration Date: {{ $product->created_at }}</p>
    {{ link_to("/categories/{$product->category->id}/products/{$product->id }/edit", "Edit") }}

@stop
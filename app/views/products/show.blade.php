@extends('layouts.master')

@section('title')
    Product Details
@stop

@section('content')

    @if($product)
        <p>Title: {{ $product->title }}</p>
        <p>Description: {{ $product->description }}</p>
        <p>Unit Price: {{ $product->unit_price }}</p>
        <p>Warranty: {{ $product->warranty }}</p>
        <p>Registration Date: {{ $product->created_at }}</p>
        {{ link_to("/products/{$product->id }/edit", "Edit") }}
    @else
        <div class="block pager text-error"><strong>Sorry, no information found! Try reloading the page.</strong></div>
    @endif

@stop
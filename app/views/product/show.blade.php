@extends('layouts.master')

@section('content')

    @if($product)
        <p>Title: {{ $product->title }}</p>
        <p>Description: {{ $product->description }}</p>
        <p>Unit Price: {{ $product->unitPrice }}</p>
        <p>Warranty: {{ $product->warranty }}</p>
        <p>Registration Date: {{ $product->created_at }}</p>
        {{ link_to("/products/{$product->id }/edit", "Edit") }}
    @else
        <div class="block pager text-error"><strong>Sorry, no information found! Try reloading the page.</strong></div>
    @endif

@stop
@extends('layouts.master')

@section('content')
    {{ link_to_route('products.create', 'Add New Product', [], $attributes = ['class' => 'btn btn-primary']) }}

    @include('shared._flashMessage')

    <h3>All Products</h3>

    @if($products->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Unit Price</th>
                    <th>Warranty</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->unitPrice }}</td>
                        <td>{{ $product->warranty }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->isAvailable }}</td>
                        <td>{{ link_to("/products/{$product->id }", 'Show') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-danger">
            Sorry. No product found!
        </div>
    @endif
@stop
@extends('layouts.master')

@section('title')
    Product Page
@stop

@section('content')
    {{ link_to_route('products.create', 'Add New Product', [], $attributes = ['class' => 'btn btn-primary']) }}

    @include('shared._flashMessage')

    <h3>All Products</h3>

    <hr />

    @if($products->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
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
                        <td>{{ $product->category_id }}</td>
                        <td style="width: 22%;">{{ $product->description }}</td>
                        <td>{{ $product->unit_price }}</td>
                        <td>{{ $product->warranty }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->is_available }}</td>
                        <td>
                            {{ link_to("/products/{$product->id }", 'Show', ['class' => 'btn btn-info']) }}
                            {{ link_to("/products/{$product->id }/edit", 'Edit', ['class' => 'btn btn-primary']) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr />
        <div class="pull-right">
            {{ $products->appends(Request::except('page'))->links() }}
        </div>
    @else
        <div class="alert alert-danger">
            Sorry. No product found!
        </div>
    @endif
@stop
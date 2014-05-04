@extends('layouts.master')

@section('title')
    Products Page
@stop

@section('content')
    {{ link_to_route('categories.products.create', 'Add New Product', [$category->id], $attributes = ['class' => 'btn btn-primary']) }}

    @include('shared._flashMessage')

    <h3>All Products Under {{ $category->title }} Category</h3>

    <hr />

    @if($products->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Available</th>
                    <th>Last Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ link_to("/categories/{$category->id}", $category->title) }}</td>
                        <td>{{ link_to("/suppliers/{$supplier->id}", $supplier->company_name) }}</td>
                        <td>{{ $product->quantity }} in 3 variants</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            {{ link_to("/categories/{$category->id}/products/{$product->id }", 'Details', ['class' => 'btn btn-info btn-sm']) }}
                            {{ link_to("/categories/{$category->id}/products/{$product->id }/edit", 'Edit', ['class' => 'btn btn-primary btn-sm']) }}
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
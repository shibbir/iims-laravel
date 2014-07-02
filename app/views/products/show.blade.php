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

    <hr />

    @if($product_metadata_collection->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Available</th>
                    <th>Last Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product_metadata_collection as $product_metadata)
                    <tr>
                        <td>{{ $product_metadata->serial }}</td>
                        <td>{{ $product_metadata->isAvailable ? 'Yes' : 'No' }}</td>
                        <td>{{ $product_metadata->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr />
        <div class="pull-right">
            {{ $product_metadata_collection->appends(Request::except('page'))->links() }}
        </div>
    @else
        <div class="alert alert-danger">
            Sorry. No product found!
        </div>
    @endif

@stop
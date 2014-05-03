@extends('layouts.master')

@section('title')
    Manage Categories
@stop

@section('content')
    {{ link_to_route('categories.create', 'Add New Category', [], $attributes = ['class' => 'btn btn-primary']) }}

    @include('shared._flashMessage')

    <h3>All Categories</h3>

    <hr />

    @if($categories->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 20%;">Title</th>
                    <th style="width: 50;">Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            {{ link_to("/categories/{$category->id }", 'Show Products', ['class' => 'btn btn-info btn-sm']) }}
                            {{ link_to("/categories/{$category->id }/edit", 'Edit', ['class' => 'btn btn-primary btn-sm']) }}
                            {{ link_to("/categories/{$category->id }/edit", 'Delete', ['class' => 'btn btn-danger btn-sm']) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr />
        <div class="pull-right">
            {{ $categories->appends(Request::except('page'))->links() }}
        </div>
    @else
        <div class="alert alert-danger">
            Sorry. No category found!
        </div>
    @endif
@stop
@extends('layouts.master')

@section('title')
    Update Category
@stop

@section('content')

    <h2>Category Update Form</h2>
    <hr />
    @include('shared._flashMessage')

    {{ Form::model($category, ['method' => 'PATCH', 'route' => ['categories.update', $category->id]]) }}
        @include('categories._formBody', ['buttonText' => 'Update Category'])
    {{ Form::close() }}

@stop
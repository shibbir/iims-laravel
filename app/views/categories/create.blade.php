@extends('layouts.master')

@section('title')
    Create New Category
@stop

@section('content')

    <h2>Category Create Form</h2>
    <hr />
    {{ Form::open(array('route' => 'categories.store')) }}
        @include('categories._formBody')
    {{ Form::close() }}

@stop
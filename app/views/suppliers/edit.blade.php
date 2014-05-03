@extends('layouts.master')

@section('title')
    Update Supplier
@stop

@section('content')

    <h2>Supplier Update Form</h2>
    <hr />
    @include('shared._flashMessage')

    {{ Form::model($supplier, ['method' => 'PATCH', 'route' => ['suppliers.update', $supplier->id]]) }}
        @include('suppliers._formBody', ['buttonText' => 'Update Supplier'])
    {{ Form::close() }}

@stop
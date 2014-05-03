@extends('layouts.master')

@section('title')
    Supplier Details
@stop

@section('content')

    <h3>Name: {{ $supplier->company_name }}</h3>
    <h4>Mobile Number: {{ $supplier->mobile }}</h4>
    <h4>Email: {{ $supplier->email }}</h4>
    <h4>Website: {{ $supplier->website }}</h4>

    <h4><address>Address: {{ $supplier->address }}</address></h4>
    {{ link_to("/suppliers/{$supplier->id }/edit", "Edit") }}

@stop
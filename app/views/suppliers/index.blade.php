@extends('layouts.master')

@section('title')
    Supplier List
@stop

@section('content')
    {{ link_to_route('suppliers.create', 'Add New Supplier', [], $attributes = ['class' => 'btn btn-primary']) }}

    @include('shared._flashMessage')

    <h3>All Suppliers</h3>

    <hr />

    @if($suppliers->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 15%;">Company Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th style="width: 30%;">Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->company_name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->mobile }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>
                            {{ link_to("/suppliers/{$supplier->id }", 'Details', ['class' => 'btn btn-info btn-sm']) }}
                            {{ link_to("/suppliers/{$supplier->id }/edit", 'Edit', ['class' => 'btn btn-primary btn-sm']) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr />
        <div class="pull-right">
            {{ $suppliers->appends(Request::except('page'))->links() }}
        </div>
    @else
        <div class="alert alert-danger">
            Sorry. No supplier found!
        </div>
    @endif
@stop
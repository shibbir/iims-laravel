@extends('layouts.master')

@section('title')
    Sales Invoices
@stop

@section('content')
    {{ link_to_route('sales.create', 'Create New Invoice', [], $attributes = ['class' => 'btn btn-primary']) }}

    @include('shared._flashMessage')

    <h3>Sales Invoices</h3>

    <hr />

    @if($sales_invoices->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Invoice Id</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Customer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales_invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->created_at }}</td>
                        <td>{{ $invoice->updated_at }}</td>
                        <td>{{ $invoice->customer_id }}</td>
                        <td>
                            {{ link_to("/sales/{$invoice->id }", 'Show', ['class' => 'btn btn-info btn-sm']) }}
                            {{ link_to("/sales/{$invoice->id }/edit", 'Edit', ['class' => 'btn btn-primary btn-sm']) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr />
        <div class="pull-right">
            {{ $sales_invoices->appends(Request::except('page'))->links() }}
        </div>
    @else
        <div class="alert alert-danger">
            Sorry. No sales invoice history found!
        </div>
    @endif
@stop
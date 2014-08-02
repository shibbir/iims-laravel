@extends('layouts.master')

@section('title')
    Customer Details
@stop

@section('content')

    <p>First Name: {{ $customer->first_name }}</p>
    <p>Last Name: {{ $customer->last_name }}</p>
    <p>Registration Date: {{ $customer->created_at }}</p>
    <p>Contact Number: {{ $customer->contact }}</p>

    <p><address>Address: {{ $customer->address }}</address></p>
    {{ link_to("/customers/{$customer->id }/edit", "Edit") }}

    <hr />

    <h3>Sales invoices</h3>
    <div id="customer-invoice">
        @if($invoices->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Invoice Id</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Created By</th>
                        <th>Net Payable Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->created_at }}</td>
                            <td>{{ $invoice->updated_at }}</td>
                            <td>{{ link_to("/users/{$invoice->user->id }", $invoice->user->name) }}</td>
                            <td>{{ $invoice->net_payable_amount }}</td>
                            <td>
                                {{ link_to("/sales/{$invoice->id }", 'Show Details', ['class' => 'btn btn-info btn-sm']) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr />
            <div class="pull-right">
                {{ $invoices->appends(Request::except('page'))->links() }}
            </div>
        @else
            <div class="alert alert-danger">
                Sorry. No invoice history found!
            </div>
        @endif
    </div>

@stop
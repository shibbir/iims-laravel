@extends('layouts.master')

@section('title')
    Customer List
@stop

@section('content')
    {{ link_to_route('customers.create', 'Add New Customer', [], $attributes = ['class' => 'btn btn-primary']) }}

    @include('shared._flashMessage')

    <h3>All Customers</h3>

    <hr />

    @if($customers->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->first_name }}</td>
                        <td>{{ $customer->last_name }}</td>
                        <td>{{ $customer->contact }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            {{ link_to("/customers/{$customer->id }", 'Show', ['class' => 'btn btn-info btn-sm']) }}
                            {{ link_to("/customers/{$customer->id }/edit", 'Edit', ['class' => 'btn btn-primary btn-sm']) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr />
        <div class="pull-right">
            {{ $customers->appends(Request::except('page'))->links() }}
        </div>
    @else
        <div class="alert alert-danger">
            Sorry. No customer found!
        </div>
    @endif
@stop
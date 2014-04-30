@extends('layouts.master')

@section('content')
    {{ link_to_route('customers.create', 'Add New Customer', [], $attributes = ['class' => 'btn btn-primary']) }}

    @include('shared._flashMessage')

    <h3>All Customers</h3>

    @if($customers->count())
        <table class="table">
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
                        <td>{{ $customer->firstName }}</td>
                        <td>{{ $customer->lastName }}</td>
                        <td>{{ $customer->contact }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ link_to("/customers/{$customer->id }", 'Show') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-danger">
            Sorry. No customer found!
        </div>
    @endif
@stop
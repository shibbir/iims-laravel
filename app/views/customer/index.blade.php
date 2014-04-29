@extends('layouts.master')

@section('content')
    {{ link_to_route('customers.create', 'Add New Customer', [], $attributes = ['class' => 'btn btn-primary']) }}
    @include('shared._flashMessage')
    <h3>All Customer</h3>
    @if($customers->count())
        <ul>
            @foreach($customers as $customer)
                <li> {{ link_to("/customers/{$customer->id }", $customer->firstName) }} </li>
            @endforeach
        </ul>
    @else
        <p>No customer found!</p>
    @endif
@stop
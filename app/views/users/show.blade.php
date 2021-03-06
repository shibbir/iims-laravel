@extends('layouts.master')

@section('title')
    User Details
@stop

@section('content')
    <h3>Name: {{ $user->name }}</h3>
    <h4>Email: {{ $user->email }}</h4>
    <h4>Contact Number: {{ $user->contact }}</h4>

    <h4><address>Address: {{ $user->address }}</address></h4>
    {{ link_to("/users/{$user->id }/edit", "Edit") }}

@stop
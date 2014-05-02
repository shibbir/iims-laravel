@extends('layouts.master')

@section('title')
    Add New User
@stop

@section('content')

    <h2>User Create Form</h2>
    {{ Form::open(array('route' => 'users.store')) }}
        @include('users._formBody')
    {{ Form::close() }}

@stop
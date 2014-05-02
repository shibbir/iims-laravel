@extends('layouts.master')

@section('title')
    Update User
@stop

@section('content')
    <h2>User Update Form</h2>
    @include('shared._flashMessage')

    {{ Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) }}
        @include('users._formBody', ['buttonText' => 'Update User'])
    {{ Form::close() }}

@stop
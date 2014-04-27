@extends('layouts.welcome')

@section('content')

    <div class="well">
        <legend>Please Sign In</legend>
        @if (Session::get('flash_message'))
        <div class="alert alert-{{ Session::get('flash_type') }}">
            {{ Session::get('flash_message') }}
        </div>
        @endif
        {{ Form::open(array('route' => 'sessions.store')) }}
        <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span>
            {{ Form::text('username', '', ['placeholder' => 'Username', 'style' => 'width: 343px;']) }}
        </div>
        <div class="input-prepend">
            <span class="add-on"><i class="icon-key"></i></span>
            {{ Form::password('password', ['placeholder' => 'Password', 'style' => 'width: 343px;']) }}
        </div>
        <br/>
        <button type="submit" class="btn btn-info btn-block">Sign in</button>
        {{ Form::close() }}
    </div>

@stop
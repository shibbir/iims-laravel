@extends('layouts.welcome')

@section('content')

    <div class="well">
        <legend>Please Sign In</legend>

        @include('shared._flashMessage')

        {{ Form::open(array('route' => 'sessions.store')) }}
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                {{ Form::text('username', '', ['placeholder' => 'Username', 'style' => 'width: 343px;']) }}
                {{ $errors->first('username', '<span class="error">:message</span>')}}
            </div>

            <div class="input-prepend">
                <span class="add-on"><i class="icon-key"></i></span>
                {{ Form::password('password', ['placeholder' => 'Password', 'style' => 'width: 343px;']) }}
                {{ $errors->first('password', '<span class="error">:message</span>')}}
            </div>

            <br />
            {{ Form::submit('Sign in', ['class' => 'btn btn-info btn-block']) }}
        {{ Form::close() }}
    </div>

@stop
@extends('layouts.welcome')

@section('content')

    <div class="well">
        <legend>Please Sign In</legend>

        @include('shared._flashMessage')

        {{ Form::open(array('route' => 'sessions.store')) }}
            <div class="form-group">
                {{ Form::text('username', '', ['placeholder' => 'Username', 'class' => 'form-control']) }}
                {{ $errors->first('username', '<span class="error">:message</span>')}}
            </div>

            <div class="form-group">
                {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
                {{ $errors->first('password', '<span class="error">:message</span>')}}
            </div>

            <br />
            {{ Form::submit('Sign in', ['class' => 'btn btn-info btn-block']) }}
        {{ Form::close() }}
    </div>

@stop
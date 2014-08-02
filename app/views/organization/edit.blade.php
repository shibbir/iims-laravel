@extends('layouts.master')

@section('title')
    Update Organization Info
@stop

@section('content')

    <h2>Organization Update Form</h2>
    <hr />
    @include('shared._flashMessage')

    {{ Form::model($organization, ['method' => 'PATCH', 'route' => 'organization']) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}
            {{ $errors->first('title', '<span class="error">:message</span>')}}
        </div>

        <div class="form-group">
            {{ Form::label('sub_title', 'SubTitle') }}
            {{ Form::text('sub_title', null, ['class' => 'form-control']) }}
            {{ $errors->first('sub_title', '<span class="error">:message</span>')}}
        </div>

        <div class="form-group">
            {{ Form::label('mobile', 'Mobile') }}
            {{ Form::text('mobile', null, ['class' => 'form-control']) }}
            {{ $errors->first('mobile', '<span class="error">:message</span>')}}
        </div>

        <div class="form-group">
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('phone', null, ['class' => 'form-control']) }}
            {{ $errors->first('phone', '<span class="error">:message</span>')}}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
            {{ $errors->first('email', '<span class="error">:message</span>')}}
        </div>

        <div class="form-group">
            {{ Form::label('website', 'Website') }}
            {{ Form::text('website', null, ['class' => 'form-control']) }}
            {{ $errors->first('website', '<span class="error">:message</span>')}}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
            {{ $errors->first('description', '<span class="error">:message</span>')}}
        </div>

        <div class="form-group">
            {{ Form::label('address', 'Address') }}
            {{ Form::textarea('address', null, ['class' => 'form-control']) }}
            {{ $errors->first('address', '<span class="error">:message</span>')}}
        </div>

        <button type="submit" class="btn btn-success">
            <i class="icon-plus icon-white"></i> Update
        </button>
        <button type="reset" class="btn">Reset</button>
    {{ Form::close() }}

@stop
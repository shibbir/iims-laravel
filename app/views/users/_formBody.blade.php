<div class="form-group">
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username', null, ['class' => 'form-control']) }}
    {{ $errors->first('username', '<span class="error">:message</span>')}}
</div>

@if(!isset($buttonText))
    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['class' => 'form-control']) }}
        {{ $errors->first('password', '<span class="error">:message</span>')}}
    </div>

    <div class="form-group">
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
        {{ $errors->first('password_confirmation', '<span class="error">:message</span>')}}
    </div>
@endif

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    {{ $errors->first('name', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('contact', 'Contact') }}
    {{ Form::text('contact', null, ['class' => 'form-control']) }}
    {{ $errors->first('contact', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
    {{ $errors->first('email', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('address', 'Address') }}
    {{ Form::textarea('address', null, ['class' => 'form-control']) }}
    {{ $errors->first('address', '<span class="error">:message</span>')}}
</div>

<button type="submit" class="btn btn-success">
    <i class="icon-plus icon-white"></i> {{ isset($buttonText) ? $buttonText : "Create User" }}
</button>
<button type="reset" class="btn">Reset</button>
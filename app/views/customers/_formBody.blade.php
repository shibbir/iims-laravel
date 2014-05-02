<div class="form-group">
    {{ Form::label('first_name', 'First Name') }}
    {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    {{ $errors->first('first_name', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('last_name', 'Last Name') }}
    {{ Form::text('last_name', null, ['class' => 'form-control']) }}
    {{ $errors->first('last_name', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('contact', 'Contact') }}
    {{ Form::text('contact', null, ['class' => 'form-control']) }}
    {{ $errors->first('contact', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('address', 'Address') }}
    {{ Form::textarea('address', null, ['class' => 'form-control']) }}
    {{ $errors->first('address', '<span class="error">:message</span>')}}
</div>

<button type="submit" class="btn btn-success">
    <i class="icon-plus icon-white"></i> {{ isset($buttonText) ? $buttonText : "Add Customer" }}
</button>
<button type="reset" class="btn">Reset</button>
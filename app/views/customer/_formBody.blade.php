<div class="form-group">
    {{ Form::label('firstName', 'First Name') }}
    {{ Form::text('firstName', '', ['class' => 'form-control']) }}
    {{ $errors->first('firstName', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('lastName', 'Last Name') }}
    {{ Form::text('lastName', '', ['class' => 'form-control']) }}
    {{ $errors->first('lastName', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('contact', 'Contact') }}
    {{ Form::text('contact', '', ['class' => 'form-control']) }}
    {{ $errors->first('contact', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('address', 'Address') }}
    {{ Form::textarea('address', '', ['class' => 'form-control']) }}
    {{ $errors->first('address', '<span class="error">:message</span>')}}
</div>

<button type="submit" class="btn btn-success">
    <i class="icon-plus icon-white"></i> {{ isset($buttonText) ? $buttonText : "Add Customer" }}
</button>
<button type="reset" class="btn">Reset</button>
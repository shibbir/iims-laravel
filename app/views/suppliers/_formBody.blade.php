<div class="form-group">
    {{ Form::label('company_name', 'Company Name') }}
    {{ Form::text('company_name', null, ['class' => 'form-control']) }}
    {{ $errors->first('company_name', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('phone', 'Phone') }}
    {{ Form::text('phone', null, ['class' => 'form-control']) }}
    {{ $errors->first('phone', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('mobile', 'Mobile') }}
    {{ Form::text('mobile', null, ['class' => 'form-control']) }}
    {{ $errors->first('mobile', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
    {{ $errors->first('email', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('website', 'Website') }}
    {{ Form::url('website', null, ['class' => 'form-control']) }}
    {{ $errors->first('website', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('fax', 'Fax') }}
    {{ Form::text('fax', null, ['class' => 'form-control']) }}
    {{ $errors->first('fax', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('address', 'Address') }}
    {{ Form::textarea('address', null, ['class' => 'form-control']) }}
    {{ $errors->first('address', '<span class="error">:message</span>')}}
</div>

<button type="submit" class="btn btn-success">
    <i class="icon-plus icon-white"></i> {{ isset($buttonText) ? $buttonText : "Add Supplier" }}
</button>
<button type="reset" class="btn">Reset</button>
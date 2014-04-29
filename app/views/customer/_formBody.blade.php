<div class="modal-body">
    <div class="control-group">
        {{ Form::label('firstName', 'First Name', ['class' => 'control-label']) }}
        <div class="controls">
            {{ Form::text('firstName') }}
        </div>
        {{ $errors->first('firstName', '<span class="error">:message</span>')}}
    </div>

    <div class="control-group">
        {{ Form::label('lastName', 'Last Name', ['class' => 'control-label']) }}
        <div class="controls">
            {{ Form::text('lastName') }}
        </div>
        {{ $errors->first('lastName', '<span class="error">:message</span>')}}
    </div>

    <div class="control-group">
        {{ Form::label('contact', 'Contact', ['class' => 'control-label']) }}
        <div class="controls">
            {{ Form::text('contact') }}
        </div>
        {{ $errors->first('contact', '<span class="error">:message</span>')}}
    </div>

    <div class="control-group">
        {{ Form::label('address', 'Address', ['class' => 'control-label']) }}
        <div class="controls">
            {{ Form::textarea('address') }}
        </div>
        {{ $errors->first('address', '<span class="error">:message</span>')}}
    </div>
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-success">
        <i class="icon-plus icon-white"></i> {{ isset($buttonText) ? $buttonText : "Add Customer" }}
    </button>
    <button type="reset" class="btn">Reset</button>
</div>
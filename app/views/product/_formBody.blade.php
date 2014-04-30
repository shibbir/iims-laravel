<div class="modal-body">
    <div class="control-group">
        {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
        <div class="controls">
            {{ Form::text('title') }}
        </div>
        {{ $errors->first('title', '<span class="error">:message</span>')}}
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
        {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
        <div class="controls">
            {{ Form::textarea('description') }}
        </div>
        {{ $errors->first('description', '<span class="error">:message</span>')}}
    </div>
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-success">
        <i class="icon-plus icon-white"></i> {{ isset($buttonText) ? $buttonText : "Add Product" }}
    </button>
    <button type="reset" class="btn">Reset</button>
</div>
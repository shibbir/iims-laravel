<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
    {{ $errors->first('title', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    {{ $errors->first('description', '<span class="error">:message</span>')}}
</div>

<button type="submit" class="btn btn-success">
    <i class="icon-plus icon-white"></i> {{ isset($buttonText) ? $buttonText : "Create Category" }}
</button>
<button type="reset" class="btn">Reset</button>
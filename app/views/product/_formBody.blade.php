<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', '', ['class' => 'form-control']) }}
    {{ $errors->first('title', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('categoryId', 'Category') }}
    {{ Form::select('categoryId', array(1 => 'Miscellaneous', 2 => 'Processor', 3 => 'Motherboard'), ['class' => 'form-control']) }}
    {{ $errors->first('categoryId', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('quantity', 'Quantity') }}
    {{ Form::text('quantity', '', ['class' => 'form-control']) }}
    {{ $errors->first('quantity', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('unitPrice', 'Unit Price', ['class' => 'control-label']) }}
    {{ Form::text('unitPrice', '', ['class' => 'form-control']) }}
    {{ $errors->first('unitPrice', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('warranty', 'Warranty') }}
    {{ Form::text('warranty', '', ['class' => 'form-control']) }}
    {{ $errors->first('warranty', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', '', ['class' => 'form-control']) }}
    {{ $errors->first('description', '<span class="error">:message</span>')}}
</div>

<button type="submit" class="btn btn-success">
    <i class="icon-plus icon-white"></i> {{ isset($buttonText) ? $buttonText : "Add Product" }}
</button>
<button type="reset" class="btn">Reset</button>
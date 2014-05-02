<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
    {{ $errors->first('title', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('category_id', 'Category') }}
    {{ Form::select('category_id', array(1 => 'Miscellaneous', 2 => 'Processor', 3 => 'Motherboard'), ['class' => 'form-control']) }}
    {{ $errors->first('category_id', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('quantity', 'Quantity') }}
    {{ Form::text('quantity', null, ['class' => 'form-control']) }}
    {{ $errors->first('quantity', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('unit_price', 'Unit Price', ['class' => 'control-label']) }}
    {{ Form::text('unit_price', null, ['class' => 'form-control']) }}
    {{ $errors->first('unit_price', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('warranty', 'Warranty') }}
    {{ Form::text('warranty', null, ['class' => 'form-control']) }}
    {{ $errors->first('warranty', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    {{ $errors->first('description', '<span class="error">:message</span>')}}
</div>

<button type="submit" class="btn btn-success">
    <i class="icon-plus icon-white"></i> {{ isset($buttonText) ? $buttonText : "Add Product" }}
</button>
<button type="reset" class="btn">Reset</button>
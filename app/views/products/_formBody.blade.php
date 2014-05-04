<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
    {{ $errors->first('title', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('category_id', 'Category') }}
    {{ Form::select('category_id', $categories, $selected_category_id, ['class' => 'form-control']) }}
    {{ $errors->first('category_id', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('supplier_id', 'Supplier') }}
    {{ Form::select('supplier_id', $suppliers, null, ['class' => 'form-control']) }}
    {{ $errors->first('supplier_id', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('quantity', 'Quantity') }}
    {{ Form::text('quantity', null, ['class' => 'form-control']) }}
    {{ $errors->first('quantity', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('buy_price', 'Buy Price', ['class' => 'control-label']) }}
    {{ Form::text('buy_price', null, ['class' => 'form-control']) }}
    {{ $errors->first('buy_price', '<span class="error">:message</span>')}}
</div>

<div class="form-group">
    {{ Form::label('retail_price', 'Retail Price', ['class' => 'control-label']) }}
    {{ Form::text('retail_price', null, ['class' => 'form-control']) }}
    {{ $errors->first('retail_price', '<span class="error">:message</span>')}}
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

<script>
    window.onload = function () {
        $("#description").cleditor();
    };
</script>
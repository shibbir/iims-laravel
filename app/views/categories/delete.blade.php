@extends('layouts.master')

@section('title')
    Confirm Deletetion of Record
@stop

@section('content')
    <h2>Deleting Record Confirmation Section</h2>
    <hr />
    <p>Are you sure you want to delete the <strong>{{ $category->title }}</strong> category?</p>

    {{ Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id]]) }}
        {{ Form::submit('Yes, I want to delete', ['class' => 'btn btn-danger']) }}
    {{ Form::close() }}
    <br />
    <p>
        {{ link_to("/categories", 'No, go back to category page.') }}
    </p>

    <hr />
    <h4>Here is what will happen if you delete this category:</h4>

    <ul class="list-group">
        <li class="list-group-item">If you delete this record, you cannot undo this.</li>
        <li class="list-group-item">All products that belongs to this category will be moved under the default category.</li>
    </ul>
@stop
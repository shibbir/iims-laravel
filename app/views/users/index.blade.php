@extends('layouts.master')

@section('title')
    All Users
@stop

@section('content')
    {{ link_to_route('users.create', 'Add New User', [], $attributes = ['class' => 'btn btn-primary']) }}

    @include('shared._flashMessage')

    <h3>All Users</h3>

    <hr />

    @if($users->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="width: 22%;">{{ $user->address }}</td>
                        <td>
                            {{ link_to("/users/{$user->id }", 'Show', ['class' => 'btn btn-info btn-sm']) }}
                            {{ link_to("/users/{$user->id }/edit", 'Edit', ['class' => 'btn btn-primary btn-sm']) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr />
        <div class="pull-right">
            {{ $users->appends(Request::except('page'))->links() }}
        </div>
    @else
        <div class="alert alert-danger">
            Sorry. No user found!
        </div>
    @endif
@stop
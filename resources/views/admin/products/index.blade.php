@extends('layouts.admin')

@section('content')
@if(Session::has('deleted_user'))
<p class="bg-danger">{{session('deleted_user')}}</p>
@endif

<h1>Users</h1>
@if (count($users) == 0)

You have no users!

@else

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key=>$user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img height="50" src="{{$user->photo ? asset( $user->photo->file ): 'http://placehold.it/400x400'}}" alt="" ></td>
            <td> <a href="{{ url('admin/users/'.$user->id.'/edit') }}"> {{$user->name}} </a> </td>
            <td>{{$user->email}}</td>
            <td>{{$user->isActive?'active':'inactive'}}</td>
            <td>No Status</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
        </tr>
        @endforeach  
    </tbody>
</table>
@endif 

@stop
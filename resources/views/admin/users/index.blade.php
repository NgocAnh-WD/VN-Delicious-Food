@extends('layouts.admin')

@section('content')

@if(Session::has('create_user'))
<p class="bg-danger">{{session('create_user')}}</p>
@endif

@if(Session::has('deleted_use'))
<p class="bg-danger">{{session('deleted_user') }}</p>
@endif

@if(Session::has('update_user'))
<p class="bg-danger">{{session('update_user') }}</p>
@endif

<h1>Users</h1>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Active</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Address</th>
            <th>Role</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>

    <tbody>
        @if($users)

        @foreach ($users as $user) 
        <tr>
            <td>{{$user->id}}</td>
            <td><img height="50" width="50" src="{{$user['avata_image'] ? asset($user->avata_image) : 'http://placehold.it/400x400' }}" alt="image"></td>
            <td><a href="{{route('admin.users.edit',$user->id) }}" > {{$user->username}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->is_active?'active':'inactive'}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->date_of_birth}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
        </tr>
        @endforeach
        @endif

    </tbody>
</table>

<!--phần phân trang trong lavavel-->
<div class="row">
    <div class="col-lg-6 col-sm-offset-5">
        {{$users->render()}}
    </div>
</div>
@stop




@extends('layouts.admin')

@section('content')
<h1>Edit User</h1>

<div class="container">
    <form action="{{ route('admin.users.update', $users->id) }}" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">

        <div class=" row col-md-7 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">Username:</label>
            <input type="text" id="username" name="name" class="form-control" placeholder="Enter user name" value="{{ $users ->username }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div> 

        <div class="row col-md-7 form-group {{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="Your Address" value="{{ $users ->address }}">
            <span class="text-danger">{{ $errors->first('address') }}</span>
        </div>

        <div class=" row col-md-7  form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $users ->email }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>

        <!--
                    <div class=" row col-md-12 form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                        <label for="categoryname">Category:</label>
                        <input type="text" id="username" name="categoryname" class="form-control" placeholder="Active" value="{{ old('categoryname') }}">
                        <span class="text-danger">{{ $errors->first('categoryname') }}</span>
                    </div> -->

        <div class=" row  col-md-7 form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
            <label for="is_active">Activate Account:</label>
            <input type="checkbox" id="is_active" name="is_active" value="1" @if($users ->is_active ==1) checked @endif>
                   <span class="text-danger">{{ $errors->first('is_active') }}</span>
        </div> 

        <div class="row  col-md-7 form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
            <label for="gender">Gender:</label>

            <select id="gender" class="form-control" name="gender">
                <option hidden="" value="{{$gender->gender}}">{{$gender->gender}}</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <span class="text-danger">{{ $errors->first('gender') }}</span>
        </div>

        <div class="row col-md-7 form-group {{ $errors->has('date') ? ' has-error' : '' }}">
            <label for="date">Birthday:</label>
            <input id="date" type="date" class="form-control" name="date" placeholder="Input your birthday" value="{{ $users ->date_of_birth }}">
            <span class="text-danger">{{ $errors->first('date') }}</span>
        </div>

        <div class="row col-md-7 form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone">Phone:</label>
            <input id="phone" type="number" class="form-control" name="phone" placeholder="Your Phone" value="{{ $users ->phone }}">
            <span class="text-danger">{{ $errors->first('phone') }}</span>
        </div>

        <div class="row col-md-7 form-group">
            <img src="{{$users->avata_image ? asset( $users->avata_image ): 'http://placehold.it/400x400'}}" height="300" alt="" class="img-responsive img-rounded">
        </div>

        <div class="row col-md-7 form-group {{ $errors->has('avata_image') ? 'has-error' : '' }}">
            <label for="avata_image">Thumnail:</label>
            <input type="file" id="photo_id" name="avata_image" class="form-control" value="value="{{ $users->avata_image }}"">
            <span class="text-danger">{{ $errors->first('avata_image') }}</span>
        </div> 

        <div class=" row  col-md-7 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" value="">
            <span class="text-danger">{{ $errors->first('password') }}</span>
        </div> 


        <div class="row  col-md-7 form-group">
            <input type="submit" class="btn btn-success" value="Edit User" />
        </div>

    </form>

    <form action="{{ route('admin.users.destroy', $users->id)}}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="row  col-md-7 form-group">
            <input type="submit" class="btn btn-danger" value="Delete User"/>
        </div>
    </form>
</div>

@stop
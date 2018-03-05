@extends('layouts.admin')

@section('content')
<h1>Edit Users</h1>
<div class="row col-sm-3">
    <img src="{{$user->photo ? asset( $user->photo->file ): 'http://placehold.it/400x400'}}"  alt="" class="img-responsive img-rounded">
</div>
<div class="row">
    @include('includes.form_error')
</div>
<div class="row">

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype='multipart/form-data'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_method" value="PUT">
        
        <div class=" form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="{{ $user->name  }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>   

        <div class="  form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Email:</label>
            <input type="text" disabled="" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $user->email  }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
 
        <div class=" form-group" style="margin-bottom: 30px;">
            <div class="col-lg-6 {{ $errors->has('isActive') ? 'has-error' : '' }}">
                <label for="isActive">Active account:</label>
                <input type="checkbox" id="isActive" name="isActive" value="1"  @if ( $user->isActive == 1 ) checked   @endif />
                <span class="text-danger">{{ $errors->first('isActive') }}</span>
            </div>

            <div class=" col-lg-6 {{ $errors->has('isActive') ? 'has-error' : '' }}">
                <label for="isAdmin">Admin account:</label>
                <input type="checkbox" id="isAdmin" name="isAdmin" value="1"  @if ( $user->isAdmin == 1 ) checked   @endif />
                <span class="text-danger">{{ $errors->first('isAdmin') }}</span>
            </div>
        </div> 

        <div class="  form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" value="">
            <span class="text-danger">{{ $errors->first('password') }}</span>
        </div> 

        <div class="  form-group {{ $errors->has('photo_id') ? 'has-error' : '' }}">
            <label for="photo_id">User photo:</label>
            <input type="file" id="photo_id" name="photo_id" class="form-control" value="{{ old('photo_id') }}">
            <span class="text-danger">{{ $errors->first('photo_id') }}</span>
        </div> 
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Edit User" />
        </div>
    </form>

    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" >
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Delete User" />

        </div>
    </form>

</div>    
@stop


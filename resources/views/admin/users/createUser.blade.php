
@extends('layouts.admin');

@section('content')
    <h1>Create User</h1>
    
    @if(count($errors))
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br/>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="container">
        <form action="{{ url('/admin/user') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class=" row col-md-7 form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter user name" value="{{ old('username') }}" required>
                <span class="text-danger">{{ $errors->first('username') }}</span>
            </div> 
            
            <div class="row col-md-7 form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address">Address:</label>
                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Your Address" required>
                <span class="text-danger">{{ $errors->first('address') }}</span>
            </div>

            <div class=" row col-md-7  form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            
            <div class=" row  col-md-7 form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                <label for="is_active">Activate Account:</label>
                <input type="checkbox" id="is_active" name="is_active" value="{{ old('is_active') }}">
                <span class="text-danger">{{ $errors->first('is_active') }}</span>
            </div> 

            <div class="row  col-md-7 form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                <label for="gender">Gender:</label>
                
                <select id="gender" class="form-control" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select> 
                <span class="text-danger">{{ $errors->first('gender') }}</span>
            </div>

            <div class="row col-md-7 form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="date">Birthday:</label>
                <input id="date" type="date" class="form-control" name="date" placeholder="Input your birthday" value="{{ old('date') }}" required>
                <span class="text-danger">{{ $errors->first('date') }}</span>
            </div>

            <div class="row col-md-7 form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone">Phone:</label>
                <input id="phone" type="number" class="form-control" name="phone" placeholder="Your Phone" value="{{ old('phone') }}" required>
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            </div>
            
            <div class=" row col-md-7 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}">
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div> 
            
<!--            <div class="  form-group {{ $errors->has('avata_image') ? 'has-error' : '' }}">
                <label for="avata_image">Avatar:</label>
                <input type="file"  name="avata_image" class="form-control" value="{{ old('avata_image') }}">
                <span class="text-danger">{{ $errors->first('avata_image') }}</span>
            </div> -->

            <div class="row col-md-7 form-group">
                <input type="submit" class="btn btn-success" value="Create User" />
            </div>
        </form>
    </div>
        
@stop
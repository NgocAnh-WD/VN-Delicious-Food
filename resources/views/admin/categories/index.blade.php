@extends('layouts.admin')

@section('content')
<h1 style="color: #0099CC; text-align: center; margin-top: 10px;">Categories</h1>
@if(Session::has('deleted_category'))
<p class="bg-danger">{{session('deleted_category')}}</p>
@endif
<div class="container">
    <!--    <form action="" method="post">-->
    <form action="{{route('admin.categories.store')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row col-md-4 form-group {{ $errors->has('name') ? 'has-error' : '' }} ">           
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
            <label for="description" style="margin-top: 20px;">Description:</label>
            <input type="text" id="description" name="description" class="form-control" placeholder="Enter description" value="{{ old('description') }}">
            <span class="text-danger">{{ $errors->first('description') }}</span> 

            <div class="form-group" style="margin-top: 10px;">
                <input type="submit" class="btn btn-success" value="Create Category" />
            </div>
        </div>

        <div class="row col-md-8 form-group" style="margin-left: 10px;">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created date</th> 
                        <th>Updated date</th>
                        <th>Action</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <th>{{$category->name}}</th>
                        <th>{{$category->description}}</th>
                        <th>{{$category->created_at}}</th>
                        <th>{{$category->updated_at}}</th>
                        <th><a href="{{ url('admin/categories/'.$category->id.'/edit') }}">Edit</a></th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<h1 style="color: #0099CC; text-align: center; margin-top: 10px;">Categories</h1>
@if(Session::has('deleted_category'))
<p class="bg-danger">{{session('deleted_category')}}</p>
@endif
<div class="container">
    <form action="{{route('admin.categories.update', $category->id)}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">

        <div class="row col-md-4 form-group {{ $errors->has('name') ? 'has-error' : '' }} ">           
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="{{ $category->name}}">
            <span class="text-danger">{{ $errors->first('name') }}</span>

            <label for="description" style="margin-top: 20px;">Description:</label>
            <input type="text" id="description" name="description" class="form-control" placeholder="Enter description" value="{{$category->description}}">
            <span class="text-danger">{{ $errors->first('description') }}</span> 

            <div class="form-group" style="margin-top: 10px;">
                <input type="submit" class="btn btn-success" value="Edit Category" />
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

                    <tr>
                        <th>{{$category->id}}</th>
                        <th>{{$category->name}}</th>
                        <th>{{$category->description}}</th>
                        <th>{{$category->created_at}}</th>
                        <th>{{$category->updated_at}}</th>
                        <th>
                    </tr>

                </tbody>
            </table>
        </div>
    </form>
    <div class="col-md-8" style="margin-top: 45px; margin-left: 10px;">
        <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST" >
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Delete Category" />

            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<h1>Categories</h1>
@if(Session::has('deleted_category'))
<p class="bg-danger">{{session('deleted_category')}}</p>
@endif
<div class="container">
    <!--    <form action="" method="post">-->
    <form action="{{route('admin.categories.store')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class=" row col-md-5  form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>


            <div class="form-group" style="margin-top: 10px;">
                <input type="submit" class="btn btn-success" value="Create Category" />
            </div>
        </div>
        <!--    </form>-->
        <div class="row col-md-6 form-group" style="margin-left: 10px;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Parent ID</th>
                        <th>Created date</th> 
                        <th>Updated date</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <th><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></th>
                        <th>{{$category->parent_id}}</th>
                        <th>{{$category->created_at}}</th>
                        <th>{{$category->updated_at}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>
@endsection
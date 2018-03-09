@extends('layouts.admin')
@section('content')

<h1>Create Product</h1>
<div class="row">
    @include('includes.form_error')
</div>
<div class="row">
    <form class="form-horizontal" action="{{ route('admin.products.store') }}" method="post" enctype='multipart/form-data' >
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <div class=" form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="username" class="col-md-4 control-label">Product name</label>
            <div class="col-md-6">
                 <input type="text" id="name" name="name" class="col-md-4 control-label" placeholder="Enter product name" value="{{ old('name') }}">
                 <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>                
        </div>   
        
        <div class=" form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                    <label for="username" class="col-md-4 control-label">Category:</label>
                    <div class="col-md-6">
                        <select class="form-control" id="category_id" name="category_id" >
                       @foreach ($categories as $id => $name  )
                       <option value="{{$id}}">{{$name}}</option>
                        @endforeach   
                     </select>                
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    </div>    
        </div> 
        
        <div class=" form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description:</label>
            <div class="col-md-6">
                 <input type="text" id="name" name="description" class="col-md-4 control-label" placeholder="Enter description" value="{{ old('description') }}">
                 <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>                
        </div>  
       
        <div class="  form-group {{ $errors->has('photo_id') ? 'has-error' : '' }}">
               <label for="photop_id" class="col-md-4 control-label">Photo:</label>
               <div class="col-md-6">
                 <input type="file" id="photo_id" name="photo_id" class="form-control" value="{{ old('photo_id') }}">
                 <span class="text-danger">{{ $errors->first('photo_id') }}</span>
               </div>
        </div> 

   
            <div class="col-md-6">
                <input type="submit" class="btn btn-success" value="Create " />
            </div>
  
    </form>

</div>    

@stop
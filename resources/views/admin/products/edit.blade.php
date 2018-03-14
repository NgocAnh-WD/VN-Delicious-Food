@extends('layouts.admin')
@section('content')
    @include('includes.tinyeditor')

    <h1>Create Products</h1>

    <div class="row">
        <form action="{{ route('admin.products.update',$product->id) }}" method="post" enctype='multipart/form-data'>
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="hidden" name="_method" value="PUT">
   
            <div class=" form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name:</label>
                    <input type="text" id="title" name="name" class="form-control" placeholder="Enter title" value="{{ $product->name }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>        
            <div class=" form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                    <label for="category_id">Category:</label>
                    <select class="form-control" id="category_id" name="category_id" >
                       @foreach ($categories as $id => $name  )
                       <option value="{{$id}}">{{$name}}</option>
                        @endforeach   
                     </select>                
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
            </div>  
            
            <div class="form-group " style="width:  200px">
                <img src="{{$product->photo() ? asset( $product->photo()->link_image ): 'http://placehold.it/400x400'}}" height="300" alt="" class="img-responsive img-rounded">
            </div>
           <br>
            
            <div class="  form-group {{ $errors->has('link_image') ? 'has-error' : '' }}">
                <label for="link_image">Thumbnail:</label>
                <input type="file" id="link_image" name="link_image" class="form-control" value="{{ $product->link_image }}">
                <span class="text-danger">{{ $errors->first('link_image') }}</span>
           </div> 
                       
           <div class=" form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="body">Descriptions:</label>
                     <textarea class="form-control" rows="5" id="body" name="description">{{ $product->description }}</textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
            </div> 
            
<!--            <div class=" form-group {{ $errors->has('is_delete') ? 'has-error' : '' }}">
                    <label for="is_delete">Is_delete:</label>
                    <input type="radio" class="form-control" rows="5" id="is_delete" name="is_delete" value="1"/>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
            </div>-->
            
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Save" />
            </div>
        </form>
    </div>
    
     <div class="col-md-8" style="margin-top: 45px; margin-left: 10px;">
        <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST" >
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Delete" />

            </div>
        </form>
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>
@stop
@extends('layouts.admin')
@section('content')
@include('includes.tinyeditor')

<h1>Create Products</h1>

<div class="container">
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
                @foreach ($child_categories as $id => $name  )
                <option value="{{$id}}">{{$name}}</option>
                @endforeach   
            </select>                
            <span class="text-danger">{{ $errors->first('category_id') }}</span>
        </div>  

        <div class="form-group " style="width:  200px">
            <img src="{{$product->thumbnail() ? asset( $product->thumbnail()->link_image ): 'http://placehold.it/400x400'}}" height="300" alt="" class="img-responsive img-rounded">
        </div>

        <br>

        <div class="  form-group {{ $errors->has('link_image') ? 'has-error' : '' }}">
            <label for="link_image">Thumbnail:</label>
            <input type="file" id="link_image" name="link_image" class="form-control" value="{{ $product->thumbnail()->link_image }}">
            <span class="text-danger">{{ $errors->first('link_image') }}</span>
        </div> 
        
        <div class="space-4"></div>
        <div class="space-4"></div>
        
        <div class="row" id="show_image_delete">
            @foreach ($product->image() AS $img)
            <div class="col-md-3">
                <div class="form-group" style="width: 200px">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" id="image_id" value="{{$img->id}}">
                    <input type="hidden" id="product_id" value="{{$product->id}}">
                    <input type="hidden" name="_method" value="delete">
                    <img style="width: 300px; height: 250px" src="{{$img->link_image ? asset ($img->link_image ): 'http://placehold.it/400x400'}}" height="300" class="img-responsive img-rounded">
                    <div class="space-4"></div>    
                    <button type="button" class="" id="image_delete{{$img->id}}" value="{{$img->id}}" onclick="deleteImages({{$img->id}})">Delete</button>    
                </div>                   
            </div>             
            @endforeach
        </div>      
        
        <div class="  form-group {{ $errors->has('image') ? 'has-error' : '' }}">
            <label for="image">Image:</label>
            <input type="file" id="link_image" name="image" class="form-control" value="{{ old('image') }}">
            <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>
        
        <div class="space-4"></div>

        <div class=" form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="body">Descriptions:</label>
            <textarea class="form-control" rows="5" id="body" name="description">{{ $product->description }}</textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div> 

        <div class=" form-group {{ $errors->has('size') ? 'has-error' : '' }}">
            <label for="size">Size:</label>
            <select id="size" class="form-control" name="size" required>
                <option value="{{$product->is_price()->size}}">{{$product->is_price()->size}}</option>
                <option value="Lớn">Lớn</option>
                <option value="Trung">Trung</option>
                <option value="Nhỏ">Nhỏ</option>
            </select>
            <span class="text-danger">{{ $errors->first('size') }}</span>
        </div>

        <div class=" form-group {{ $errors->has('quality') ? 'has-error' : '' }}">
            <label for="quality">Quality:</label>
            <input type="text" id="quality" name="quality" class="form-control" placeholder="" value="{{ $product->is_price()->quality }}">
            <span class="text-danger">{{ $errors->first('quality') }}</span>
        </div>

        <div class=" form-group {{ $errors->has('price') ? 'has-error' : '' }}">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" class="form-control" placeholder="" value="{{ $product->is_price()->price }}"/>
            <span class="text-danger">{{ $errors->first('price') }}</span>
        </div>

        <div class=" form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" class="form-control" placeholder="" value="{{ $product->is_price()->quantity }}">
            <span class="text-danger">{{ $errors->first('quantity') }}</span>
        </div>

        <div class="form-group">
            <input type="submit" id="submit" class="btn btn-success" value="Save" />
        </div>
    </form>
</div>



<div class="row">
    @include('includes.form_error')
</div>
@stop
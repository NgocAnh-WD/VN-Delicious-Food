@extends('layouts.admin')

@section('content')
    @include('includes.tinyeditor')

    <h1>Create Products</h1>

    <div class="container">
         
        <form action="{{ route('admin.products.store') }}" method="post" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter product name" value="{{ old('name') }}" required>
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
            
            
            <div class="  form-group {{ $errors->has('link_image') ? 'has-error' : '' }}">
                <label for="link_image">Thumbnail:</label>
                <input type="file" id="link_image" name="link_image" class="form-control" value="{{ old('link_image') }}">
                <span class="text-danger">{{ $errors->first('link_image') }}</span>
           </div> 
            <div class="  form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="image">Image:</label>
                <input type="file" id="link_image" name="image" class="form-control" value="{{ old('image') }}">
                <span class="text-danger">{{ $errors->first('image') }}</span>
           </div> 
            
           <div class=" form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="body">Descriptions:</label>
                     <textarea class="form-control" rows="5" id="body" name="description">{{ old('description') }}</textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
            </div> 
            
            <div class=" form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                    <label for="size">Size:</label>
                     <select id="size" class="form-control" name="size" required>
                                    <option value="Lớn">Lớn</option>
                                    <option value="Trung">Trung</option>
                                    <option value="Nhỏ">Nhỏ</option>
                     </select>
                    <span class="text-danger">{{ $errors->first('size') }}</span>
            </div> 
            
            <div class=" form-group {{ $errors->has('quality') ? 'has-error' : '' }}">
                    <label for="quality">Quality:</label>
                    <input type="text" id="title" name="quality" class="form-control" placeholder="" value="{{ old('quality') }}">
                    <span class="text-danger">{{ $errors->first('quality') }}</span>
            </div>  
            
            <div class=" form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="price">Price:</label>
                    <input type="number" id="title" name="price" class="form-control" placeholder="" value="{{ old('price') }}">
                    <span class="text-danger">{{ $errors->first('price') }}</span>
            </div>
            
             <div class=" form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="title" name="quantity" class="form-control" placeholder="" value="{{ old('quantity') }}">
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
            </div>
         
            
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Create Product" />
            </div>        
    </div>
    <div class="col-md-1"></div>

 </form>  

    <div class="row">
        @include('includes.form_error')
    </div>
@stop
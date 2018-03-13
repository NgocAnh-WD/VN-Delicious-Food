@extends('layouts.admin')






@section('content')
    @include('includes.tinyeditor')

    <h1>Create Products</h1>

    <div class="row">
         
        <form action="{{ route('admin.products.store') }}" method="post" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        

            <div class=" form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name:</label>
                    <input type="text" id="title" name="name" class="form-control" placeholder="Enter title" value="{{ old('name') }}">
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
            
            
            <div class="  form-group {{ $errors->has('link_image') ? 'has-error' : '' }}">
                <label for="link_image">Thumbnail:</label>
                <input type="file" id="link_image" name="link_image" class="form-control" value="{{ old('link_image') }}">
                <span class="text-danger">{{ $errors->first('link_image') }}</span>
           </div> 
            
            
           <div class=" form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="body">Descriptions:</label>
                     <textarea class="form-control" rows="5" id="body" name="description">{{ old('description') }}</textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
            </div> 
            
<!--            <div class=" form-group {{ $errors->has('is_delete') ? 'has-error' : '' }}">
                    <label for="is_delete">Is_delete:</label>
                    <input type="radio" class="form-control" rows="5" id="is_delete" name="is_delete" value="1"/>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
            </div>-->
            
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Create Product" />
            </div>
        </form>
        
      

    </div>


    <div class="row">


        @include('includes.form_error')



    </div>




@stop
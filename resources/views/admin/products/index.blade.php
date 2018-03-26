@extends('layouts.admin')
@section('content')


    <h1>Products</h1>


    <table class="table">
        
       <thead>
         <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Photo</th>
             <th>Category</th>
             <th>Description</th>
             <th>Size</th>
             <th>Quality</th>
             <th>Price</th>
             <th>Quantity</th>
             <th>Created at</th>
             <th>Updated at</th>
        </thead>
        
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><a href="{{ url('admin/products/'. $product->id.'/edit') }}">{{$product->name}}</a></td>        
                <td><img height="50" src="{{$product->photo()? asset( $product->photo()->link_image ): 'http://placehold.it/400x400'}}" alt=""></td>
                <td>{{$product->category ? $product->category->name : 'Uncategorized'}}</td>
                <td>{{str_limit($product->description)}}</td>
                <td>{{$product->size() ? $product->size() ->size :  'Unsized'}}</td>
                <td>{{$product->size() ? $product->size() ->quality :  'Unqualitied'}}</td>
                <td>{{$product->size() ? $product->size() ->price :  'Unpriced'}}</td>
                <td>{{$product->size() ? $product->size() ->quantity :  'Unquantity'}}</td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at}}</td>

            </tr>
            @endforeach
            
            
         
        </tbody>
     </table>


      <div class="row">
        <div class="col-lg-6 col-sm-offset-5">
            {{ $products->render() }}
        </div>
        
    </div>



@stop
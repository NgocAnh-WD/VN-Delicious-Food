@extends('layouts.admin')
@section('content')

<div class="container">
    <h1 style="color: #0099CC; text-align: center; margin:20px;">Products Management</h1>
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
            </tr>
        </thead>
        
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><a href="{{ url('admin/products/'. $product->id.'/edit') }}">{{$product->name}}</a></td>        
                <td><img height="50" src="{{$product->thumbnail()? asset( $product->thumbnail()->link_image ): 'http://placehold.it/400x400'}}" alt=""></td>
                <td>{{$product->category ? $product->category->name : 'Uncategorized'}}</td>
                <td>{{str_limit($product->description)}}</td>
                <td>{{$product->is_price() ? $product->is_price() ->size :  'Unsized'}}</td>
                <td>{{$product->is_price() ? $product->is_price() ->quality :  'Unqualitied'}}</td>
                <td>{{$product->is_price() ? $product->is_price() ->price :  'Unpriced'}}</td>
                <td>{{$product->is_price() ? $product->is_price() ->quantity :  'Unquantity'}}</td>
                <td>{{$product->created_at->diffForhumans()}}</td>
                <td>{{$product->updated_at->diffForhumans()}}</td>

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
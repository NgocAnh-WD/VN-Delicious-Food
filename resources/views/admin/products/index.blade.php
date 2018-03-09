@extends('layouts.admin')
@section('content')

<h1>Products</h1>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Product name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Is_delete</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $products)
        <tr>
            <td>{{$product->id}}</td>
            <td><img height="50" src="{{$product->image ? asset( $product->image->file ): 'http://placehold.it/400x400'}}" alt="" ></td>
            <td>{{$product->category_id}}</td>
            <td>{{$product->is_delete?'delete':'inactive'}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$prouct->updated_at}}</td>
        </tr>
        @endforeach  
    </tbody>
</table>


@stop
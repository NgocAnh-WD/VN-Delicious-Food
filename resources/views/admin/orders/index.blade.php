@extends('layouts.admin')
@section('content')
    <table class="table"> 
        <thead>
            <tr>
                <th>Id</th>
                <th>Order_id</th>
                <th>Customer</th>
                <th>Product_id</th>
                <th>Quantity_pro</th>
                <th>Size</th>
                <th>Discount</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->is_detail() ? $order->is_detail() ->order_id :  'Unsized'}}</td>
                <td>{{$order->customer ? $order->customer->full_name : 'Uncategorized'}}</td>
                <td>{{$order->product ? $order->product->id :  'Unsized'}}</td>
                <td>{{$order->is_detail() ? $order->is_detail() ->quantity_pro :  'Unsized'}}</td>
                <td>{{$order->is_detail() ? $order->is_detail() ->size :  'Unsized'}}</td>
                <td>{{$order->is_detail() ? $order->is_detail() ->discount :  'Unsized'}}</td>
                <td></td>
                <td></td>
                
                
            </tr>
            @endforeach



        </tbody>
    </table>


    <div class="row">
        <div class="col-lg-6 col-sm-offset-5">
            {{ $orders->render() }}
        </div>

    </div>



    @stop
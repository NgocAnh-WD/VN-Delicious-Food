@extends('layouts.admin')
@section('content')
    <table class="table"> 
        <thead>
            <tr>
                <th>Id</th>
                <th>Order_date</th>
                <th>Required_date</th>
                <th>Note</th>
                <th>Customer_id</th>
                <th>Shipped_date</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->order_date}}</td>
                <td>{{$order->required_date}}</td>
                <td>{{$order->note}}</td>
                <td><a href="{{url('admin/orders/'. $order->id.'/edit') }}">{{$order->customer ? $order->customer->full_name : 'Uncategorized'}}</a></td>
                <td>{{$order->shipped_date}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->created_at->diffForhumans()}}</td>
                <td>{{$order->updated_at->diffForhumans()}}</td>
                
                
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
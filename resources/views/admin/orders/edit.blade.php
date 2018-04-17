@extends('layouts.admin')
@section('content')
<h1 class="panel">Thông tin chi tiết hóa đơn</h1>


<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
        <div class="content_order">
            <h3 class="information_h3">Thông tin đơn hàng</h3>
            <div class="information_customer">
                <div>
                    <span class="list-customer-left">Tên khách hàng</span>
                    <span class="list-customer-middle">{{$order ->customer ->full_name}}</span>
                </div>
                <div>
                    <span class="list-customer-left">Email:</span>
                    <span class="list-customer-middle">{{$order ->customer ->email}}</span>
                </div>
                <div>
                    <span class="list-customer-left">Địa chỉ:</span>
                    <span class="list-customer-middle">{{$order ->customer ->address}}</span>
                </div>
                <div>
                    <span class="list-customer-left">Số điện thoại :</span>
                    <span class="list-customer-middle">{{$order ->customer ->phone}}</span>
                </div>
            </div>
            <div class="order_status">
                <form action="#" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">

                    <div class=" row col-md-7 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="id">Mã hóa đơn :</label>
                        <input type="text" id="id" name="id" class="form-control" value="{{$order ->id}}" disabled="">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div> 

                    <div class="row col-md-7 form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="order">Ngày đặt:</label>
                        <input type="datetime" id="date_order" name="date_order" class="form-control" value="{{$order ->order_date}}" disabled="">
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div>

                    <div class=" row col-md-7  form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="shipped">Ngày giao:</label>
                        <input type="date" id="shipped" name="shipped" class="form-control" value="{{$order ->required_date}}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>

                    <div class=" row  col-md-7 form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                        <label class="checkbox-inline"><input type="checkbox" value="0" @if($order ->status ==0) checked @endif>Đang chờ giao</label>
                        <label class="checkbox-inline"><input type="checkbox" @if($order ->status ==1) checked @endif>Đã giao</label>
                        <span class="text-danger">{{ $errors->first('is_active') }}</span>
                    </div> 

                    <div class="row col-md-7 form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="note">Tình trạng:</label>
                        <input id="note" type="text" class="form-control" name="note" value="{{$order->note}}">
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                    <div class="row  col-md-7 form-group">
                        <input type="submit" class="btn btn-success" value="Update Order" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
        <div class="content_product">
            <h3 class="information_h3">Thông tin sản phẩm</h3>
            <table class="table"> 
                <thead>
                    <tr>
                        <th>Mã SP</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Giảm giá</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($details as $detail)
                    <tr>
                        <td>{{$detail->product_id}}</td>
                        <td><img height="50" width="50" src="{{$detail->product->thumbnail()->link_image ? asset($detail->product->thumbnail()->link_image) : 'http://placehold.it/400x400' }}" alt="image"></td>
                        <td>{{$detail->product->name}}</td>
                        <td>{{$detail->product->is_price()->price}}</td>
                        <td>{{$detail->quantity_pro}}</td>
                        <td>{{$detail->discount}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="amount_order">
                @foreach($details as $detail)
                {{$detail->product->is_price()->price*$detail->quantity_pro}}
                @endforeach
            </div>
        </div>
    </div>
</div>


@stop

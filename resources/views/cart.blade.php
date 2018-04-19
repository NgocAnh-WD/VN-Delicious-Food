@extends('layouts.index')

@section('container')
<div class="checkout">	 
    <div class="container">	
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Cart</li>
        </ol>
        @if(Session::has('cart'))
        <h3>Your Shopping Cart in here (<span class="count_cart">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>)</h3>
        <div class="col-md-9 product-price1">
            <div class="check-out">			
                <div class=" cart-items">

                    <div>
                        <div class="row title_cart">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                <span>Ảnh</span>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 col-xs-2">
                                <span>Tên sản phẩm</span>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                <span>Giá</span>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 col-xs-3">
                                <span>Số lượng</span>
                            </div>  
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                <span>Tổng</span>
                            </div>
                        </div>
                        @if(Session::has('cart'))
                        <div class="result_delete">
                            @foreach($products as $product)
                            <ul class="cart-header" id="cart-header{{$product['id']}}">
                                <li class="ring-in"><a href="#" ><img src="{{ asset($product['image']) }}" class="img-responsive" style="height: 130px; width: 120px;" alt=""></a></li>
                                <li><span>{{$product['name']}}</span></li>
                                <li><span style="display: inline-block">{{ number_format($product['price_goc'], 3, ',', '.')}}VNĐ</span></li>
                                <li><div id="convert">
                                        <button class="subtract" id="button_{{$product['id']}}" value="{{$product['id']}}">-</button>
                                        <input type="hidden" id="price_goc{{$product['id']}}" value="{{$product['price_goc']}}">
                                        <div class="quantity" id="quantity{{$product['id']}}">
                                            {{$product['qty']}}
                                        </div>
                                        <input type="hidden" value="{{$product['totalquantity']}}" id="totalquantity{{$product['id']}}">
                                        <button class="plus" value="{{$product['id']}}">+</button>
                                        <div class="clearfix"></div>
                                    </div></li>
                                <li>
                                    <span class="price_update" id="price_update{{$product['id']}}" style="display: inline-block;font-weight: bold">{{ number_format($product['price'], 3, ',', '.')}}</span>VNĐ
                                    <button class="closecart" value="{{$product['id']}}"></button>
                                </li>
                                <div class="clearfix"> </div>
                            </ul>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>					  
            </div>
        </div>
        <div class="col-md-3 cart-total">
            <div class="box-style2">
                <div class="information_order">Thông tin đơn hàng</div>                
            </div>
            <div class="box-style">
                <span>Tạm tính (<span class="count_cart">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span> sản phẩm)</span>
                <strong class="total_strong"><span class="totalprice">{{ Session::has('cart') ? number_format(Session::get('cart')->totalPrice, 3, ',', '.') : '' }}</span> VNĐ</strong>
            </div>
            <div class="box-style3">
                <span>Vận chuyển:</span>
                <strong class="total_strong"><span>Miễn phí</span></strong>
            </div>
            <div class="box-style1">
                <div class="total2 clearfix">
                    <span class="text-label">Tổng cộng:</span>
                    <div class="amount1">
                        <p><strong class="total_strong2"><span class="totaltong">{{ Session::has('cart') ? number_format(Session::get('cart')->totaltong, 3, ',', '.') : '' }}</span> VNĐ</strong></p>
                        <p class="text-right1">
                            <small>(Đã bao gồm VAT)</small>
                        </p>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-large btn-block btn-danger btn-checkout payment_button">
                <a href="{{url('shipping')}}" class="payment_button_a">Tiến hành đặt hàng</a>
            </button>
            <button type="button" class="btn btn-large btn-block btn-yellow btn-checkout" id="btn-send-gift" >
                <a href="{{url('products')}}" class="continue_button_a">Tiếp tục mua hàng</a>
            </button>
            <div class="clearfix"></div>
        </div>
        @else
        <div class="cart-empty-text">Không có sản phẩm nào trong giỏ hàng</div>
        <div class="cart_empty_button"><button type="button" class="next-btn next-btn-secondary next-btn-large cart-empty-button"><a href="{{url('products')}}">TIẾP TỤC MUA SẮM</a></button></div>
        @endif
    </div>
</div>		
<div class="clearfix"></div>
@endsection


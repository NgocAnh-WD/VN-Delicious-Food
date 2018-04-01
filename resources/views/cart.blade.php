@extends('layouts.index')

@section('container')
<div class="checkout">	 
    <div class="container">	
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Cart</li>
        </ol>
        <h3>Your Shopping Cart in here ({{ Session::has('cart') ? Session::get('cart')->totalQty : '' }})</h3>
        <div class="col-md-9 product-price1">
            <div class="check-out">			
                <div class=" cart-items">

                    <div>
                        <div class="row title_cart">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-1">
                                <span>Ảnh</span>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 col-xs-4">
                                <span>Tên sản phẩm</span>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                <span>Giá</span>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 col-xs-3">
                                <span>Số lượng</span>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                <span>Xóa</span>
                            </div>
                        </div>
                        @if(Session::has('cart'))
                        @foreach($products as $product)
                        <ul class="cart-header">
                            <li class="ring-in"><a href="#" ><img src="{{ asset($product['image']) }}" class="img-responsive" alt=""></a></li>
                            <li><span>{{$product['name']}}</span></li>
                            <li><span class="price_product">{{ $product['price']}}.000VND</span></li>
                            <li><div id="convert">
                                    <div class="subtract" onclick="subtractcart({{$product['id']}},{{$product['qty']}})">
                                        -
                                    </div>
                                    <div class="quantity">
                                        {{$product['qty']}}
                                    </div>
                                    <div class="plus" onclick="pluscart({{$product['id']}},{{$product['qty']}})">
                                        +
                                    </div> 
                                    <div class="clearfix"></div>
                                </div></li>
                            <li><div class="closecart" onclick="close_cart({{$product['id']}})"></div></li>
                            <div class="clearfix"> </div>
                        </ul>
                        @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>					  
            </div>
        </div>
        <div class="col-md-3 cart-total">
            <div class="box-style2">
                <div class="information_order">Thông tin đơn hàng</div>                
            </div>
            <div class="box-style">
                <span>Tạm tính ({{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} sản phẩm)</span>
                <strong class="total_strong">{{ Session::has('cart') ? Session::get('cart')->totalPrice : '' }}.000</strong>
            </div>
            <div class="box-style3">
                <span>Vận chuyển:</span>
                <strong class="total_strong">{{ Session::has('cart') ? Session::get('cart')->shipping : '' }}.000</strong>
            </div>
            <div class="box-style1">
                <div class="total2 clearfix">
                    <span class="text-label">Tổng cộng:</span>
                    <div class="amount1">
                        <p><strong class="total_strong2">{{ Session::has('cart') ? Session::get('cart')->totaltong : '' }}.000 VNĐ</strong></p>
                        <p class="text-right1">
                            <small>(Đã bao gồm VAT)</small>
                        </p>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-large btn-block btn-danger btn-checkout payment_button">
                <a href="{{url('shipping')}}" class="payment_button_a">Tiến hành đặt hàng</a>
            </button>
            <button type="button" class="btn btn-large btn-block btn-yellow btn-checkout" id="btn-send-gift" >Quay về Home</button>
<!--            <div class="box-style1">
                <div class="review-wrap">
                    <p class="rating">
                        <span class="rating-content">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="star"></i>
                            <i class="star"></i>
                            <i class="star"></i>
                            <span style="width:83%">
                                <i class="star"></i>
                                <i class="star"></i>
                                <i class="star"></i>
                                <i class="star"></i>
                                <i class="star"></i>
                            </span>
                        </span>
                    </p>
                    <p class="review">(Đánh giá sp)</p>
                </div>
            </div>-->
            <div class="clearfix"></div>
        </div>
    </div>
</div>		

@endsection

<script type="text/javascript" src="{{asset('js/myscript.js')}}"></script>
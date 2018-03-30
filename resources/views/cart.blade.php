@extends('layouts.index')

@section('container')
<div class="checkout">	 
    <div class="container">	
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Cart</li>
        </ol>
        <div class="col-md-9 product-price1">
            <div class="check-out">			
                <div class=" cart-items">
                    <h3>Your Shopping Cart in here ({{ Session::has('cart') ? Session::get('cart')->totalQty : '' }})</h3>
                    <div>
                        <div class="row" style="font-family: 'Times New Roman'; background: #f4f4f4; font-size: 20px; text-align: right">
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
                            <li><span>{{ $product['price']}}</li>
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
                                </div></span></li>
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
            <a class="continue" href="#">Continue to basket</a>
            <div class="price-details">
                <h3>Price Details</h3>
                <span>Total</span>
                <span class="total">350.00</span>
                <span>Discount</span>
                <span class="total">---</span>
                <span>Delivery Charges</span>
                <span class="total">100.00</span>
                <div class="clearfix"></div>				 
            </div>	
            <h4 class="last-price">TOTAL</h4>
            <span class="total final">450.00</span>
            <div class="clearfix"></div>
            <a class="order" href="#">Place Order</a>
            <div class="total-item">
                <h3>OPTIONS</h3>
                <h4>COUPONS</h4>
                <a class="cpns" href="#">Apply Coupons</a>
                <p><a href="#">Log In</a> to use accounts - linked coupons</p>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" src="{{asset('js/myscript.js')}}"></script>
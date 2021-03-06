@extends('layouts.index')


@section('container')
<div class="checkout">	 
    <div class="container">	
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Cart</li>
        </ol>
        @if (Auth::guest())
        <form action="{{url('/admin/orders')}}" style="border: 1px solid #F4F4F4" method="post" id="checkout-form">
            <div class="col-md-9 product-price1">
                <div class="mod-guest-register-hd">
                    <div class="mod-guest-register-hd-right">
                        Phương thức thanh toán khi giao hàng
                    </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="mod-address-form mod-vn">
                    <div class="mod-address-form-bd">
                        <div class="title_address">NHẬP ĐỊA CHỈ NGƯỜI NHẬN</div>                            
                        <div class="mod-address-form-left">
                            <div class="mod-input mod-input-email">
                                <label>Địa chỉ email</label>
                                <input type="email" name="email" placeholder="Vui lòng nhập email của bạn" data-meta="Field" value="{{ old('email') }}">
                                <b></b><span></span>
                                <label style="color: #CA5952" >{{ $errors->has('email') ? 'Vui lòng nhập email người nhận.' : '' }} </label>
                            </div>
                            <div class="mod-input mod-input-taxId">
                                <label>Firstname</label>
                                <input type="text" name="firstname" placeholder="Họ" data-meta="Field" value="{{ old('firstname') }}">
                                <b></b><span></span>
                                <label style="color: #CA5952" >{{ $errors->has('firstname') ? 'Vui lòng nhập họ người nhận.' : '' }}</label>
                            </div> 
                            <div class="mod-input mod-input-name">
                                <label>Lastname</label>
                                <input type="text" name="lastname" placeholder="Tên" data-meta="Field" value="{{ old('lastname') }}">
                                <b></b><span></span>
                                <label style="color: #CA5952" >{{ $errors->has('lastname') ? 'Vui lòng nhập tên người nhận.' : '' }} </label>
                            </div>
                            <div class="mod-input floating error mod-input-phone">
                                <label>Số điện thoại</label>
                                <input type="number" name="phone" placeholder="Xin vui lòng điền số điện thoại của bạn" data-meta="Field" value="{{ old('phone') }}">
                                <div class="mod-input-close-icon"></div>
                                <b></b><span></span>
                                <label style="color: #CA5952" >{{ $errors->has('phone') ? 'Vui lòng kiểm tra số điện thoại người nhận.' : '' }} </label>
                            </div>
                        </div> 
                        <div class="mod-address-form-right">
                            <div class="mod-input mod-input-email">
                                <label>Nhập địa chỉ tỉnh thành phố</label>
                                <input type="text" name="city" placeholder="Vui lòng nhập địa chỉ của bạn" data-meta="Field" value="{{ old('city') }}">
                                <b></b><span></span>
                                <label style="color: #CA5952" >{{ $errors->has('city') ? 'Vui lòng nhập city người nhận.' : '' }} </label>
                            </div>
                            <div class="mod-input mod-input-email">
                                <label>Nhập địa chỉ quận huyện</label>
                                <input type="text" name="district" placeholder="Vui lòng nhập địa chỉ của bạn" data-meta="Field" value="{{ old('district') }}">
                                <b></b><span></span>
                                <label style="color: #CA5952" >{{ $errors->has('district') ? 'Vui lòng nhập district người nhận.' : '' }} </label>
                            </div>
                            <div class="mod-input mod-input-email">
                                <label>Nhập địa chỉ xã phường</label>
                                <input type="text" name="ward" placeholder="Vui lòng nhập địa chỉ của bạn" data-meta="Field" value="{{ old('ward') }}">
                                <b></b><span></span>
                                <label style="color: #CA5952" >{{ $errors->has('ward') ? 'Vui lòng nhập ward người nhận.' : '' }} </label>
                            </div>
                            <div class="mod-input mod-input-email">
                                <label>Nhập địa chỉ thôn xóm ấp</label>
                                <input type="text" name="hamlet" placeholder="Vui lòng nhập địa chỉ của bạn" data-meta="Field" value="{{ old('hamlet') }}">
                                <b></b><span></span>
                                <label style="color: #CA5952" >{{ $errors->has('hamlet') ? 'Vui lòng nhập hamlet người nhận.' : '' }} </label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

            </div>
            <div class="col-md-3 cart-total">
                <div class="to_pay_btn">
                    <button type="button" class="next-btn next-btn-primary next-btn-large checkout-order-total-button1" disabled="">THÔNG TIN THANH TOÁN</button>
                </div>
                <div class="section_heading">Thông tin đơn hàng</div>                
                <div class="box-style">
                    <span>Tạm tính ({{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} sản phẩm)</span>
                    <strong class="total_strong">{{ Session::has('cart') ? number_format(Session::get('cart')->totalPrice, 3, ',', '.') : '' }}VNĐ</strong>
                </div>
                <div class="box-style3">
                    <span>Vận chuyển:</span>
                    <strong class="total_strong">Miễn phí</strong>
                </div>
                <div class="box-style1">
                    <div class="total2 clearfix">
                        <span class="text-label">Tổng cộng:</span>
                        <div class="amount1">
                            <p><strong class="total_strong2">{{ Session::has('cart') ? number_format(Session::get('cart')->totaltong, 3, ',', '.') : '' }} VNĐ</strong></p>
                            <p class="text-right1">
                                <small>(Đã bao gồm VAT)</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="to_pay_btn1">
                    <input type="submit" class="next-btn next-btn-primary next-btn-large checkout-order-total-button" value="TIẾN HÀNH THANH TOÁN">
                </div>
                <div class="checkout-login-btn">
                    <button type="button" class="next-btn next-btn-secondary next-btn-large checkout-order-total-button">
                        <a href="{{ route('login') }}">ĐĂNG NHẬP ĐỂ THANH TOÁN</a>                    
                    </button></div>
                <div class="mod-address-form-action">
                    <div class="button_address_left" >
                        <button tabindex="8" type="text" class="next-btn next-btn-primary next-btn-large1 mod-address-form-btn1" style="background-color: #28ab51; margin-top: 10px"><a href="{{ url('products') }}" class="continue_a">TIẾP TỤC MUA HÀNG</a></button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
        <div class="clearfix"></div>
        @else
        <form action="{{url('/admin/orders')}}" style="border: 1px solid #F4F4F4" method="post" id="checkout-form">
            <div class="col-md-9 product-price1">
                <div class="mod-guest-register-hd">
                    <div class="mod-guest-register-hd-right">
                        Phương thức thanh toán khi giao hàng
                    </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="mod-address-form mod-vn">
                    <div class="mod-address-form-bd">
                        <div class="title_address">NHẬP ĐỊA CHỈ NGƯỜI NHẬN</div>
                        <div class="mod-address-form-left">                            
                            <div class="mod-input mod-input-email">
                                <label>Địa chỉ email</label>
                                <input type="text" placeholder="Vui lòng nhập email của bạn" data-meta="Field" value="{{ Auth::user()->email }}" disabled="">
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <b></b><span></span>
                            </div>
                            <div class="mod-input mod-input-taxId">
                                <label>Địa chỉ người nhận</label>
                                <input type="text" placeholder="Nhập địa chỉ người nhận của bạn" data-meta="Field" name="address" value="{{ Auth::user()->address }}">
                                <b></b><span></span>       
                                <label style="color: #CA5952" >{{ $errors->has('address') ? 'Vui lòng nhập địa chỉ người nhận.' : '' }} </label>
                            </div>   
                            <div>
                                <label style="color: #0000F0;display: inline-block" class="form-check-label" for="check_address">Bạn có thể thay đổi địa chỉ giao hàng</label>
                                <input type="checkbox" class="form-check-input myCheckbox" name="check_address" id="check_address" style="display: inline-block" value="1" @if ( old('check_address') == 1 ) checked   @endif >
                            </div>
                            <div id="show_new_address" style="display: none">
                                <div class="mod-input mod-input-email">
                                    <label>Nhập địa chỉ tỉnh thành phố</label>
                                    <input type="text" name="city" placeholder="Vui lòng nhập địa chỉ của bạn" data-meta="Field" value="{{ old('city') }}">
                                    <b></b><span></span>
                                    <label style="color: #CA5952" >{{ $errors->has('city') ? 'Vui lòng nhập city người nhận.' : '' }} </label>
                                </div>
                                <div class="mod-input mod-input-email">
                                    <label>Nhập địa chỉ quận huyện</label>
                                    <input type="text" name="district" placeholder="Vui lòng nhập địa chỉ của bạn" data-meta="Field" value="{{ old('district') }}">
                                    <b></b><span></span>
                                    <label style="color: #CA5952" >{{ $errors->has('district') ? 'Vui lòng nhập district người nhận.' : '' }} </label>
                                </div>
                                <div class="mod-input mod-input-email">
                                    <label>Nhập địa chỉ xã phường</label>
                                    <input type="text" name="ward" placeholder="Vui lòng nhập địa chỉ của bạn" data-meta="Field" value="{{ old('ward') }}">
                                    <b></b><span></span>
                                    <label style="color: #CA5952" >{{ $errors->has('ward') ? 'Vui lòng nhập ward người nhận.' : '' }} </label>
                                </div>
                                <div class="mod-input mod-input-email">
                                    <label>Nhập địa chỉ thôn xóm ấp</label>
                                    <input type="text" name="hamlet" placeholder="Vui lòng nhập địa chỉ của bạn" data-meta="Field" value="{{ old('hamlet') }}">
                                    <b></b><span></span>
                                    <label style="color: #CA5952" >{{ $errors->has('hamlet') ? 'Vui lòng nhập hamlet người nhận.' : '' }} </label>
                                </div>
                            </div>
                        </div> 
                        <div class="mod-address-form-right">
                            <div class="mod-input mod-input-name">
                                <label>Tên</label>
                                <input type="text" placeholder="Họ Tên" data-meta="Field" value="{{ Auth::user()->full_name }}"disabled="">
                                <input type="hidden" name="name" value="{{ Auth::user()->full_name }}">
                                <b></b><span></span>
                            </div>
                            <div class="mod-input floating error mod-input-phone">
                                <label>Số điện thoại</label>
                                <input type="number" placeholder="Xin vui lòng điền số điện thoại của bạn" data-meta="Field" name="phone" value="{{ Auth::user()->phone }}" disabled="">
                                <input type="hidden" name="phone" value="{{ Auth::user()->phone }}">
                                <div class="mod-input-close-icon"></div>
                                <b></b><span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 cart-total">
                <div class="to_pay_btn">
                    <button type="button" class="next-btn next-btn-primary next-btn-large checkout-order-total-button1" disabled="">THÔNG TIN THANH TOÁN</button>
                </div>
                <div class="section_heading">Thông tin đơn hàng</div>                
                <div class="box-style">
                    <span>Tạm tính ({{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} sản phẩm)</span>
                    <strong class="total_strong">{{ Session::has('cart') ? number_format(Session::get('cart')->totalPrice, 3, ',', '.') : '' }}VNĐ</strong>
                </div>
                <div class="box-style3">
                    <span>Vận chuyển:</span>
                    <strong class="total_strong">Miễn phí</strong>
                </div>
                <div class="box-style1">
                    <div class="total2 clearfix">
                        <span class="text-label">Tổng cộng:</span>
                        <div class="amount1">
                            <p><strong class="total_strong2">{{ Session::has('cart') ? number_format(Session::get('cart')->totaltong, 3, ',', '.') : '' }} VNĐ</strong></p>
                            <p class="text-right1">
                                <small>(Đã bao gồm VAT)</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="to_pay_btn1">
                    <input type="submit" class="next-btn next-btn-primary next-btn-large checkout-order-total-button" value="TIẾN HÀNH THANH TOÁN">
                </div>
             <div class="mod-address-form-action">
                    <div class="button_address_left" >
                        <button tabindex="8" type="button" class="next-btn next-btn-primary next-btn-large1 mod-address-form-btn1" style="background-color: #28ab51; margin-top: 10px"><a href="{{ url('products') }}" class="continue_a">TIẾP TỤC MUA HÀNG</a></button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
        @endif
        <div style="width: 66.67%;padding-left: 38px;">
            <div>
                <span class="list-header-left">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} sản phẩm</span>
                <span class="list-header-middle">GIÁ</span>
                <span class="list-header-right">SỐ LƯỢNG</span>
            </div>
            <div>
                @if(Session::has('cart'))
                @foreach($products as $product)
                <div id="item_3bd7f2b8851ed987ff8905e11de1ba99" class="cart-item">
                    <div class="cart-item-inner">
                        <div class="cart-item-left">
                            <div class="img-wrap">
                                <a href="#" class="automation-link-from-image-to-prod">
                                    <img class="img" src="{{ asset($product['image']) }}" alt="item">
                                </a>
                            </div>
                            <div class="content">
                                <a id="automation-link-from-title-to-prod-item_3bd7f2b8851ed987ff8905e11de1ba99" href="#" class="automation-link-from-title-to-prod title">
                                    {{$product['name']}}</a>
                                <div class="operations">
                                    <span class="automation-btn-delete">
                                        <span class="lazada lazada-ic-Delete lazada-icon icon delete">

                                        </span>

                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-item-middle">
                            <p class="current-price">{{ number_format($product['price'], 3, ',', '.')}} VNĐ</p>
                        </div>
                        <div class="cart-item-right">
                            <div class="quantity1 automation-item-quantity">
                                <span class="item-quantity-value">{{$product['qty']}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>

</div>	
<div style="height: 30px"></div>
<script type="text/javascript">
    $(document).ready(function () {
        if ($('.myCheckbox').is(':checked')) {
            var mydiv = document.getElementById("show_new_address");
            mydiv.style.display = "block";

        }
        $("#check_address").change(function () {
            $("#show_new_address").slideToggle("slow");
        });
    });
</script>
@endsection
<script type="text/javascript" src="{{asset('js/myscript.js')}}"></script>
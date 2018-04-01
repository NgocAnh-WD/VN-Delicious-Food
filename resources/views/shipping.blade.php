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
            <div class="mod-guest-register-hd">Thông tin giao hàng</div>
            <form style="border: 1px solid #F4F4F4">
                <div class="mod-address-form mod-vn">
                    <div class="mod-address-form-bd">
                        <div class="mod-address-form-left">
                            <div class="mod-input mod-input-email">
                                <label>Địa chỉ email</label>
                                <input type="text" placeholder="Vui lòng nhập email của bạn" data-meta="Field" value="">
                                <b></b><span></span>
                            </div>
                            <div class="mod-input mod-input-name">
                                <label>Tên</label>
                                <input type="text" placeholder="Họ Tên" data-meta="Field" value="">
                                <b></b><span></span>
                            </div>
                            <div class="mod-input floating error mod-input-phone">
                                <label>Số điện thoại</label>
                                <input type="number" placeholder="Xin vui lòng điền số điện thoại của bạn" data-meta="Field">
                                <div class="mod-input-close-icon"></div>
                                <b></b><span></span>
                            </div>
                            <div class="mod-input mod-input-taxId">
                                <label>Mã số thuế</label>
                                <input type="text" placeholder="Nhập mã số thuế của bạn" data-meta="Field" value="">
                                <b></b><span></span>
                            </div>
                            <div class="mod-address-form-action">
                                <button tabindex="8" type="submit" class="next-btn next-btn-primary next-btn-large mod-address-form-btn">LƯU DỮ LIỆU</button>
                            </div>
                        </div> 
                        <div class="mod-address-form-left">
                            <div class="mod-input mod-input-email">
                                <label>Địa chỉ email</label>
                                <input type="text" placeholder="Vui lòng nhập email của bạn" data-meta="Field" value="">
                                <b></b><span></span>
                            </div>
                            <div class="mod-input mod-input-name">
                                <label>Tên</label>
                                <input type="text" placeholder="Họ Tên" data-meta="Field" value="">
                                <b></b><span></span>
                            </div>
                            <div class="mod-input floating error mod-input-phone">
                                <label>Số điện thoại</label>
                                <input type="number" placeholder="Xin vui lòng điền số điện thoại của bạn" data-meta="Field">
                                <div class="mod-input-close-icon"></div>
                                <b></b><span></span>
                            </div>
                            <div class="mod-input mod-input-taxId">
                                <label>Mã số thuế</label>
                                <input type="text" placeholder="Nhập mã số thuế của bạn" data-meta="Field" value="">
                                <b></b><span></span>
                            </div>
                            <div class="mod-address-form-action">
                                <button tabindex="8" type="submit" class="next-btn next-btn-primary next-btn-large1 mod-address-form-btn1">TIẾP TỤC MUA HÀNG</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
            <div id="listHeader_1" class="list-header">
                <div>
                    <span class="list-header-left">1 sản phẩm</span>
                    <span class="list-header-middle">GIÁ</span>
                    <span class="list-header-right">SỐ LƯỢNG</span>
                </div>
                <div>
                    <div id="item_3bd7f2b8851ed987ff8905e11de1ba99" class="cart-item">
                        <div class="cart-item-inner">
                            <div class="cart-item-left">
                                <div class="img-wrap">
                                    <a href="#" class="automation-link-from-image-to-prod">
                                        <img class="img" src="http://vn-live-02.slatic.net/p/3/bo-ban-lam-viec-rec-u-trang-va-ghe-eames-trang-ibie-8224-7768094-e3a30b91e016fc230c2642d40c545523-catalog.jpg" alt="item">
                                    </a>
                                </div>
                                <div class="content">
                                    <a id="automation-link-from-title-to-prod-item_3bd7f2b8851ed987ff8905e11de1ba99" href="https://www.lazada.vn/-i101173872-s101360704.html?urlFlag=true&amp;mp=1" class="automation-link-from-title-to-prod title">
                                        dfmsklfl dnfls</a>
                                    <div class="operations">
                                        <span class="automation-btn-delete">
                                            <span class="lazada lazada-ic-Delete lazada-icon icon delete">

                                            </span>

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-item-middle">
                                <p class="current-price">1.575.000 VND</p>
                            </div>
                            <div class="cart-item-right">
                                <div class="quantity1 automation-item-quantity">
                                    <span class="item-quantity-value">1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3 cart-total">
            <div class="to_pay_btn">
                <button type="button" class="next-btn next-btn-primary next-btn-large checkout-order-total-button" disabled="">TIẾN HÀNH THANH TOÁN</button>
            </div>
            <div class="section_heading">Thông tin đơn hàng</div>                
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
            <div class="to_pay_btn1">
                <button type="button" class="next-btn next-btn-primary next-btn-large checkout-order-total-button" disabled="">TIẾN HÀNH THANH TOÁN</button>
            </div>
            <div class="checkout-login-btn"><button type="button" class="next-btn next-btn-secondary next-btn-large checkout-order-total-button">ĐĂNG NHẬP ĐỂ THANH TOÁN</button></div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>		

@endsection

<script type="text/javascript" src="{{asset('js/myscript.js')}}"></script>
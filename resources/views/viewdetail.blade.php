<head>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />
</head>
<body style="background: white">
    <h1 style="text-align: center; background: #EEEEEE" class="panel">-- Thông tin chi tiết hóa đơn --</h1>

    <div class="common" style="height: 700px; width: 1400px; background: #ADD8E6; margin-left: 70px">
        <div class="foot-lnk">
            <a class="btn btn-link" href="{{ url('/home') }}" style="font-size: 15px"> Home</a>

            <a class="btn btn-link" href="{{ url('/vieworders') }}" style="font-size: 15px">Back Orders</a>
        </div>
        
        <div class="row">
            <div class="col-md-1 col-lg-1 col-sm-1 col-xs-12"></div>

            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                <div  style="margin-left: 20px" class="content_order">
                    <div class="space-12"></div>
                    <h3 class="information_h3" style="text-align: center">THÔNG TIN ĐƠN HÀNG</h3>
                    <div class="information_customer"  style="font-size: 15px">
                        <div>
                            <span class="list-customer-left">Tên khách hàng:</span>
                            <span class="list-customer-middle" style="margin-left: 10px">{{$order ->customer ->full_name}}</span>
                        </div>

                        <div>
                            <span class="list-customer-left">Email:</span>
                            <span class="list-customer-middle" style="margin-left: 69px">{{$order ->customer ->email}}</span>
                        </div>

                        <div>
                            <span class="list-customer-left">Địa chỉ:</span>
                            <span class="list-customer-middle" style="margin-left:60px">{{$order ->customer ->address}}</span>
                        </div>

                        <div>
                            <span class="list-customer-left">Số điện thoại:</span>
                            <span class="list-customer-middle" style="margin-left: 25px">{{$order ->customer ->phone}}</span>
                        </div>
                    </div>

                    <div class="order_status">
                        <div class="space-6"></div>
                        <div class=" row col-md-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="id">Mã hóa đơn :</label>
                            <input type="text" id="id" name="id" class="form-control" value="{{$order ->id}}" disabled="">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div> 

                        <div class="row col-md-12 form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="order">Ngày đặt:</label>
                            <input type="datetime" id="date_order" name="date_order" class="form-control" value="{{$order ->order_date}}" disabled="">
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>

                        <div class="row col-md-12 form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="note">Tình trạng:</label>
                            <input id="note" type="text" class="form-control" name="note" value="{{$order->note}}" disabled="">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>

                        
                    </div>
                </div>
            </div>

            <div class="col-md-1 col-lg-1 col-sm-1 col-xs-12"></div>

            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                <div class="space-12"></div>
                <div class="content_product">
                    <h3 class="information_h3" style="text-align: center">THÔNG TIN SẢN PHẨM</h3>
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
                                <td>{{$detail->product->is_price()->price}} VND</td>
                                <td>{{$detail->quantity_pro}}</td>
                                <td>{{$detail->discount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="amount_order" style="font-size: 18px">
                        <?php $i = 0 ?>
                        @foreach($details as $detail)                
                        <?php $i += $detail->product->is_price()->price * $detail->quantity_pro ?>          
                        @endforeach
                        <span>Tổng cộng: </span>{!! number_format($i, 3, ',', '.') !!} VND
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>




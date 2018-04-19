<!DOCTYPE html>
<html>
    <head> 
        <title>Food Store</title>
        <link rel="shortcut icon" href="images/panda.png.">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--        <script src="{{asset('js/jquery.min.js')}}"></script>-->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">	
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{asset('js/simpleCart.min.js')}}"></script>
        <link href="{{asset('css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/style1.css')}}" rel="stylesheet">        
        <link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/search_name_product.css')}}" rel="stylesheet">
        <link href="{{asset('css/contact.css')}}" rel="stylesheet" /> 
        <link href="//fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet">
        <script type="text/javascript" src="{{asset('js/memenu.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/myscript.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/searchPrice.js')}}"></script>
        <script>

var GlobleVariable = [];
GlobleVariable.app_url = "<?php echo env('APP_URL'); ?>";
        </script>	
    </head>
    <body> 
        <div class="banner inner-bg-w3" id="home">
            <div class="banner-top">
                <div class="social-bnr-agileits">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>					
                    </ul>
                </div>
                <div class="contact-bnr-w3-agile">
                    <ul>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="5Pandas@passerellesnumeriques.org">5Pandas@passerellesnumeriques.org</a></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>02357478528</li>	
                        <li>
                            <div class="search">
                                <input class="search_box" type="checkbox" id="search_box">
                                <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                                <div class="search_form">
                                    <form action="{{url('/search')}}" method="GET" role="search">
                                        <input type="text" name="key_search" id="key_search_button" placeholder="Search..">
                                        <input type="submit" value="Search" />
                                    </form>
                                </div>
                            </div> 
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>            
            <header>
                <div class="container">
                    <div class="w3_navigation">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header navbar-left">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="w3_navigation_pos">
                                    <h1><a href="{{asset('/home')}}"><span>5Pandas</span></a></h1>
                                </div>
                            </div>
                            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                                <nav class="menu menu--miranda">
                                    <ul class="nav navbar-nav menu__list">
                                        <li class="menu__item"><a href="{{asset('/home')}}" class="menu__link">Trang chủ</a></li>
                                        <li class="menu__item"><a href="{{asset('/about')}}" class=" menu__link">Giới thiệu</a></li>
                                        <li class="menu__item"><a href="{{asset('/products')}}" class=" menu__link">Sản phẩm</a></li>
                                        <li class="menu__item"><a href="{{asset('/contact')}}" class=" menu__link">Liên hệ</a></li>

                                        @guest
                                        <li class="dropdown menu__item"><a href="{{ route('login') }}"><b>Đăng nhập/Đăng kí</b></a></li>
                                        @else
                                        <li class="dropdown" style="float: right; margin-top: 30px; padding-right: px">
                                            <button class="dropbtn">{{ Auth::user()->username }}<span class="caret"></span></button>
                                            <div class="dropdown-content">
                                                <a href="{{ route('logout')}}"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                                    Đăng xuất                                      
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                                <a href="{{asset('/profile')}}">Trang cá nhân</a>
                                                <a href="{{asset('/vieworders')}}">Xem đơn hàng</a>
                                            </div>
                                        </li>
                                        @endguest  

                                    </ul>
                                </nav>
                            </div>
                        </nav>	
                    </div>
                    <div class="clearfix"></div>
                </div>
            </header>
        </div>

        <div class="cart box_1 test">

            <a href="{{ url('shoppingcart') }}">
                <h3> <div class="total">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"><span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></span>
                        <div class="clearfix"></div>
                    </div>
                </h3>
            </a>
        </div>
        <div class="clearfix"> </div>
        @yield('welcome')
        <!---->
        @yield('ads')
        <!---->
        <div class="featured">
            @yield('container')
        </div>
    @yield('slide1')
<div class="clearfix"></div>
<div class="shoping">
    <div class="container">
        <div class="shpng-grids">
            <div class="col-md-4 shpng-grid">
                <h3>Miễn phí ship</h3>
                <p>với hóa đơn trên 200k</p>
            </div>
            <div class="col-md-4 shpng-grid">
                <h3>Hủy hóa đơn</h3>
                <p>Trước 1 ngày</p>
            </div>
            <div class="col-md-4 shpng-grid">
                <h3>Thanh toán</h3>
                <p>ngay khi nhận thức ăn</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <!---->
        <div class="footer">
            <div class="ftr-grids">
                <div class="col-md-3 ftr-grid">
                    <h4 style="color: white;">Địa chỉ</h4>
                    <div class="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.1103360974585!2d108.24146331471736!3d16.05976319395768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142177f2ced6d8b%3A0xeac35f2960ca74a4!2zOTkgVMO0IEhp4bq_biBUaMOgbmgsIFBoxrDhu5tjIE3hu7ksIFPGoW4gVHLDoCwgxJDDoCBO4bq1bmcsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1523962542866" width="360" height="200" frameborder="0" style="border:1px; margin-top: 5px;" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 ftr-grid">
                    <h4 style="color: white;">Giới thiệu</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('images/cooker.jpg')}}" alt="Image" style="height: 120px; width: 190px; margin-left: 15px;"/>
                        </div>
                        <div class="col-md-4">
                            <img src="{{asset('images/rau.gif')}}" alt="Image" style="height: 120px; width: 190px; margin-left: 20px;"/>
                        </div>
                        <div class="col-md-4">
                            <img src="{{asset('images/food.jpg')}}" alt="Image" style="height: 120px; width: 190px; margin-left: 20px;"/>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <p style="text-align: center; margin-top: 5px; color: white;">5 Pandas là website chính thức của chuỗi cửa hàng thức ăn 4PANDAS nổi tiếng. Ngoài việc cung 
                                cấp các món ăn ngon của cửa hàng đến thực khách. Chúng tôi còn liên kết với các chuỗi nhà hàng nổi
                                tiếng khác để đem đến cho các bạn thật nhiều món ăn ngon miệng. Chất lượng hàng đầu, giá thành hợp lý.
                            </p>

                        </li>				 
                    </ul>
                </div>
                <div class="col-md-3 ftr-grid">
                    <h4 style="color: white;">Thông tin hỗ trợ</h4>
                    <ul>                                   
                        <li><img src="{{asset('images/panda-icon.png')}}" alt="Image" style="height: 50px; width: 50px;"/></li>
                        <li><p style="font-weight: bold; color: white;">Mentor: Mr.Ngo Ho (SEA DEV Company)</p></li>
                        <li><p style="color: white;">Phone: 0236 3888 503</p></li>
                        <li><p style="color: white;">Address: 99 Tô Hiến Thành, Phước Mỹ, Sơn Trà, Đà Nẵng</p></li>
                        <li><p style="color: white;">Email: dant4pandas@gmail.com</p></li>
                        <li><p style="color: white;">Hour: Opend 7:30 AM - 10:00 PM</p></li>					 
                    </ul>
    </div>
</div>
            <div class="copywrite">
                <div class="container">
                    <p style="text-align: center; margin-top: 35px; color: white;">Copyright Â© 2018 5 Pandas Store. All Rights Reserved | Design by <a href="#">5 PANDAS</a></p>
                </div>
            </div>
        </div>
</body>
</html>

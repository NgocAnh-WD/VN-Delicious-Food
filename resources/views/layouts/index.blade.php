<!DOCTYPE html>
<html>
    <head> 
        <title>Food Store</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--        <script src="{{asset('js/jquery.min.js')}}"></script>-->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">	
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->

        <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{asset('js/simpleCart.min.js')}}"></script>
        <link href="{{asset('css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/style1.css')}}" rel="stylesheet">        
        <link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/search_name_product.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{asset('js/memenu.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/myscript.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/searchPrice.js')}}"></script>
        <script>

            var GlobleVariable = [];
            GlobleVariable.app_url = "<?php echo env('APP_URL'); ?>";
        </script>	
        <!-- /start menu -->      
    </head>
    <body> 
        <!--header-->	
        <div class="header-top">
            <div class="header-bottom">
                <div class="container">			
                    <div class="top-nav" style="width: 100% !important">
                        <div class="logo" style="display: inline-block">
                            <a href="{{asset('/products')}}"><h1>Food Store</h1></a>
                        </div>
                        <ul class="memenu skyblue" style="display: inline-block"><li class="active"><a href="{{asset('/home')}}">Home</a></li>
                            <li class="grid"><a href="{{asset('/products')}}">Our Foods</a>

                            </li>
                            @guest
                            <li class="grid"><a href="{{ route('login') }}"><b>Login/Register</b></a></li>
                            @else
                            <li class="dropdown">
                                <button class="dropbtn">{{ Auth::user()->username }}<span class="caret"></span></button>
                                <div class="dropdown-content">
                                    <a href="{{ route('logout')}}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        Logout                                       
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    <a href="{{asset('/profile')}}">View profile</a>
                                </div>
                            </li>
                            @endguest
                            <li>
                                <div class="search">
                                    <input class="search_box" type="checkbox" id="search_box">
                                    <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                                    <div class="search_form">
                                        <form action="{{url('/search')}}" method="GET" role="search">
                                            <input type="text" name="key_search" id="key_search_button" placeholder="Search..."">
                                            <input type="submit" value="Search">
                                        </form>
                                    </div>
                                </div>
                            </li>                            
                            <!-- Authentication Links -->                           
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <!---->
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
                    <!---->			 
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!---->

        <!---->
        @yield('welcome')
        <!---->
        @yield('ads')
        <!---->
        <div class="featured">
            @yield('container')
        </div>
        <!---->
        <div class="arrivals">
            @yield('slide1')
        </div>
        <!---->
        <div class="clearfix"></div>
        <div class="shoping">
            <div class="container">
                <div class="shpng-grids">
                    <div class="col-md-4 shpng-grid">
                        <h3>Free Shipping</h3>
                        <p>On Order Over Rs999</p>
                    </div>
                    <div class="col-md-4 shpng-grid">
                        <h3>Order Return</h3>
                        <p>Return Within 14days</p>
                    </div>
                    <div class="col-md-4 shpng-grid">
                        <h3>COD</h3>
                        <p>Cash On Delivery</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!---->
        <div class="footer">
            <div class="container">
                <div class="ftr-grids">
                    <div class="col-md-3 ftr-grid">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Our Sites</a></li>
                            <li><a href="#">In The News</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>					 
                        </ul>
                    </div>
                    <div class="col-md-3 ftr-grid">
                        <h4>Customer service</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Cancellation</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Bulk Orders</a></li>
                            <li><a href="#">Buying Guides</a></li>					 
                        </ul>
                    </div>
                    <div class="col-md-3 ftr-grid">
                        <h4>Your account</h4>
                        <ul>
                            <li><a href="#">Your Account</a></li>
                            <li><a href="#">Personal Information</a></li>
                            <li><a href="#">Addresses</a></li>
                            <li><a href="#">Discount</a></li>
                            <li><a href="#">Track your order</a></li>					 					 
                        </ul>
                    </div>
                    <div class="col-md-3 ftr-grid">
                        <h4>Categories</h4>
                        <ul>
                            <li><a href="#">> Wedding</a></li>
                            <li><a href="#">> Jewellerys</a></li>
                            <li><a href="#">> Shoes</a></li>
                            <li><a href="#">> Flowers</a></li>
                            <li><a href="#">> Cakes</a></li>
                            <li><a href="#">...More</a></li>					 
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>		
            </div>
        </div>
        <!---->
        <div class="copywrite">
            <div class="container">
                <p>Copyright Â© 2015 Wedding Store. All Rights Reserved | Design by <a href="#">4 DOGS</a></p>
            </div>
        </div>		 
    </body>

</html>

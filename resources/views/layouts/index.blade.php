<!DOCTYPE html>
<html>
    <head>
        <title>Food Store</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <!-- Custom Theme files -->
        <!--theme-style-->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">	
        <!--//theme-style-->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
       
<!--        <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"></script>-->
        <!-- start menu -->
        <script src="{{asset('js/simpleCart.min.js')}}"></script>
        <!-- start menu -->
        <link href="{{asset('css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
        
        <link href="{{asset('css/style1.css')}}" rel="stylesheet">
         
         <script type="text/javascript" src="{{asset('js/memenu.js')}}"></script>
        
        <script>$(document).ready(function () {
   // $(".memenu").memenu();
});</script>	
        <!-- /start menu -->
        <link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body> 
        <!--header-->	
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            <ul class="nav navbar-nav">
                                &nbsp;
                            </ul>

                            <ul nav navbar-nav>
                                <form action="{{url('/search')}}" method="get" role="search">
                                    <div class="col-md-5 input-group" style="margin-top: 8px; ">
                                        <input type="text" class="form-control" name="key_search" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </ul>
                            <!-- Right Side Of Navbar -->
                         <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                        </div>
                    </div>
<!--                    <div class="navbar-header">

                    </div>-->
                </div>
            </nav>
        </div>

        <!-- Scripts -->
<!--        <script src="{{ asset('js/app.js') }}"></script>-->
        <div class="header-top">
            <div class="header-bottom">
                <div class="container">			
                    <div class="logo">
                        <a href="{{asset('/products')}}"><h1>Food Store</h1></a>
                    </div>
                    <!---->

                    <div class="top-nav">
                        <ul class="memenu skyblue"><li class="active"><a href="{{asset('/home')}}">Home</a></li>
                            <li class="grid"><a href="{{asset('/products')}}">Products</a>
                                <div class="mepanel">
                                    <div class="row">
                                        <div class="col1 me-one">
                                            <h4>Products</h4>
                                            <ul>
                                                <li><a href="{{asset('/products')}}">Trà sữa</a></li>
                                                <li><a href="{{asset('/products')}}">Sinh tố</a></li>
                                                <li><a href="{{asset('/products')}}">Chè</a></li>
                                                <li><a href="{{asset('/products')}}">Gà rán</a></li>
                                                <li><a href="{{asset('/products')}}">Lẩu hải sản</a></li>
                                                <li><a href="{{asset('/products')}}">Mỳ cay</a></li>
                                                <li><a href="{{asset('/products')}}">Bánh tráng trộn</a></li>
                                                <li><a href="{{asset('/products')}}">Nem rán</a></li>
                                            </ul>
                                        </div>
                                        <div class="col1 me-one">
                                            <h4>Price - Size</h4>
                                            <ul>
                                                <li><a href="{{asset('/products')}}">Men</a></li>
                                                <li><a href="{{asset('/products')}}">Women</a></li>
                                                <li><a href="{{asset('/products')}}">Brands</a></li>
                                                <li><a href="{{asset('/products')}}">Kids</a></li>
                                                <li><a href="{{asset('/products')}}">Accessories</a></li>
                                                <li><a href="{{asset('/products')}}">Style Videos</a></li>
                                            </ul>	
                                        </div>
                                        <div class="col1 me-one">
                                            <h4>Popular Brands</h4>
                                            <ul>
                                                <li><a href="product.html">Levis</a></li>
                                                <li><a href="product.html">Persol</a></li>
                                                <li><a href="product.html">Nike</a></li>
                                                <li><a href="product.html">Edwin</a></li>
                                                <li><a href="product.html">New Balance</a></li>
                                                <li><a href="product.html">Jack & Jones</a></li>
                                                <li><a href="product.html">Paul Smith</a></li>
                                                <li><a href="product.html">Ray-Ban</a></li>
                                                <li><a href="product.html">Wood Wood</a></li>
                                            </ul>	
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="grid"><a href="#">News</a>
                                <div class="mepanel">
                                    <div class="row">
                                        <div class="col1 me-one">
                                            <h4>Shop</h4>
                                            <ul>
                                                <li><a href="{{asset('/products')}}">New Product</a></li>
                                                <li><a href="#">Discount</a></li>
                                                <li><a href="#">New </a></li>
                                                <li><a href="#">Accessories</a></li>
                                                <li><a href="#">Kids</a></li>                                           
                                            </ul>
                                        </div>
                                        <div class="col1 me-one">
                                            <h4>Style Zone</h4>
                                            <ul>
                                                <li><a href="#">Men</a></li>
                                                <li><a href="#">Women</a></li>
                                                <li><a href="#">Brands</a></li>
                                                <li><a href="#">Kids</a></li>
                                                <li><a href="#">Accessories</a></li>
                                                <li><a href="#">Style Videos</a></li>
                                            </ul>	
                                        </div>
                                        <div class="col1 me-one">
                                            <h4>Popular Brands</h4>
                                            <ul>
                                                <li><a href="#">Levis</a></li>
                                                <li><a href="#">Persol</a></li>
                                                <li><a href="#">Nike</a></li>
                                                <li><a href="#">Edwin</a></li>
                                                <li><a href="#">New Balance</a></li>
                                                <li><a href="#">Jack & Jones</a></li>
                                                <li><a href="#">Paul Smith</a></li>
                                                <li><a href="#">Ray-Ban</a></li>
                                                <li><a href="#">Wood Wood</a></li>
                                            </ul>	
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="grid"><a href="#">Typo</a></li>
                            <li class="grid"><a href="#">Contact</a></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <!---->
                    <div class="cart box_1">

                        <a href="{{ url('shoppingcart') }}">
                            <h3> <div class="total">
                                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Shopping Cart
                                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                </div>
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                        <div class="clearfix"> </div>
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
                            <li><a href="contact.html">Contact Us</a></li>
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
                            <li><a href="account.html">Your Account</a></li>
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
                <p>Copyright © 2015 Wedding Store. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
        </div>		 
    </body>
<<<<<<< Updated upstream
=======
   
>>>>>>> Stashed changes
    <script type="text/javascript" src="{{asset('js/jqzoom.js')}}"></script>
    <script type="text/javascript">
                                                   $("#bzoom").zoom({
                                                       zoom_area_width: 300,
                                                       autoplay_interval: 3000,
                                                       small_thumbs: 4,
                                                       autoplay: false
                                                   });
    </script>
   
</html>

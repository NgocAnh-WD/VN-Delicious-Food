<!DOCTYPE html>
<html>
    <head>
        <title>Food Store</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="{{asset('css/style.css')}}" rel="stylesheet">	
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script src="{{asset('js/simpleCart.min.js')}}"></script>
        <link href="{{asset('css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/style1.css')}}" rel="stylesheet">        
        <link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css" media="all" />

        <script type="text/javascript" src="{{asset('js/memenu.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/myscript.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/searchPrice.js')}}"></script>
        <script>

var GlobleVariable = [];
GlobleVariable.app_url = "<?php echo env('APP_URL'); ?>";
        </script>	    
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
                                        <input type="text" class="form-control" name="key_search" id="key_search_button" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit" onclick="click_search()">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </ul>

                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="header-top">
            <div class="header-bottom">
                <div class="container">			
                    <div class="logo">
                        <a href="{{asset('/products')}}"><h1>Food Store</h1></a>
                    </div>
                    <div class="top-nav" style="width: 100% !important">
                        <ul class="memenu skyblue"><li class="active"><a href="{{asset('/home')}}">Home</a></li>
                            <li class="grid"><a href="{{asset('/products')}}">Products</a>
                                <div class="mepanel">
                                    <div class="row">
                                        <div class="col1 me-one">
                                            <h4>Products</h4>
                                            <ul>
                                                <li><a href="{{asset('/products')}}">TrÃ  sá»¯a</a></li>
                                                <li><a href="{{asset('/products')}}">Sinh tá»‘</a></li>
                                                <li><a href="{{asset('/products')}}">ChÃ¨</a></li>
                                                <li><a href="{{asset('/products')}}">GÃ  rÃ¡n</a></li>
                                                <li><a href="{{asset('/products')}}">Láº©u háº£i sáº£n</a></li>
                                                <li><a href="{{asset('/products')}}">Má»³ cay</a></li>
                                                <li><a href="{{asset('/products')}}">BÃ¡nh trÃ¡ng trá»™n</a></li>
                                                <li><a href="{{asset('/products')}}">Nem rÃ¡n</a></li>
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
                            <li class="grid"><a href="#">Contact</a></li>                                               
                            <div class="dropdown">
                                <button class="dropbtn">{{ Auth::user()->username }}<span class="caret"></span></button>
                                <div class="dropdown-content">
                                    <a href="{{ route('logout')}}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        Logout                                       
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">                      
                                </div>
                            </div>
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

        @yield('container')

        <div class="arrivals">
            <div class="container">	
                <h3>New Products</h3>
                <div class="arrival-grids">			 
                    <ul id="flexiselDemo1">
                        @if($products_new)
                        @foreach($products_new as $key => $product_new)
                        <li>
                            <a href="{{ url('/products') }}"><img src="{{asset($product_new->thumbnail()->link_image)}}" style="height:240px;" alt=""/>
                                <div class="arrival-info">
                                    <h4>{{$product_new->category ? $product_new->category->name : 'Uncategorized'}}</h4>
                                    <p>{{$product_new->name}}</p>
                                    <span class="pric1"><del>{{$product_new->name}}</del></span>
                                    <span class="disc">[10% Off]</span>
                                </div>
                                <div class="viw">
                                    <a href="{{ url('/products') }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                                </div>
                                <div class="shrt">
                                    <a href="{{ url('/products') }}"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Shortlist</a>
                                </div></a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                    <script type="text/javascript">
                        $(function () {
                            $("#flexiselDemo1").flexisel({
                                visibleItems: 4,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 3000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });
                        });
                    </script>

                </div>
            </div>
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
                <p>Copyright Â© 2018 Food Store. Passerelles Numeriques | Design by <a href="#">4DOGS</a></p>
            </div>
        </div>		 
    </body>
    <div class="panel panel-primary">
        <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New Product</button>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Product</h4>
                </div>
                <div class="modal-body">
                    <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDetail" class="col-sm-3 control-label">Details</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="details" name="details" placeholder="details" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                    <input type="hidden" id="product_id" name="product_id" value="0">
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>	

</html>

@extends('layouts.index')


@section('welcome')
<div class="banner">
    <div class="container">
    </div>
</div>
<div class="welcome">
    <div class="container">
        <div class="col-md-3 welcome-left">
            <h2>Welcome to our site</h2>
        </div>
        <div class="col-md-9 welcome-right">
            <h3>Proin ornare massa eu enim pretium efficitur.</h3>
            <p>Etiam fermentum consectetur nulla, sit amet dapibus orci sollicitudin vel. 
                Nulla consequat turpis in molestie fermentum. In ornare, tellus non interdum ultricies, elit 
                ex lobortis ex, aliquet accumsan arcu tortor in leo. Nullam molestie elit enim. Donec ac 
                aliquam quam, ac iaculis diam. Donec finibus scelerisque erat, non convallis felis commodo ac.</p>
        </div>
    </div>
</div>
@endsection

@section('ads')
<div class="bride-grids">
    <div class="container">
        <div class="col-md-4 bride-grid">
            <div class="content-grid l-grids">
                <figure class="effect-bubba">
                    <img src="images/b1.jpg" alt=""/>
                    <figcaption>
                        <h4>Nullam molestie </h4>
                        <p>In sit amet sapien eros Integer in tincidunt labore et dolore magna aliqua</p>																
                    </figcaption>			
                </figure>
                <div class="clearfix"></div>
                <h3>Wedding Dresses</h3>
            </div>
            <div class="content-grid l-grids">
                <figure class="effect-bubba">
                    <img src="images/b2.jpg" alt=""/>
                    <figcaption>
                        <h4>Nullam molestie </h4>
                        <p>In sit amet sapien eros Integer in tincidunt labore et dolore magna aliqua</p>																
                    </figcaption>			
                </figure>	
                <div class="clearfix"></div>
                <h3>BridalParty & Dresses</h3>
            </div>
        </div>
        <div class="col-md-4 bride-grid">
            <div class="content-grid l-grids">
                <img src="images/brid.jpg" alt=""/>

                <h3>Bridesmaid Dresses</h3>
            </div>
        </div>
        <div class="col-md-4 bride-grid">
            <div class="content-grid l-grids">
                <figure class="effect-bubba">
                    <img src="images/b3.jpg" alt=""/>
                    <figcaption>
                        <h4>Nullam molestie </h4>
                        <p>In sit amet sapien eros Integer in tincidunt labore et dolore magna aliqua</p>																
                    </figcaption>			
                </figure>	
                <div class="clearfix"></div>
                <h3>Wedding</h3>
            </div>
            <div class="content-grid l-grids">
                <figure class="effect-bubba">
                    <img src="images/b4.jpg" alt=""/>
                    <figcaption>
                        <h4>Nullam molestie </h4>
                        <p>In sit amet sapien eros Integer in tincidunt labore et dolore magna aliqua</p>																
                    </figcaption>			
                </figure>
                <div class="clearfix"></div>
                <h3>Most Beautiful</h3>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection

@section('container')
<div class="container">
    <h3>Featured Products</h3>
    <div class="feature-grids">
        @if($image_products)
        @foreach($image_products as $key => $image_product)
        <div class="col-md-3 feature-grid jewel">
            <a href="{{ url('/products') }}"><img src="{{ asset($image_product['link_image']) }}" alt="" id="image_responsive"/>	
                <div class="arrival-info">
                    <h4>{{$image_product['product']['category'] ? $image_product['product']['category']['name'] : 'Uncategorized'}}</h4>
                    <p>{{$image_product['product']['name']}}</p>
                    <span class="pric1"><del>{{$image_product['product']['name']}}</del></span>
                    <span class="disc">[12% Off]</span>
                </div>
                <div class="viw">
                    <a href="{{ url('/products') }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                </div>
                <div class="shrt">
                    <a href="{{ url('/products') }}"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Shortlist</a>
                </div></a>
        </div>
        @endforeach
        @endif
        <div class="clearfix"></div>
    </div>
</div>
@endsection

@section('slide1')
<div class="container">	
    <h3>New Arrivals</h3>
    <div class="arrival-grids">			 
        <ul id="flexiselDemo1">
            @if($image_products_new)
            @foreach($image_products_new as $key => $image_product_new)
            <li>
                <a href="{{ url('/products') }}"><img src="{{ asset($image_product_new['link_image']) }}" alt=""/>
                    <div class="arrival-info">
                        <h4>{{$image_product_new['product']['category'] ? $image_product_new['product']['category']['name'] : 'Uncategorized'}}</h4>
                        <p>{{$image_product_new['product']['name']}}</p>
                        <span class="pric1"><del>{{$image_product_new['product']['name']}}</del></span>
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
            $(window).load(function () {
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
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>			 
    </div>
</div>
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


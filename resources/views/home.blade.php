@extends('layouts.index')
@section('welcome')
<div class="banner">
    <div class="container">
    </div>
</div>
<div class="welcome">
    <div class="container">
        <div class="col-md-3 welcome-left">
            <h2>Welcome to our restaurant</h2>
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
                    <img src="images/d2.jpg" alt=""/>
                    <figcaption>
                        <h4>Nullam molestie </h4>
                        <p>In sit amet sapien eros Integer in tincidunt labore et dolore magna aliqua</p>																
                    </figcaption>			
                </figure>
                <div class="clearfix"></div>
                <h3 style="text-align: center;">Sweet's Food</h3>
            </div>
            <div class="content-grid l-grids">
                <figure class="effect-bubba">
                    <img src="images/d3.jpg" alt=""/>
                    <figcaption>
                        <h4>Nullam molestie </h4>
                        <p>In sit amet sapien eros Integer in tincidunt labore et dolore magna aliqua</p>																
                    </figcaption>			
                </figure>	
                <div class="clearfix"></div>
                <h3 style="text-align: center;">France's Food</h3>
            </div>
        </div>
        <div class="col-md-4 bride-grid">
            <div class="content-grid l-grids">
                <img src="images/d7.jpg" alt="Image" style="width: 350px; height: 550px;"/>

                <h3 style="text-align: center;">Ice-cream Delicious</h3>
            </div>
        </div>
        <div class="col-md-4 bride-grid">
            <div class="content-grid l-grids">
                <figure class="effect-bubba">
                    <img src="images/d6.jpg" alt="Image" style="height: 252.93px;"/>
                    <figcaption>
                        <h4>Nullam molestie</h4>
                        <p>In sit amet sapien eros Integer in tincidunt labore et dolore magna aliqua</p>																
                    </figcaption>			
                </figure>	
                <div class="clearfix"></div>
                <h3 style="text-align: center;">Vegetables & Fruit</h3>
            </div>
            <div class="content-grid l-grids">
                <figure class="effect-bubba">
                    <img src="images/d5.jpg" alt="Image" style="height: 214.38px;"/>
                    <figcaption>
                        <h4>Nullam molestie </h4>
                        <p>In sit amet sapien eros Integer in tincidunt labore et dolore magna aliqua</p>																
                    </figcaption>			
                </figure>
                <div class="clearfix"></div>
                <h3 style="text-align: center;">Most Beautiful</h3>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection

@section('container')
<div class="featured">
    <div class="container">
        <h3>Featured Products</h3>
        <div class="feature-grids">
            @if($products)
            @foreach($products as $key =>$product)
            <div class="col-md-3 feature-grid jewel">
                <a href="{{url('/products')}}"><img src="{{asset($product->thumbnail()->link_image)}}" style="width: 295px; height:250px;"/>	
                    <div class="arrival-info">
                        <h4>{{$product->category ? $product->category->name : 'Uncategorized'}}</h4>
                        <p>{{$product->name}}</p>
                        <span class="pric1"><del>{{$product->name}}</del></span>
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


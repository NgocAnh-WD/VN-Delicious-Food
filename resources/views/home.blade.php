@extends('layouts.index')
@section('welcome')
<div class="welcome">
    <div class="container">
        <div class="col-md-3 welcome-left">
            <h2>Welcome to 5 Pandas Website</h2>
        </div>
        <div class="col-md-9 welcome-right">
            <h3>Food 5 Pandas.</h3>
            <p>5 Pandas là website chính thức của chuỗi cửa hàng thức ăn 5PANDAS nổi tiếng. Ngoài việc cung 
                cấp các món ăn ngon của cửa hàng đến thực khách. Chúng tôi còn liên kết với các chuỗi nhà hàng nổi
                tiếng khác để đem đến cho các bạn thật nhiều món ăn ngon miệng. Chất lượng hàng đầu, giá thành hợp 
                lý và được đưa đến tận nhà một cách nhanh chóng, đảm bảo vệ sinh an toàn thực phẩm.</p>
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
                    <img src="images/d3.jpg" alt=""/>
                    <figcaption>
                        <h4>Sweet's Food</h4>
                        <p>Tất cả các món ăn của 5 Pandas được chăm chút tỉ mỉ để có được một món ăn 
                            tuyệt vời y như món ăn mẹ nấu. Ngọt ngào, ấm áp và ngập tràn yêu thương</p>																
                    </figcaption>			
                </figure>
                <div class="clearfix"></div>
                <h3 class="content_grid_sweet">Sweet's Food</h3>
            </div>
            <div class="content-grid l-grids">
                <figure class="effect-bubba">
                    <img src="images/d2.jpg" alt=""/>
                    <figcaption>
                        <h4>France's Food</h4>
                        <p>Các món ăn Pháp được các đầu bếp hàng đầu chế biến với 
                            tất cả tâm huyết, tạo nên món ăn tuyệt vời.</p>																
                    </figcaption>			
                </figure>	
                <div class="clearfix"></div>
                <h3 class="content_grid_sweet">France's Food</h3>
            </div>
        </div>
        <div class="col-md-4 bride-grid">
            <div class="content-grid l-grids">
                <img src="images/d7.jpg" alt="Image" style="width: 350px; height: 550px;"/>
            </div>
        </div>
        <div class="col-md-4 bride-grid">
            <div class="content-grid l-grids">
                <figure class="effect-bubba">
                    <img src="images/d6.jpg" alt="Image" style="height: 252.93px;"/>
                    <figcaption>
                        <h4>Vegetables & Fruit</h4>
                        <p>Các món ăn của chúng tôi luôn là sự kết hợp
                            hoàn hảo giữa nguyên liệu và rau củ.</p>																
                    </figcaption>			
                </figure>	
                <div class="clearfix"></div>
                <h3 class="content_grid_sweet">Vegetables & Fruit</h3>
            </div>
            <div class="content-grid l-grids">
                <figure class="effect-bubba">
                    <img src="images/d5.jpg" alt="Image" style="height: 214.38px;"/>
                    <figcaption>
                        <h4>Vietnam's Food</h4>
                        <p>Những món ăn truyền thống đậm đà, mang nhiều bản sắc dân tộc.</p>																
                    </figcaption>			
                </figure>
                <div class="clearfix"></div>
                <h3 class="content_grid_sweet">Vietnam's Food</h3>
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
        @if($products)
        @foreach($products as $key => $product)
        <div class="col-md-3 feature-grid jewel">
            <a href="{{url('/products')}}"><img src="{{asset($product->thumbnail()->link_image)}}" style="width: 255px; height:250px;"/>	
                <div class="arrival-info">
                    <h4>{{$product->category ? $product->category->name : 'Uncategorized'}}</h4>
                    <p>{{$product->name}}</p>
                    <span>{{$product->is_price()->price}}</span>
                </div>
                <div class="viw">
                    <a href="{{ url('/products') }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>View Products</a>
                </div>
                <div class="shrt">
                    <a href="{{ url('/single',$product->id) }}"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Product Detail</a>
                </div></a>
        </div>
        @endforeach
        @endif
        <div class="clearfix"></div>
    </div>
</div>
@endsection

@section('slide1')
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
                            <span class="pric1">{{$product_new->is_price()->price}}</span>
                            <span class="disc">[0% Off]</span>
                        </div>
                        <div class="viw">
                            <a href="{{ url('/products') }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>View Products</a>
                        </div>
                        <div class="shrt">
                            <a href="{{ url('/single',$product_new->id) }}"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Product Detail</a>
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
            <script type="text/javascript" src="{{asset('js/jquery.flexisel.js')}}"></script>			 
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


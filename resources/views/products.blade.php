@extends('layouts.index')

@section('container')
<div class="product-model">	 
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li class="active">Products</li>
        </ol>
        <h2>Our Products</h2>			
        <div class="col-md-9 product-model-sec" id="product-container">
            @if(isset($products))
            @if (session('order'))
            <div class="alert alert-success">
                {{ session('order') }}
            </div>
            @endif
            @foreach($products as $key => $product)
            <div class="col-md-4 feature-grid jewel">
                <a href="{{url('single', ['id' => $product->id])}}"><img src="{{asset($product->thumbnail()->link_image)}}" style="width: 247px; height:240px;"/>
                    <div class="arrival-info">

                        <div class="product-info simpleCart_shelfItem">
                            <div class="product-info-cust prt_name" style="text-align: center;">
                                <h4>{{$product->name}}</h4>
                                <p>{{$product->category? $product->category->name : 'Uncategorized'}}</p>
                                <span class="item_price pric1">{{$product? $product->is_price()->price : 'Unpriced'}}VNĐ</span>
                                <span class="disc">[12% Off]</span>
                            </div>													
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif

            <div class="row">
                <div class="col-lg-6 col-sm-offset-5" style="text-align: left">
                    {{ $products->render() }}
                </div>
            </div>
        </div>       
        <div class="rsidebar span_1_of_left">
            @include('includes.categories_widget')
            <!--script-->
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".tab1 .single-bottom").hide();
                    $(".tab2 .single-bottom").hide();
                    $(".tab3 .single-bottom").hide();
                    $(".tab4 .single-bottom").hide();
                    $(".tab5 .single-bottom").hide();

                    $(".tab1 ul").click(function () {
                        $(".tab1 .single-bottom").slideToggle(300);
                        $(".tab2 .single-bottom").hide();
                        $(".tab3 .single-bottom").hide();
                        $(".tab4 .single-bottom").hide();
                        $(".tab5 .single-bottom").hide();
                    })
                    $(".tab2 ul").click(function () {
                        $(".tab2 .single-bottom").slideToggle(300);
                        $(".tab1 .single-bottom").hide();
                        $(".tab3 .single-bottom").hide();
                        $(".tab4 .single-bottom").hide();
                        $(".tab5 .single-bottom").hide();
                    })
                    $(".tab3 ul").click(function () {
                        $(".tab3 .single-bottom").slideToggle(300);
                        $(".tab4 .single-bottom").hide();
                        $(".tab5 .single-bottom").hide();
                        $(".tab2 .single-bottom").hide();
                        $(".tab1 .single-bottom").hide();
                    })
                    $(".tab4 ul").click(function () {
                        $(".tab4 .single-bottom").slideToggle(300);
                        $(".tab5 .single-bottom").hide();
                        $(".tab3 .single-bottom").hide();
                        $(".tab2 .single-bottom").hide();
                        $(".tab1 .single-bottom").hide();
                    })
                    $(".tab5 ul").click(function () {
                        $(".tab5 .single-bottom").slideToggle(300);
                        $(".tab4 .single-bottom").hide();
                        $(".tab3 .single-bottom").hide();
                        $(".tab2 .single-bottom").hide();
                        $(".tab1 .single-bottom").hide();
                    })
                });
            </script><!--
             script 					 
    </section>-->
            <section  class="sky-form">
                <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>PRICES</h4>
                <div class="row row1 scroll-pane">
                    <form method="POST" name="FormSortProduct" action="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="col col-4">

                            <select id="select-price">
                                <option value="">-- Select price --</option>
                                <option value="1,19">1.000 - 19.000(VND)</option>
                                <option value="20,29">20.000 - 29.000 (VND)</option>
                                <option value="30,39">30.000 - 39.000 (VND)</option>
                                <option value="40,49">40.000 - 49.000 (VND)</option>
                                <option value="50, 1000">Over 50.000 (VND)</option>
                            </select>
                            <div style="margin-top: 12px" class="hr">
                                <div class="category">
                                    <label for="size-1" class='cat-check'>
                                        <input class="p-size"  type="checkbox" name="size[]" value="s" id="size-1">
                                        Size S</label>
                                </div>
                                <div class="category">
                                    <label for="size-2" class='cat-check'>
                                        <input class="p-size" type="checkbox" name="size[]" value="m" id="size-2">
                                        Size M</label>
                                </div>
                                <div class="category">
                                    <label for="size-3" class='cat-check'>
                                        <input class="p-size"  type="checkbox" name="size[]" value="l" id="size-3">
                                        Size L</label>
                                </div>

                                <button style="background: #00a0dc; color: white; margin-top: 7px" type="button" id="search-product">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!---->
            <script type="text/javascript" src="js/search.js"></script>
            <script type="text/javascript" src="js/jquery-ui.min.js"></script>
            <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
            <script type='text/javascript'>//<![CDATA[ 

                $(window).load(function () {
                    $("#slider-range").slider({
                        range: true,
                        min: 0,
                        max: 400000,
                        values: [8500, 350000],
                        slide: function (event, ui) {
                            $("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
                        }
                    });
                    $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

                });//]]> 
            </script>
            <section  class="sky-form">
                <div class="qc">
                    <h4 class="title">Đơn hàng của bạn sẽ được bảo quản như thế nào?</h4>
                    <p class="font15">4 DOGS Food Store sẽ bảo quản đơn hàng của bạn bằng túi & thùng để chống nắng mưa, giữ nhiệt... trên đường đi một cách tốt nhất. Đem đến cho bạn một món ăn nóng hổi y như vừa mới nấu xong vậy.</p>
                    <img src="{{asset('images/ship.jpg')}}" alt="food preservation" data-change-lang style="margin-top: 10px; width: 200px; height: 200px;"/>
                </div>
            </section>
            <section class="sky-form" style="margin-top: 25px;">
                <h4>Khuyến mãi</h4>
                <iframe width="250" height="200" src="https://www.youtube.com/embed/Wzy5CYJm3DM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </section>
        </div>				 
    </div>
</div>
@endsection


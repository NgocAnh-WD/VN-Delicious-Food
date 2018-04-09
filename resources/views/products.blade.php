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
                <div id="test"> </div>
                <a href="{{ url('/single',$product->id) }}"> 
                    <div class="product-grid love-grid">
                        <div class="more-product"><span> </span></div>						
                        <div class="product-img b-link-stripe b-animate-go  thickbox">
                            <img src="{{ asset($product->thumbnail()->link_image) }}" style="height:220px;"/>
                            <div class="b-wrapper">
                                <h4 class="b-animate b-from-left  b-delay03">							
                                    <button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
                
                <div class="product-info simpleCart_shelfItem">
                    <div class="product-info-cust prt_name" style="text-align: center;">
                        <h4>{{$product->name}}</h4>
                        <p>{{$product->category? $product->category->name : 'Uncategorized'}}</p>
                        <span class="item_price">{{$product? $product->is_price()->price : 'Unpriced'}}VNĐ</span>								
                        <div id="style" style="margin-top: 10px;">
                            <button class="col-lg-5 col-md-5 col-xs-5 col-sm-5 btn btn-info cart" value="{{$product->id}}">Add to cart</button>
                            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2"></div>
                            <button class="col-lg-5 col-md-5 col-xs-5 col-sm-5 btn btn-info"><a href="{{ url('single', ['id' => $product->id]) }}">View detail</a></button>
                        </div>
                    </div>													
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
                            <option value="">Select price</option>
                            <option value="1,19">1.000 - 19.000(VND)</option>
                            <option value="20,29">20.000 - 29.000 (VND)</option>
                            <option value="30,39">30.000 - 39.000 (VND)</option>
                            <option value="40,49">40.000 - 49.000 (VND)</option>
                            <option value="50, 1000">Over 50.000 (VND)</option>
                        </select>

                        <div class="category">
                            <input class="p-size"  type="checkbox" name="size[]" value="s" id="size-1">
                            <label for="size-1" class='cat-check'>Size S</label>
                        </div>
                        <div class="category">
                            <input class="p-size" type="checkbox" name="size[]" value="m" id="size-2">
                            <label for="size-2" class='cat-check'>Size M</label>
                        </div>
                        <div class="category">
                            <input class="p-size"  type="checkbox" name="size[]" value="l" id="size-3">
                            <label for="size-3" class='cat-check'>Size L</label>
                        </div>

                        <button type="button" id="search-product">Search</button>
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
        <!---->
        <section  class="sky-form">
            <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Type</h4>
            <div class="row row1 scroll-pane">
                <div class="col col-4">
                    <label class="checkbox"><input type="checkbox" name="checkboxtype" checked=""><i></i>1 Gram Gold (30)</label>
                </div>
                <div class="col col-4">
                    <label class="checkbox"><input type="checkbox" name="checkboxtype"><i></i>Gold Plated   (30)</label>
                    <label class="checkbox"><input type="checkbox" name="checkboxtype"><i></i>Platinum      (30)</label>
                    <label class="checkbox"><input type="checkbox" name="checkboxtype"><i></i>Silver        (30)</label>
                    <label class="checkbox"><input type="checkbox" name="checkboxtype"><i></i>Jewellery Sets  (30)</label>
                    <label class="checkbox"><input type="checkbox" name="checkboxtype"><i></i>Stone Items   (30)</label>
                </div>
            </div>
        </section>
        <section  class="sky-form">
            <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Brand</h4>
            <div class="row row1 scroll-pane">
                <div class="col col-4">
                    <label class="checkbox"><input type="checkbox" name="checkboxbr" checked=""><i></i>Akasana Collectio</label>
                </div>
                <div class="col col-4">
                    <label class="checkbox"><input type="checkbox" name="checkboxbr"><i></i>Colori</label>
                    <label class="checkbox"><input type="checkbox" name="checkboxbr"><i></i>Crafts Hub</label>
                    <label class="checkbox"><input type="checkbox" name="checkboxbr"><i></i>Jisha</label>
                    <label class="checkbox"><input type="checkbox" name="checkboxbr"><i></i>Karatcart</label>
                    <label class="checkbox"><input type="checkbox" name="checkboxbr" ><i></i>Titan</label>
                    <label class="checkbox"><input type="checkbox" name="checkboxbr"><i></i>Amuktaa</label>
                </div>
            </div>
        </section>			
    </div>				 
</div>
</div>
</div>
@endsection


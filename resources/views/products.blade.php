@extends('layouts.index')

@section('container')
<div class="product-model">	 
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li class="active">Products</li>
        </ol>
        <h2>Our Products</h2>			
        <div class="col-md-9 product-model-sec">
            @if($products)
            <h5 style="color: red">We have {{count($products)}} product(s)</h5>
            @foreach($products as $key => $product)
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a href="{{ url('/single',$product->id) }}"> <div class="product-grid love-grid">
                    <div class="more-product"><span> </span></div>						
                    <div class="product-img b-link-stripe b-animate-go  thickbox">
                        <img src="{{ asset($product->thumbnail()->link_image) }}" class="img-responsive" alt=""/>
                        <div class="b-wrapper">
                            <h4 class="b-animate b-from-left  b-delay03">							
                                <button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
                            </h4>
                        </div>
                    </div></a>						
            <div class="product-info simpleCart_shelfItem">
                <div class="product-info-cust prt_name">
                    <h4>{{$product->name}}</h4>
                    <p>{{$product->category? $product->category->name : 'Uncategorized'}}</p>
                    <span class="item_price">{{$product? $product->is_price()->price : 'Unpriced'}}</span>								
                    <input type="text" class="item_quantity" value="1" />
                    <button class="btn btn-info" ><a href="{{ url('addtocart', ['id' => $product->id]) }}">Add to cart</a></button>
                </div>													
                <div class="clearfix"> </div>
            </div>
        </div>	
        @endforeach
        @endif
        

        
        <div class="row">
            <div class="col-lg-6 col-sm-offset-5">
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
                        <label class="checkbox"><input type="checkbox" name="checkbox" id="published1" value="100" ><i></i>10.000-100.000 (VND)</label>
                    </div>
                    <div class="col col-4">                    
                        <label class="checkbox"><input type="checkbox" name="checkbox" id="published2" value="200"><i></i>109.000-199.000 (VND)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox" id="published3" value="400"><i></i>200.000-399.000 (VND)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox" id="published4" value="500"><i></i>400.000-499.000 (VND)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox" id="published5" value="501"><i></i>Over 500.000 (VND)</label>
                    </div>
                </form>
            </div>
        </section> 				 				 
        <section  class="sky-form">
            <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Price</h4>
            <ul class="dropdown-menu1">
                <li><a href="">								               
                        <div id="slider-range"></div>							
                        <input type="text" id="amount" style="border: 0; font-weight: NORMAL;   font-family: 'Arimo', sans-serif;" />
                    </a></li>			
            </ul>
        </section>
        <!---->
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script src="{{asset('js/ajaxscript.js')}}"></script>
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


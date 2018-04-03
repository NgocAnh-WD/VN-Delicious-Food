@extends('layouts.index')

@section('container')
<div class="product-model">	 
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Products</li>
        </ol>
        
        <h2>Our Products</h2>			
        <div class="col-md-9 product-model-sec">
            @if($products)
            @foreach($products as $key => $product)
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{ url('/single',$product->product_id) }}">
                    <div class="product-grid love-grid">
                        <div class="more-product"><span> </span></div>						
                        <div class="product-img b-link-stripe b-animate-go  thickbox">
                            <img src="{{ asset($product->link_image) }}" class="img-responsive" alt=""/>
                            <div class="b-wrapper">
                                <h4 class="b-animate b-from-left  b-delay03">							
                                    <button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
                
                <div class="product-info simpleCart_shelfItem">
                    <div class="product-info-cust prt_name">
                        <h4>{{$product->name}}</h4>
                        <p>{{$product? $product->name_category : 'Uncategorized'}}</p>
                        <span class="item_price">{{$product? $product->price : 'Unpriced'}}</span>								
                        <input type="text" class="item_quantity" value="1" />
                        <input type="button" class="item_add items" value="ADD">
                    </div>
                    
                    <div class="clearfix"> </div>
                </div>
            	
            @endforeach
            @endif
        </div>
        
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
        		
    </div>				 
</div>
@endsection
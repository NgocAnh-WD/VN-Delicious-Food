@extends('layouts.index')

@section('container')
<div class="single-sec">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{asset('/home')}}">Home</a></li>
            <li class="active"><a href="{{asset('/products')}}">Products</a></li>
        </ol>
        <!-- start content -->	
        <div class="col-md-9 det">
            <div class="single_left">
                <div class="bzoom_wrap">
                    <ul id="bzoom">
                        @foreach($image as $images)
                        <li>
                            <img class="bzoom_thumb_image" src="{{asset($images->link_image)}}" style="width: 250px; height: 350px;"/>
                            <img class="bzoom_big_image" src="{{asset($images->link_image)}}"/>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="single-right">
                <h3>{{$product_detail ->name}}</h3>
                <h4 style=" font-size: 16px;">ID Sản phẩm: {{$product_detail->id}}</h4>
                <div class="item-sec">
                    <h4>Chi tiết sản phẩm</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><p>Size</p></td>
                                <td><p>Price</p></td>
                                <td><p>Quantity</p></td>
                                <td><p>Action</p></td>
                            </tr>
                            @foreach($price_size as $price_sizes)
                            <tr>
                                <td><p>{{$price_sizes->size}}</p></td>
                                <td><p>{{$price_sizes->price}}</p></td>
                                <td><p>{{$price_sizes->quantity}}</p></td>
                                <td>
                                    <button type="submit" class="btn btn-success" style="margin-top: 20px;">
                                        <span>
                                            <a href="{{asset('/cart')}}" style="color:#FFF">Add Product</a>
                                        </span>
                                    </button>
                                    <button type="submit" class="btn btn-success" style="margin-top: 20px;">
                                        <span>
                                            <a href="#" style="color:#FFF">Buy Now</a>
                                        </span>
                                    </button>
                                </td>
                            </tr>														
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="single-bottom1">
                    <h6>Details</h6>
                    <p class="prod-desc">{{$product_detail->description}}</p>
                </div>	
                <button type="submit" class="btn btn-danger" style="margin-top: 20px;">
                    <span>
                        <a href="{{asset('/products')}}" style="color:#FFF">Back to Home</a>
                    </span>
                </button>
            </div>
            <div class="clearfix"></div>
            <div class="arrivals">	
                <div class="product-table">
                    <h3>Sản phẩm cùng loại</h3>
                </div>
                <div class="arrival-grids">			 
                    <ul id="flexiselDemo1">
                        <li>
                            <a href="product.html"><img src="images/p2.jpg" alt=""/>	
                                <div class="arrival-info">
                                    <h4>Jewellerys #1</h4>
                                    <p>Rs 12000</p>
                                    <span class="pric1"><del>Rs 18000</del></span>
                                    <span class="disc">[12% Off]</span>
                                </div>
                                <div class="viw">
                                    <a href="#"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                                </div></a>				 
                        </li>
                        <li>
                            <a href="product.html"><img src="images/p3.jpg" alt=""/>
                                <div class="arrival-info">
                                    <h4>Jewellerys #1</h4>
                                    <p>Rs 14000</p>
                                    <span class="pric1"><del>Rs 15000</del></span>
                                    <span class="disc">[10% Off]</span>
                                </div>
                                <div class="viw">
                                    <a href="#"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                                </div></a>						 
                        </li>
                        <li>
                            <a href="product.html"><img src="images/p4.jpg" alt=""/>	
                                <div class="arrival-info">
                                    <h4>Jewellerys #1</h4>
                                    <p>Rs 4000</p>
                                    <span class="pric1"><del>Rs 8500</del></span>
                                    <span class="disc">[45% Off]</span>
                                </div>
                                <div class="viw">
                                    <a href="#"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                                </div></a>						 
                        </li>
                        <li>
                            <a href="product.html"> <img src="images/p5.jpg" alt=""/>	
                                <div class="arrival-info">
                                    <h4>Jewellerys #1</h4>
                                    <p>Rs 18000</p>
                                    <span class="pric1"><del>Rs 21000</del></span>
                                    <span class="disc">[8% Off]</span>
                                </div>
                                <div class="viw">
                                    <a href="#"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                                </div></a>						 
                        </li>
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
                    <script type="text/javascript" src="{{asset('js/jquery.flexisel.js')}}"></script>	  
                </div>
            </div>			
            <div class="clearfix"></div>
        </div>
        <div class="rsidebar span_1_of_left">

            @include('includes.categories_widget')
            <script>
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
            </script>
            <!-- script -->					 
            <!--            </section>-->
            <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}">
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
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>1 Gram Gold (30)</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Gold Plated   (30)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Platinum      (30)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Silver        (30)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jewellery Sets  (30)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Stone Items   (30)</label>
                    </div>
                </div>
            </section>		
        </div> 
        <div class="clearfix"></div>
        <div class="arrivals">
            <div class="product-table">
                <h3>Đánh giá của khách hàng</h3>
                @if(Auth::check())
                <div class="well">
                    <h4>Bình luận về sản phẩm:</h4>
                    <form action="{{ route('admin.comments.store') }}" method="POST" enctype='multipart/form-data'>
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="product_id" value="{{$product_detail->id}}">

                        <div class="form-group">
                            <div class=" row {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}" required>
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="title">Content:</label>
                            <div class=" row {{ $errors->has('content') ? 'has-error' : '' }}">
                                <textarea name="content" class="form-control" rows="5" id="content" placeholder="Enter Content" value="{{ old('content') }}" required></textarea>
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                            </div> 
                        </div>

                        <div class="form-group">
                            <input type="submit" id="comment" class="btn btn-primary" value="Comment" />
                        </div>
                    </form>
                </div>
                @endif

                @if($comment)
                @foreach($comment as $comments)
                <div class="well">
                    <div class="row">
                        <div class="media">
                            <div class="col-md-2">
                                @if($comments->user)                               
                                <img src="{{asset($comments->user->avata_image)}}" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">
                                {{$comments->user->username}}<br>
                                @endif
                            </div>
                            <div class="col-md-7">
                                <h4 class="media-heading"><a href="{{ url('product_details/'. $product_detail->id) }}" style="color: black;">{{$comments->title}}</a></h4>
                                {{str_limit($comments->content, 300)}} 
                            </div>
                            <div class="col-md-2">
                                <p><span class="glyphicon glyphicon-time"></span> Posted: {{$comments->created_at}}</p>
                            </div> 
                        </div>
                    </div>                                       
                    @if(count($comments->children))
                    <details close>
                        <summary style="color: blue;">View Reply Comment</summary>  
                        @foreach($comments->children as $replyComment)
                        <div class="media" style="border: 1px solid #e3e3e3; margin-top: 10px; margin-left: 50px; margin-right: 50px;">
                            <div class="col-md-3">
                                @if($replyComment->user)                          
                                <img src="{{asset($replyComment->user->avata_image)}}" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%; margin: 5px;">                               
                                {{$replyComment->user->username}}<br>
                                @endif
                            </div>
                            <div class="col-md-6">
                                {{str_limit($replyComment->content, 300)}} 
                            </div>
                            <div class="col-md-2">
                                <p><span class="glyphicon glyphicon-time"></span> Posted: {{$replyComment->created_at}}</p>
                            </div>                                                                                
                        </div>
                        @endforeach
                    @endif
                    </details>
                    <details close>
                        <summary style="color: blue;">-- Reply --</summary>  
                        <div class="well" id="repplyComment">
                            <form action="{{ route('admin.comments.store') }}"id="comment" name="comment" method="POST" enctype='multipart/form-data'>
                                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
                                <input type="hidden" name="product_id" value="{{$product_detail->id}}">
                                <input type="hidden" name="parent_id" id="parent_id" value="{{$comments->id}}">

                                <div class="form-group">
                                    <label for="content">Content:</label>
                                    <div class=" row {{ $errors->has('content') ? 'has-error' : '' }}">
                                        <textarea name="content" class="form-control" rows="5" id="content" placeholder="Enter Content" value="{{ old('content') }}" required></textarea>
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="comment" class="btn btn-primary" value="Comment">Comment</button>
                                </div>
                            </form>  
                        </div> 
                    </details> 
                </div>
                @endforeach
                @endif

                @section('scripts')
                <script>
                    $(".comment-reply-container .toggle-reply").click(function () {
                        $(this).next().slideToggle("slow");
                    });
                </script>
                @endsection
            </div>
        </div>	 
    </div>
</div>
@endsection
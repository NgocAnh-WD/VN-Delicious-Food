@extends('layouts.index')

@section('container')

<div class="single-sec">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{asset('/home')}}">Home</a></li>
            <li class="active"><a href="{{asset('/products')}}">Products</a></li>
            <li class="active"><a>Product Details</a></li>
        </ol>
        <!-- start content -->	
        <div class="col-md-9 det">
            <div class="single_left">
                <div class="data-thumb">
                    <ul id="bzoom">
                        @foreach($images as $image)
                        <li>
                            <img class="bzoom_thumb_image" src="{{asset($image->link_image)}}"/>
                            <img class="bzoom_big_image" src="{{asset($image->link_image)}}"/>
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
                            @foreach($price_sizes as $price_size)
                            <tr>
                                <td><p>{{$price_size->size}}</p></td>
                                <td><p>{{$price_size->price}}</p></td>
                                <td><p>{{$price_size->quantity}}</p></td>
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
                    <form method="POST" id="comment_form" enctype='multipart/form-data'>
                        <input type="hidden" id="_token1" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" id="product_id" name="product_id" value="{{$product_detail->id}}">
                        <input type="hidden" id="user_id" value="{{Auth::check() ? Auth::user()->id : 0}}"/>
                        <input type="hidden" id="avata_image" value="{{Auth::check() ? Auth::user()->avata_image : ""}}"/>
                        <input type="hidden" id="username" value="{{Auth::check()?Auth::user()->username :""}}"/>

                        <div class="form-group">
                            <div class=" row {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title">
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="title">Content:</label>
                            <div class=" row {{ $errors->has('content') ? 'has-error' : '' }}">
                                <textarea name="content" class="form-control" rows="5" id="content" placeholder="Enter Content"></textarea>
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                            </div> 
                        </div>

                        <div class="form-group">
                            <button type="button" id="comment-btn" class="btn btn-primary" >Comment</button>
                        </div>
                    </form>                                                                          
                    <script type="text/javascript" src="{{asset('js/comment.js')}}"></script>                                 
                </div>
                @endif
                <div id="show_comment">
                    @if($comments)
                    @foreach($comments as $comment)
                    <div class="well" >
                        <div class="row">
                            <div class="media">
                                <div class="col-md-2">
                                    @if($comment->user)                               
                                    <img src="{{asset($comment->user->avata_image)}}" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">
                                    {{$comment->user->username}}<br>
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <h4 class="media-heading"><a href="{{ url('product_details/'. $product_detail->id) }}" style="color: black;">{{$comment->title}}</a></h4>
                                    {{str_limit($comment->content, 300)}} 
                                </div>
                                <div class="col-md-3">
                                    <p><span class="glyphicon glyphicon-time"></span> Posted: {{$comment->created_at->diffForhumans()}}</p>
                                </div> 
                            </div>
                        </div>                                       
                        @if(count($comment->children))
                        <details close>
                            <summary style="color: blue;">View Reply Comment</summary>
                            @foreach($comment->children as $replyComment)
                            <div id="show_reply_{{$comment->id}}">
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
                                    <div class="col-md-3">
                                        <p><span class="glyphicon glyphicon-time"></span> Posted: {{$replyComment->created_at->diffForhumans()}}</p>
                                    </div>                                                                                
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </details>
                        @if(Auth::check())
                        <details close>
                            <summary style="color: blue;">-- Reply --</summary>  
                            <div class="well">
                                <form id="replyComment_{{$comment->id}}" name="comment" method="POST" enctype='multipart/form-data'>
                                    <input type="hidden" id="token_reply" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" id="pro_id_{{$comment->id}}" name="product_id" value="{{$product_detail->id}}">
                                    <input type="hidden" id="parent_id_{{$comment->id}}" name="parent_id" value="{{$comment->id}}">
                                    <input type="hidden" id="user_id" value="{{Auth::check() ? Auth::user()->id : 0}}"/>
                                    <input type="hidden" id="avata_image1" value="{{Auth::check() ? Auth::user()->avata_image : ""}}"/>
                                    <input type="hidden" id="username1" value="{{Auth::check()?Auth::user()->username :""}}"/>

                                    <div class="form-group">
                                        <label for="content">Content:</label>
                                        <div class=" row {{ $errors->has('content') ? 'has-error' : '' }}">
                                            <textarea id="reply_content_{{$comment->id}}" name="content" class="form-control" rows="5" placeholder="Enter Content" value="{{ old('content') }}" required></textarea>
                                            <span class="text-danger">{{ $errors->first('content') }}</span>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary reply" data-id="{{$comment->id}}" value="Reply">Reply</button>
                                    </div>
                                </form>  
                                <script type="text/javascript" src="{{asset('js/reply.js')}}"></script>
                            </div> 
                        </details> 
                        @endif
                    </div>
                    @endforeach
                    @endif
                </div>
                <script type="text/javascript" src="{{asset('js/diffForHumans.js')}}"></script>
            </div>
        </div>	 
    </div>
</div>
@endsection
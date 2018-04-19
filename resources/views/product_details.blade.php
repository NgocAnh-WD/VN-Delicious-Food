@extends('layouts.index')

@section('container')
<div class="featured">
    <div class="single-sec">
        <div class="container" style="width: 1310px;">
            <ol class="breadcrumb">
                <li><a href="{{asset('/home')}}">Home</a></li>
                <li class="active"><a href="{{asset('/products')}}">Products</a></li>
                <li class="active"><a>Product Details</a></li>
            </ol>	
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
                    <h4 style=" font-size: 16px;">Mã sản phẩm: {{$product_detail->id}}</h4>
                    <div class="item-sec">
                        <h4>Chi tiết sản phẩm</h4>
                        <div style="padding: 16px 0 10px 0">
                            <p id="show_price" style="color: #f57224; font-size: 30px; display: inline-block">{{$sizes->price}}</p>
                            <p style="color: #f57224; font-size: 30px; display: inline-block">VNĐ</p>
                        </div>                        
                        <div class="pdp-mod-product-info-section pdp-mod-promotion-tags">
                            <h6 class="section-title">Giảm giá</h6>
                            <div class="section-content">
                                0%

                            </div>
                        </div>
                        <div class="pdp-mod-product-info-section pdp-mod-promotion-tags">
                            <h6 class="section-title" style="margin-top: 5px">Kích thước</h6>
                            <div class="section-content">
                                <select id="price_size" class="form-control" name="price_size" onchange="sizeAjax({{$product_detail->id}})">
                                    @foreach($price_sizes as $price_size)
                                    <option value="{{$price_size->size}}" {{ $price_size->size == $sizes->size ? 'selected="selected"' : '' }}>
                                        {{$price_size->size}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="padding-bottom: 15px; margin-top: 5px">
                            <div style="display: inline-block;width: 92px">Số lượng</div>
                            <button class="subtract1" id="" value="">-</button>
                            <div class="quantity1" id="quantity1">
                                1
                            </div>
                            <button class="plus1" value="">+</button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="to_pay_btn1">
                            <button type="submit" class="next-btn next-btn-primary next-btn-large checkout-order-total-button price_cart" style="background-color: #F57224" value="{{$product_detail->id}}">THÊM VÀO GIỎ HÀNG</button>
                        </div>
                    </div>	
                </div>
                <div class="clearfix"></div>      		           
            </div>
            <div class="rsidebar span_1_of_left">

                @include('includes.categories_widget')
                <script type="text/javascript" src="{{asset('js/jqzoom.js')}}"></script>
                <script type="text/javascript">
                                    $("#bzoom").zoom({
                                    zoom_area_width: 300,
                                            autoplay_interval: 3000,
                                            small_thumbs: 4,
                                            autoplay: false
                                    });
                </script>		
            </div> 
            <div class="clearfix">
            </div>
            <div class="arrivals">
                <h4 style="margin-top: 20px;margin-bottom: 20px;text-align: center;">Mô tả chi tiết sản phẩm</h4>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#description">Giới thiệu món</a></li>
                    <li><a data-toggle="tab" href="#menu">Menu cửa hàng</a></li>
                    <!--                    <li><a data-toggle="tab" href="#vote">Đánh giá sản phẩm</a></li>-->
                    <li><a data-toggle="tab" href="#think">Bình luận của khách hàng</a></li>  
                </ul>

                <div class="tab-content">
                    <div id="description" class="tab-pane fade in active">
                        <div class="arrivals">
                            <h4 style="font-size: 18px;">Cách làm món: {{$product_detail ->name}}</h4><br><br>
                            <h4 style="font-size: 16px;">Nguyên liệu:</h4>
                        </div>
                    </div>
                    <!--                    <div id="vote" class="tab-pane fade">
                                            <h3>Menu 1</h3>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>-->
                    <div id="think" class="tab-pane fade">
                        <div class="arrivals">                  
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
                                    <div class="media">
                                        <div class="row">
                                            <div class="col-md-2">
                                                @if($comment->user)                               
                                                <img src="{{asset($comment->user->avata_image)}}" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">
                                                {{$comment->user->username}}<br>
                                                @endif
                                            </div>
                                            <div class="col-md-7">
                                                <h4 class="media-heading">{{$comment->title}}</h4>
                                                {{str_limit($comment->content, 300)}} <br>
                                            </div>                                           
                                            <div class="col-md-3">
                                                <p><span class="glyphicon glyphicon-time"></span>Posted: {{$comment->created_at->diffForhumans()}}</p>
                                            </div>


                                            @if((count($comment->children))>= 3)
                                            <button type="button" class="showMorePro btn btn-link" data-toggle="collapse" data-target="#showMoreReply_{{$comment->id}}">
                                                <span class="glyphicon glyphicon-collapse-down"></span>View More Reply
                                            </button>
                                            @endif
                                        </div>
                                        <div id="show_reply_{{$comment->id}}" style="margin-top: 35px;"></div>

                                        <div id="showMoreReply_{{$comment->id}}" class="collapse">
                                            @foreach($comment->children as $replyComment)
                                            <div class="media" style="border: 1px solid #e3e3e3; margin-top: 10px; margin-left: 150px; margin-right: 150px;">
                                                <div class="row">
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
                                        </div>

                                    </div>
                                    @if(Auth::check())
                                    <div class="button">
                                        <button type="button" class="replyPro btn btn-primary" data-toggle="collapse" data-target="#replyForProduct_{{$comment->id}}">
                                            <span class="glyphicon glyphicon-collapse-down"></span>Write Reply
                                        </button>
                                    </div>
                                    <div class="well collapse" id="replyForProduct_{{$comment->id}}">
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
                                                <button class="btn btn-primary reply"  data-id="{{$comment->id}}" value="Reply">Reply</button>
                                            </div>
                                        </form>  

                                    </div> 
                                    @endif
                                </div>
                                @endforeach
                                @endif
                                <script type="text/javascript" src="{{asset('js/reply.js')}}"></script>
                                <script type="text/javascript" src="{{asset('js/diffForHumans.js')}}"></script>
                            </div>
                        </div>
                    </div>
                    <div id="menu" class="tab-pane fade">
                        <div class="arrivals" style="margin-left: 65px;">
                            <h4>Tổng hợp menu</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="feature-grids">
                                        <div class="content-grid l-grids">
                                            <figure class="effect-bubba" style="width: 450px; height:550px;">
                                                <img src="{{asset('images/menu/menu5.jpg')}}" style="width: 450px; height:550px;"/>	
                                                <figcaption>
                                                    <h4>4 DOGS - PIZZA</h4>
                                                    <p>Thực đơn của 4 DOGS dành cho những tín đồ pizza với nhiều loại pizza tuyệt ngon và nổi tiếng với giới trẻ. Các bạn hãy tham khảo rồi chọn đặt một món thật ngon cho mình nhé!</p>																
                                                </figcaption>
                                            </figure>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-grids">
                                        <div class="content-grid l-grids">
                                            <figure class="effect-bubba" style="width: 450px; height:550px;">
                                                <img src="{{asset('images/menu/menu4.jpg')}}" style="width: 450px; height:550px;"/>	
                                                <figcaption>
                                                    <h4>4 DOGS - PIZZA</h4>
                                                    <p>Thực đơn của 4 DOGS dành cho những tín đồ pizza với nhiều loại pizza tuyệt ngon và nổi tiếng với giới trẻ. Các bạn hãy tham khảo rồi chọn đặt một món thật ngon cho mình nhé!</p>																
                                                </figcaption>
                                            </figure>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="feature-grids">
                                        <div class="content-grid l-grids">
                                            <figure class="effect-bubba" style="width: 450px; height:550px;">
                                                <img src="{{asset('images/menu/menu2.jpg')}}" style="width: 450px; height:550px;"/>	
                                                <figcaption>
                                                    <h4>4 DOGS - PIZZA</h4>
                                                    <p>Thực đơn của 4 DOGS dành cho những tín đồ pizza với nhiều loại pizza tuyệt ngon và nổi tiếng với giới trẻ. Các bạn hãy tham khảo rồi chọn đặt một món thật ngon cho mình nhé!</p>																
                                                </figcaption>
                                            </figure>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-grids">
                                        <div class="content-grid l-grids">
                                            <figure class="effect-bubba" style="width: 450px; height:550px;">
                                                <img src="{{asset('images/menu/menu1.jpg')}}" style="width: 450px; height:550px;"/>	
                                                <figcaption>
                                                    <h4>4 DOGS - Drink - CHOCO</h4>
                                                    <p>Thực đơn của 4 DOGS dành cho những tín đồ pizza với nhiều loại pizza tuyệt ngon và nổi tiếng với giới trẻ. Các bạn hãy tham khảo rồi chọn đặt một món thật ngon cho mình nhé!</p>																
                                                </figcaption>
                                            </figure>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="feature-grids">
                                        <div class="content-grid l-grids">
                                            <figure class="effect-bubba" style="width: 450px; height:550px;">
                                                <img src="{{asset('images/menu/menu3.jpg')}}" style="width: 450px; height:550px;"/>	
                                                <figcaption>
                                                    <h4>4 DOGS - PIZZA</h4>
                                                    <p>Thực đơn của 4 DOGS dành cho những tín đồ pizza với nhiều loại pizza tuyệt ngon và nổi tiếng với giới trẻ. Các bạn hãy tham khảo rồi chọn đặt một món thật ngon cho mình nhé!</p>																
                                                </figcaption>
                                            </figure>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-grids">
                                        <div class="content-grid l-grids">
                                            <figure class="effect-bubba" style="width: 450px; height:550px;">
                                                <img src="{{asset('images/menu/menu6.jpg')}}" style="width: 450px; height:550px;"/>	
                                                <figcaption>
                                                    <h4>4 DOGS - PIZZA</h4>
                                                    <p>Thực đơn của 4 DOGS dành cho những tín đồ pizza với nhiều loại pizza tuyệt ngon và nổi tiếng với giới trẻ. Các bạn hãy tham khảo rồi chọn đặt một món thật ngon cho mình nhé!</p>																
                                                </figcaption>
                                            </figure>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
    var comment_id = document.getElementById("parent_id_{{$comment->id}}");
    $('#replyForProduct' + comment_id).on("hide.bs.collapse", function(){
    $(".replyPro").html('<span class="glyphicon glyphicon-collapse-down"></span> Write Reply');
    });
    $('#replyForProduct' + comment_id).on("show.bs.collapse", function(){
    $(".replyPro").html('<span class="glyphicon glyphicon-collapse-up"></span> Close Reply');
    });
    });
</script>

<script>
    $(document).ready(function(){
    var comment_id = document.getElementById("parent_id_{{$comment->id}}");
    $('#showMoreReply_' + comment_id).on("hide.bs.collapse", function(){
    $(".showMorePro").html('<span class="glyphicon glyphicon-collapse-down"></span>View More Reply');
    });
    $('#showMoreReply_' + comment_id).on("show.bs.collapse", function(){
    $(".showMorePro").html('<span class="glyphicon glyphicon-collapse-up"></span>Hide Reply');
    });
    });
</script>
@endsection
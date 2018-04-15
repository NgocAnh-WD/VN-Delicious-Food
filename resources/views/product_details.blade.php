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
                                    <td style="width: 15%"><p>Size</p></td>
                                    <td style="width: 15%"><p>Price</p></td>
                                    <td style="width: 15%"><p>Quantity</p></td>
                                    <td style="width: 55%"><p>Action</p></td>
                                </tr>
                                <tr>
                                    <td style="width: 15%">
                                        <select id="price_size" class="form-control" name="price_size" onchange="sizeAjax({{$product_detail->id}})">
                                            @foreach($price_sizes as $price_size)
                                            <option value="{{$price_size->size}}" {{ $price_size->size == $sizes->size ? 'selected="selected"' : '' }}>
                                                {{$price_size->size}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="width: 25%">
                                        <p id="show_price">{{$sizes->price}}</p>
                                        <input type="hidden" class="hidden_price" value="{{$sizes->price}}">
                                    </td>
                                    <td style="width: 15%"><p id="show_quantity">{{$sizes->quantity}}</p></td>
                                    <td style="width: 55%">
                                        <button type="submit" class="btn btn-success price_cart" value="{{$product_detail->id}}" style="margin-top: 20px;">
                                            Thêm vào giỏ hàng
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
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
                <script type="text/javascript" src="{{asset('js/jqzoom.js')}}"></script>
                <script type="text/javascript">
                    $("#bzoom").zoom({
                    zoom_area_width: 300,
                            autoplay_interval: 3000,
                            small_thumbs: 4,
                            autoplay: false
                    });
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
<<<<<<< HEAD
                                            </div>
                                            <div class="col-md-3">
                                                <p><span class="glyphicon glyphicon-time"></span> Posted: {{$comment->created_at->diffForhumans()}}</p>
                                            </div> 
                                        </div>
                                    </div>  

                                    
                                        
                                        <div id="show_reply_{{$comment->id}}"></div>
                                        @if(count($comment->children))
                                        <details close>
                                            <summary style="color: blue;">View More Reply</summary> 
                                            @foreach($comment->children as $replyComment)
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
                                            @endforeach 
                                        </details>
                                        @endif
                                    

                                    @if(Auth::check())
=======
                                                @if(Auth::check())
>>>>>>> origin/master
                                    <details close>
                                        <summary style="color: blue;">Reply</summary>  
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
                                            <div class="col-md-3">
                                                <p><span class="glyphicon glyphicon-time"></span>{{$comment->created_at->diffForhumans()}}</p>
                                            </div> 
                                        </div>
                                    </div>                                       
                                    @if(count($comment->children))
                                    <details close>
                                        <summary style="color: blue;">View Reply Comment</summary>
                                        @foreach($comment->children as $replyComment)
                                        <div id="show_reply_{{$comment->id}}">
                                            <div class="media" style="border: 1px solid #e3e3e3; margin-top: 10px; margin-left: 50px; margin-right: 50px; background-color:  #FFF;">
                                                <div class="col-md-3">
                                                    @if($replyComment->user)                          
                                                    <img src="{{asset($replyComment->user->avata_image)}}" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%; margin: 5px;">                               
                                                    {{$replyComment->user->username}}<br>
                                                    @endif
                                                </div>
                                                <div class="col-md-6" >
                                                    {{str_limit($replyComment->content, 300)}} 
                                                </div>
                                                <div class="col-md-3">
                                                    <p><span class="glyphicon glyphicon-time"></span>{{$replyComment->created_at->diffForhumans()}}</p>
                                                </div>                                                                                
                                            </div>
                                        </div>
                                        @endforeach                           
                                    </details>
                                    @endif                                   
                                </div>
                                @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-6 col-sm-offset-5">
                                        {{ $comments->render() }}
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript" src="{{asset('js/diffForHumans.js')}}"></script>
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
@endsection
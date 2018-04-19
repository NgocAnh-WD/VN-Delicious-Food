@extends('layouts.index')
@section('container')

<div class="agile-about-top">
    <!--    <div class="container">-->
    <h2 class="tittle-w3">Giới <span>thiệu</span></h2>
    <div class="about-section">
        <div class="col-md-7 ab-left">
            <div class="grid">
                <div class="h-f">
                    <figure class="effect-jazz">
                        <img src="images/s1.jpg" alt="img25">
                        <figcaption>
                            <h4>Chất lượng <span>hàng đầu</span></h4>
                            <p>Bảo đảm an toàn vệ sinh thực phẩm, thực phẩm luôn tươi mới.</p>
                        </figcaption>			
                    </figure>

                </div>
                <div class="h-f">
                    <figure class="effect-jazz">
                        <img src="images/s2.jpg" alt="img25">
                        <figcaption>
                            <h4>Thức ăn <span>ngon</span></h4>
                            <p>Với những món ăn đầy đủ dinh dưỡng</p>
                        </figcaption>			
                    </figure>

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-5 ab-text">
            <h3 class="tittle-w3"><span>Sứ mệnh </span>của chúng tôi.</h3>
            <p>5 Pandas là website chính thức của chuỗi cửa hàng thức ăn 5PANDAS nổi tiếng. Ngoài việc cung 
                cấp các món ăn ngon của cửa hàng đến thực khách. Chúng tôi còn liên kết với các chuỗi nhà hàng nổi
                tiếng khác để đem đến cho các bạn thật nhiều món ăn ngon miệng. Chất lượng hàng đầu, giá thành hợp 
                lý và được đưa đến tận nhà một cách nhanh chóng, đảm bảo vệ sinh an toàn thực phẩm.
                <span>Bên cạnh đó chúng tôi còn chú ý đến việc xây dựng những khẩu phần ăn đầy đủ dinh dưỡng giúp cơ thể luôn có một năng lượng tràn đầy.</span></p>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--    </div>-->
</div>
<div class="count-agileits">
    <div id="particles-js"></div>

    <div class="count-grids">
        <h3 class="tittle-w3">Số liệu <span>thống kê</span></h3>
        <div class="count-bgcolor-w3ls">
            <div class="col-md-4 count-grid">
                <i class="fa fa-cutlery" aria-hidden="true"></i>
                <div class="count hvr-bounce-to-bottom">
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1052' data-delay='.5' data-increment="100">
                    </div>
                    <span></span>
                    <h5>Số lượng sản phẩm</h5>
                </div>
            </div>
            <div class="col-md-4 count-grid">
                <i class="fa fa-users" aria-hidden="true"></i>
                <div class="count hvr-bounce-to-bottom">
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='372' data-delay='.5' data-increment="100">372</div>
                    <span></span>
                    <h5>Số lượng khách truy cập</h5>
                </div>
            </div>
            <div class="col-md-4 count-grid">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <div class="count hvr-bounce-to-bottom">
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='105209' data-delay='.5' data-increment="100">105209</div>
                    <span></span>
                    <h5>Số lượng thành viên</h5>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="team">
    <div class="container">
        <h3 class="tittle-w3"><span>Đầu bếp </span>của chúng tôi</h3>
        <div class="team-row">
            <div class="col-md-3 team-grids wow fadeInUp animated" data-wow-delay=".5s">
                <h5>Duyen <span>Ngo</span></h5>
                <p>Chúng tôi tự hào khi là một thành viên và được làm việc cùng 5 Pandas</p>
                <div class="social-bnr-agileits about-agile">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>					
                    </ul>
                </div>
                <div class="team-img">
                    <img src="images/duyen.jpg" alt="">
                </div>
            </div>
            <div class="col-md-3 team-grids team-mdl wow fadeInUp animated" data-wow-delay=".5s">
                <h5>Anh <span>Nguyen</span></h5>
                <p>Tại 5 Pandas tôi đã học được rất nhiều điều với sự hỗ trợ tận tình của mọi người.</p>
                <div class="social-bnr-agileits about-agile">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>					
                    </ul>
                </div>
                <div class="team-img">
                    <img src="images/anhn.jpg" alt="">
                </div>
            </div>
            <div class="col-md-3 team-grids team-mdl1 wow fadeInUp animated" data-wow-delay=".5s">
                <h5>Thuong <span>Nguyen</span></h5>
                <p>Môi trường làm việc luôn đặt chất lượng của mỗi sản phẩm luôn được đặt lên hàng đầu.</p>
                <div class="social-bnr-agileits about-agile">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>					
                    </ul>
                </div>
                <div class="team-img">
                    <img src="images/thuong.jpg" alt="">
                </div>
            </div>
            <div class="col-md-3 team-grids wow fadeInUp animated" data-wow-delay=".5s">
                <h5>Nhi <span>Nguyen</span></h5>
                <p>Chúng tôi chân thành cảm ơn sự hỗ trợ và hướng dẫn của Mr. Thuận và Mr. Ngô.</p>
                <div class="social-bnr-agileits about-agile">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>					
                    </ul>
                </div>
                <div class="team-img">
                    <img src="images/t4.jpg" alt="">
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>	
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/numscroller-1.0.js')}}"></script>
<script src="{{asset('js/particles.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
$(document).ready(function () {
    $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
    );
});
</script>
<script src="{{asset('js/move-top.js')}}"></script>
<script src="{{asset('js/easing.js')}}"></script>
<script type="text/javascript">
jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $().UItoTop({easingType: 'easeOutQuart'});
    });
</script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script>
    $("span.menu").click(function () {
        $(".top-nav ul").slideToggle("slow", function () {
        });
    });
</script>
@endsection
@extends('layouts.index')
@section('container')
<div class="mail">
    <div class="mail-grid1">
        <div class="container" style="width: 1270px;">	
            <h2 class="tittle-w3">Contact <span>Info</span></h2>
            <div class="col-md-4 mail-agileits-w3layouts">
                <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
                <div class="contact-right">

                    <p>Điện thoại</p><span>02357478528</span>
                </div>
            </div>
            <div class="col-md-4 mail-agileits-w3layouts">
                <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                <div class="contact-right">
                    <p>Email</p><a href="mailto:info@example.com">5Pandas@passerellesnumeriques.org</a>
                </div>
            </div>
            <div class="col-md-4 mail-agileits-w3layouts">
                <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                <div class="contact-right">

                    <p>Địa chỉ</p><span>99 Tô Hiến Thành, Đà Nẵng</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-7 map ">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.1103360974585!2d108.24146331471736!3d16.05976319395768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142177f2ced6d8b%3A0xeac35f2960ca74a4!2zOTkgVMO0IEhp4bq_biBUaMOgbmgsIFBoxrDhu5tjIE3hu7ksIFPGoW4gVHLDoCwgxJDDoCBO4bq1bmcsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1523962542866" width="360" height="200" frameborder="0" style="border:1px; margin-top: 5px;" allowfullscreen></iframe>
    </div>
    <div class="col-md-5">
        <iframe width="650" height="500" src="https://www.youtube.com/embed/XrD05U34Imw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <div class="clearfix"></div>
</div>
<div class="contact-btm-w3ls">
    <h3 class="tittle-w3"><span>Liên hệ với </span>chúng tôi</h3>
    <ul>
        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
    </ul>

    <div class="clearfix"></div>
</div>
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
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

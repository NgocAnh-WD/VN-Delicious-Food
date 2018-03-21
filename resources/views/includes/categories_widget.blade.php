<section  class="sky-form">
    <div class="product_right">
        <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
        <div class="tab1">
            @if($categories)
            @foreach($categories as $key => $category)
            <ul class="place">
                 
                <li class="sort">{{$category->name}}</li>
                <li class="by"><img src="images/do.png" alt=""></li>
                <div class="clearfix"> </div>
            </ul>
            <div class="single-bottom">
                @foreach ($category->child_categories AS $subcate)
                <a href="{{ url('pro_cate',$category->id) }}"><p>{{$subcate->name}}</p></a>
                @endforeach
            </div>
             @endforeach
            @endif
        </div>						  
<!--        <div class="tab2">
            <ul class="place">								
                <li class="sort">Women Ethnic Wear</li>
                <li class="by"><img src="images/do.png" alt=""></li>
                <div class="clearfix"> </div>
            </ul>
            <div class="single-bottom">						
                <a href="#"><p>Sarees & More</p></a>
                <a href="#"><p>Salwar Suits</p></a>									
            </div>
        </div>
        <div class="tab3">
            <ul class="place">								
                <li class="sort">Personal Care</li>
                <li class="by"><img src="images/do.png" alt=""></li>
                <div class="clearfix"> </div>
            </ul>
            <div class="single-bottom">						
                <a href="#"><p>Make Up</p></a>
            </div>
        </div>
        <div class="tab4">
            <ul class="place">								
                <li class="sort">Jewellery</li>
                <li class="by"><img src="images/do.png" alt=""></li>
                <div class="clearfix"> </div>
            </ul>
            <div class="single-bottom">						
                <a href="#"><p>Fashion</p></a>
                <a href="#"><p>Precious</p></a>
                <a href="#"><p>1 Gram Gold</p></a>
            </div>
        </div>
        <div class="tab5">
            <ul class="place">								
                <li class="sort">Specials</li>
                <li class="by"><img src="images/do.png" alt=""></li>
                <div class="clearfix"> </div>
            </ul>
            <div class="single-bottom">						
                <a href="#"><p>Cakes</p></a>
                <a href="#"><p>Party Items</p></a>
                <a href="#"><p></p></a>
                <a href="#"><p>Relax Chairs</p></a>
            </div>
        </div>-->

        <!--script-->
<!--                <script type="text/javascript">
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
        </script>-->
        <!-- script -->					 
</section>
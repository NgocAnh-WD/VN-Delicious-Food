<section  class="sky-form">
    <div class="product_right">
        <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
        <div class="tab1">
            @foreach($categories as $key => $category)
            <ul class="place">
                <li class="sort">{{$category->name}}</li>
                <div class="clearfix"> </div>
                <div class="single-bottom">
                    @if(count($category->children))
                    @foreach($category->children as $subcate)
                    <a href="{{ url('/category_products',$subcate->id) }}"><p>{{$subcate->name}}</p></a>
                    @endforeach
                    @endif
                </div>
            </ul>
            @endforeach
        </div>						  				 
</section>
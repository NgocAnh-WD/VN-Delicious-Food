//var name = "";
//function click_search() {
//    name = $('#key_search_button').val();
//
//}
//alert(name);
$(document).ready(function () {
    var priceFrom = "";
    var priceTo = "";
    var sizes = [];
    $('#select-price').on('change', function (e) {
        var price = $(this).val();
        var exPrice = price.split(',');
        priceFrom = exPrice[0];
        priceTo = exPrice[1];
    });

    $('.p-size').on('change', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('#_token1').val()
            }
        });
        e.preventDefault();
//        sizes = [];
//        $('name=size:checked').each(function (e) {
//
//            var size = $(this).val();
//            if (sizes.indexOf(size) === -1) {
//                sizes.push(size);
//            }
//        });
    });

//    alert(sizes);

    function searchAjax(data) {

        $.ajax({
            type: "GET",
            url: GlobleVariable.app_url+'/search-price',
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var $products =  data.product;
                var comment = "";
                for(var i = 0; i< $products.length; i++ ) {
                    var $product = $products[i];
                    
                     comment += '<a href=" url('+'/single'+','+$product.id+')'+' ">' 
                    +'<div class="product-grid love-grid">'
                        +'<div class="more-product">'+'<span> </span>'+'</div>'						
                        +'<div class="product-img b-link-stripe b-animate-go  thickbox">'
                            +'<img src="'+ $product.link_image+'" style="height:220px;"/>'
                            +'<div class="b-wrapper">'
                                +'<h4 class="b-animate b-from-left  b-delay03">'							
                                    +'<button class="btns">'+'<span class="glyphicon glyphicon-zoom-in" aria-hidden="true">'+'</span>Quick View</button>'
                                +"</h4>"
                            +"</div>"
                        +"</div>"
                    +"</div>"
                +"</a>"
                
                +'<div class="product-info simpleCart_shelfItem">'
                    +'<div class="product-info-cust prt_name" style="text-align: center;">'
                        +"<h4>"+$product.product_name+"</h4>"
                        +"<p>"+$product.name+"</p>"
                        +'<span class="item_price">'+$product.price+'VNĐ</span>'
                        +'<div id="style" style="margin-top: 10px;">'
                            +'<button class="col-lg-5 col-md-5 col-xs-5 col-sm-5 btn btn-info cart" value="'+$product.id+'">Add to cart</button>'
                            +'<div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">'+'</div>'
                            +'<button class="col-lg-5 col-md-5 col-xs-5 col-sm-5 btn btn-info">'+'<a href="url('+'single'+','+' ['+'id'+' =>'+ $product.id+'])'+'">View detail'+'</a></button>'
                        +"</div>"
                    +"</div>"
                +"</div>"
                                      ;
                      
                  };
                  
                  $('#product-container').html(comment);
                  
                  
                }
                
                
                //$products.each(function ($product) {
                     
               
        
        
        
                
           // }
        });
    }

    $('#search-product').click(function () {
        var url_string = window.location.href; //window.location.href
        var url = new URL(url_string);
        var c = url.searchParams.get("key_search");
        sizes = [];
        $('.p-size:checked').each(function (e) {

            var size = $(this).val();
//            if (sizes.indexOf(size) === -1) {
            sizes.push(size);
//            }
        });
        // alert(sizes);
        var data = {
            priceFrom: priceFrom,
            priceTo: priceTo,
            sizes: sizes,
            name: c,
        };
        searchAjax(data);
        alert(JSON.stringify(data));

    });

//    $('#key_search').click(function () {
//        searchAjax(data);
////        alert($('#search').val()+ $('#key_search').val());
//        alert($('#key_search_button').val());
//    });

});
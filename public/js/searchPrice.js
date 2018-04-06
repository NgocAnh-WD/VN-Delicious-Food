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
//        var data = {
//            priceFrom: $('#select-price').val(),
//            priceTo: $('#select-price').val(),
//            size: $('[name=size]').val(),
//        }
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
    
    alert(sizes);
    
    function searchAjax(data) {
     
        $.ajax({
            type: "GET",
            url: "search-price",
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
               
                //$("#tenID").html(data.tenID);
            }
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

    $('#key_search').click(function () {
        searchAjax(data);
//        alert($('#search').val()+ $('#key_search').val());
        alert($('#key_search_button').val());
    });

});
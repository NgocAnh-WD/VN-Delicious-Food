$(document).on('click', '.cart', function () {
    var product_id = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        type: "get",
        url: getSitePublicUrl() + '/addtocart/' + product_id,
        dataType: "json",
        data: {id: product_id},
        success: function (data) {
            $('.badge').html(data['quantyti']);
        }
    })

});
$(document).on('click', '.closecart', function () {
    var product_id = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        type: "get",
        url: getSitePublicUrl() + '/product/delete/' + product_id,
        dataType: "json",
        data: {id: product_id},
        success: function (data) { // What to do if we succeed
            var temp = '#cart-header' + product_id;
            $(temp).html(data.html);
            $('.badge').html(data.quantity);
            $('.count_cart').html(data.quantity);
            $('.totalprice').html(data.totalprice);
            $('.totaltong').html(data.totaltong);
            $('.shipping').html(data.shipping);
        },

    })
});
$(document).on('click', '.plus', function () {
    var product_id = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        type: "get",
        url: getSitePublicUrl() + '/addtocart/' + product_id,
        dataType: "json",
        data: {id: product_id},
        success: function (data) { // What to do if we succeed
            var plus = '#quantity' + product_id;
            var price = '#price_update' + product_id;
            $(plus).html(data.qty);
            $(price).html(data.price);

            $('.badge').html(data.quantyti);
            $('.count_cart').html(data.quantyti);
            $('.totalprice').html(data.totalprice);
            $('.totaltong').html(data.totaltong);
            $('.shipping').html(data.shipping);
        },

    })
});
const $buttons = $("button[id*='button_']");

//On click
$buttons.click(function () {
    $(this).prop('disabled', true); //disable
});
$(document).on('click', '.subtract', function () {
    var product_id = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        type: "get",
        url: getSitePublicUrl() + '/product/deductbyone/' + product_id,
        dataType: "json",
        data: {id: product_id},
        success: function (data) { // What to do if we succeed
            var plus = '#quantity' + product_id;
            var price = '#price_update' + product_id;
            $(plus).html(data.qty);
            $(price).html(data.price);
//                
            $('.badge').html(data.quantyti);
            $('.count_cart').html(data.quantyti);
            $('.totalprice').html(data.totalprice);
            $('.totaltong').html(data.totaltong);
            $('.shipping').html(data.shipping);
        },
//
    })
    var plus = '#quantity' + product_id;
    var temp = parseInt($(plus).text());
    if (temp <= 2) {
        $('.subtract').on('click', function () {
            $(this).prop("disabled", true);
        });
    }
});

function getSitePublicUrl() {
    var url = '';
    var url = 'http://' + window.location.host + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/'));
    return url;
}
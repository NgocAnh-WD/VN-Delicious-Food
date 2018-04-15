function number_format(number, decimals, decPoint, thousandsSep) {
    decimals = decimals || 0;
    number = parseFloat(number);

    if (!decPoint || !thousandsSep) {
        decPoint = '.';
        thousandsSep = ',';
    }

    var roundedNumber = Math.round(Math.abs(number) * ('1e' + decimals)) + '';
    var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
    var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
    var formattedNumber = "";

    while (numbersString.length > 3) {
        formattedNumber += thousandsSep + numbersString.slice(-3)
        numbersString = numbersString.slice(0, -3);
    }

    return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
}

function deleteImages(id_imge) {
    var image = 'image_delete' + id_imge;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        type: "post",
        url: GlobleVariable.app_url + '/edit/' + id_imge,
        dataType: "json",
        data: {id: id_imge},
        success: function (data) {
            var $images = data.images;
            var show_image = "";
            for (var i = 0; i < $images.length; i++) {
                var $image = $images[i];

                show_image += '<div class="col-md-3">'
                        + '<div class="form-group" style="width: 200px">'
                        + '<input type="hidden" id="image_id" value="' + $image.id + '">'
                        + '<input type="hidden" id="product_id" value="' + $image.product_id + '">'
                        + '<input type="hidden" name="_method" value="delete">'
                        + '<img style="width: 300px; height: 250px" src="' + GlobleVariable.app_url + '/' + $image.link_image + '" height="300" class="img-responsive img-rounded">'
                        + '<div class="space-4"></div>'
                        + '<button type="button" class="btn btn-success" id="image_delete' + $image.id + '" value="' + $image.id + '" onclick="deleteImages(' + $image.id + ')">Delete</button>'
                        + '</div>'
                        + '</div>'
                        ;
            }
            ;
            $('#show_image_delete').html(show_image);
        }
    })
}
function sizeAjax(id_product) {
    var value = $('#price_size').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        type: "get",
        url: GlobleVariable.app_url + '/getsize/',
        dataType: "json",
        data: {id: id_product, size: value},
        success: function (data) {
            $('#show_price').html(data.size.price);
            $('#show_quantity').html(data.size.quantity);
            $('#hidden_price').html(data.size.price);
        }
    })
}

$(document).on('click', '.price_cart', function () {
    var product_id = $(this).val();
    var quantity = '#quantity1';
    quantity = parseInt($(quantity).text());
    var price = $('#show_price').text();
    price = parseFloat(price);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        type: "get",
        url: GlobleVariable.app_url + '/addtocart',
        dataType: "json",
        data: {id: product_id, price: price,quantity: quantity},
        success: function (data) {
            $('.badge').html(data['quantyti']);
        }
    })

});
$(document).on('click', '.cart', function () {
    var product_id = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        type: "get",
        url: GlobleVariable.app_url + '/addtocart/' + product_id,
        dataType: "json",
        data: {id: product_id},
        success: function (data) {
            $('.badge').html(data['quantyti']);
        }
    })

});
$(document).on('click', '.closecart', function () {
    var product_id = $(this).val();
    var answer = confirm('Bạn có muốn xóa sản phẩm này không');
    if (answer) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            type: "get",
            url: GlobleVariable.app_url + '/product/delete/' + product_id,
            dataType: "json",
            data: {id: product_id},
            success: function (data) { // What to do if we succeed
                var temp = '#cart-header' + product_id;
                $(temp).html(data.html);
                $('.badge').html(data.quantity);
                $('.count_cart').html(data.quantity);
                $('.totalprice').html(number_format(data.totalprice, 3, '.', ','));
                $('.totaltong').html(number_format(data.totaltong, 3, '.', ','));
            },
        })
    } else {

    }
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
        url: GlobleVariable.app_url + '/addtocart/' + product_id,
        dataType: "json",
        data: {id: product_id},
        success: function (data) { // What to do if we succeed
            var plus = '#quantity' + product_id;
            var price = '#price_update' + product_id;
            $(plus).html(data.qty);
            $(price).html(number_format(data.price, 3, '.', ','));
            $('.badge').html(data.quantyti);
            $('.count_cart').html(data.quantyti);
            $('.totalprice').html(number_format(data.totalprice, 3, '.', ','));
            $('.totaltong').html(number_format(data.totaltong, 3, '.', ','));
        },
    })
});
$(document).on('click', '.subtract', function () {
    var quantity = '#quantity' + $(this).val();
    quantity = parseInt($(quantity).text());
    if (quantity > 1) {
        var product_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            type: "get",
            url: GlobleVariable.app_url + '/product/deductbyone/' + product_id,
            dataType: "json",
            data: {id: product_id},
            success: function (data) { // What to do if we succeed
                var plus = '#quantity' + product_id;
                var price = '#price_update' + product_id;
                $(plus).html(data.qty);
                $(price).html(number_format(data.price, 3, '.', ','));
//                
                $('.badge').html(data.quantyti);
                $('.count_cart').html(data.quantyti);
                $('.totalprice').html(number_format(data.totalprice, 3, '.', ','));
                $('.totaltong').html(number_format(data.totaltong, 3, '.', ','));
            },
//
        })
    }
});
$(document).on('click', '.plus1', function () {
    var text = '#quantity1';
    var quantity = parseInt($(text).text());
    quantity++;
    $(text).html(quantity);
});
$(document).on('click', '.subtract1', function () {
    var text = '#quantity1';
    var quantity = parseInt($(text).text());
    if(quantity>1){
        quantity--;
    $(text).html(quantity);
    }    
});
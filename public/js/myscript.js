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
        data: {id: product_id}

    })
    .done(function(data) {
     //var ob = JSON.parse(JSON.strigify)
     $('.badge').html(data['quantyti']);
  });

});
function close_cart(id) {
    var url = getSitePublicUrl() + '/product/delete' + '/' + id;
    var check = confirm('Bạn chắc chắn muốn xóa sản phẩm này chứ');
    if (check == 1) {
        window.location.href = url;
    } else {

    }
}
function pluscart(id, quantity) {
    var url = getSitePublicUrl() + '/addtocart' + '/' + id;
    window.location.href = url;
}
function subtractcart(id, quantity) {
    var qty = quantity;
    if (qty > 1) {
        var url = getSitePublicUrl() + '/product/deductbyone' + '/' + id;
        window.location.href = url;
    } else {
        close_cart(id);
    }
}

function getSitePublicUrl() {
    var url = '';
    var url = 'http://' + window.location.host + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/'));
    return url;
}
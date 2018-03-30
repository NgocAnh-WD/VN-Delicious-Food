function close_cart(id) {
    var url = 'http://localhost/php_laravel_project/public/product/delete' + '/' + id;
    var check = confirm('Bạn chắc chắn muốn xóa sản phẩm này chứ');
    if (check == 1) {
        window.location.href = url;
    } else {

    }
}
function pluscart(id, quantity) {
    var url = 'http://localhost/php_laravel_project/public/addtocart' + '/' + id;
    window.location.href = url;
}
function subtractcart(id, quantity) {
    var qty = quantity;
    if (qty > 1) {
        var url = 'http://localhost/php_laravel_project/public/product/deductbyone' + '/' + id;
        window.location.href = url;
    } else {
        close_cart(id);
    }
}



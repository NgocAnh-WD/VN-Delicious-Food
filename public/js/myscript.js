function close_cart(id) {
    var url = getSitePublicUrl()+'/product/delete' + '/' + id;
    var check = confirm('Bạn chắc chắn muốn xóa sản phẩm này chứ');
    if (check == 1) {
        window.location.href = url;
    } else {

    }
}
function pluscart(id, quantity) {
    var url =getSitePublicUrl()+'/addtocart' + '/' + id;
    window.location.href = url;
}
function subtractcart(id, quantity) {
    var qty = quantity;
    if (qty > 1) {
        var url =getSitePublicUrl()+'/product/deductbyone' + '/' + id;
        window.location.href = url;
    } else {
        close_cart(id);
    }
}

function getSitePublicUrl(){
    var url = '';
    var url ='http://'+window.location.host +  window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/')); 
    return url;
}

//display modal form for product editing
//$(document).on('click', '.open_modal', function () {
//    var product_id = $(this).val();
//
//    $.get('http://localhost/php_laravel_blog/public/productajaxCRUD' + '/' + product_id, function (data) {
//        //success data
//        console.log(data);
//        $('#product_id').val(data.id);
//        $('#name').val(data.name);
//        $('#details').val(data.details);
//        $('#btn-save').val("update");
//        $('#myModal').modal('show');
//    })
//});
////display modal form for creating new product
//$('#btn_add').click(function () {
//    $('#btn-save').val("add");
//    $('#frmProducts').trigger("reset");
//    $('#myModal').modal('show');
//});
////delete product and remove it from list
//$(document).on('click', '.delete-product', function () {
//    var product_id = $(this).val();
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//        }
//    })
//    $.ajax({
//        type: "DELETE",
//        url: 'http://localhost/php_laravel_blog/public/productajaxCRUD' + '/' + product_id,
//        success: function (data) {
//            console.log(data);
//            $("#product" + product_id).remove();
//        },
//        error: function (data) {
//            console.log('Error:', data);
//        }
//    });
//});
////create new product / update existing product
//$("#btn-save").click(function (e) {
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//        }
//    })
//    e.preventDefault();
//    var formData = {
//        name: $('#name').val(),
//        details: $('#details').val(),
//    }
//    //used to determine the http verb to use [add=POST], [update=PUT]
//    var state = $('#btn-save').val();
//    var type = "POST"; //for creating new resource
//    var product_id = $('#product_id').val();
//    ;
//    var my_url = 'http://localhost/php_laravel_blog/public/productajaxCRUD';
//    if (state == "update") {
//        type = "PUT"; //for updating existing resource
//        my_url += '/' + product_id;
//    }
//    console.log(formData);
//    $.ajax({
//        type: type,
//        url: my_url,
//        data: formData,
//        dataType: 'json',
//        success: function (data) {
//            console.log(data);
//            var product = '<tr id="product' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.details + '</td>';
//            product += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
//            product += ' <button class="btn btn-danger btn-delete delete-product" value="' + data.id + '">Delete</button></td></tr>';
//            if (state == "add") { //if user added a new record
//                $('#products-list').append(product);
//            } else { //if user updated an existing record
//                $("#product" + product_id).replaceWith(product);
//            }
//            $('#frmProducts').trigger("reset");
//            $('#myModal').modal('hide')
//        },
//        error: function (data) {
//            console.log('Error:', data);
//        }
//    });
//});
//$(document).on('click', '#cart', function () {
//    var product_id = $(this).val();
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('#token').val()
//        }
//    })
//    $.ajax({
//        type: "get",
//        url: 'http://'+window.location.host +  window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/'))+'/addtocart/'+product_id
//});
//});
//$(document).on('click', '#cart', function () {
//    var product_id = $(this).val();
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('#token').val()
//        }
//    })
//    $.ajax({
//        type: "get",
//        url: 'http://'+window.location.host +  window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/'))+'/addtocart/'+product_id
//    });
//});
//function  pluscart(id, quantity) {
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('#token_update').val()
//        }
//    })
//    $.ajax({
//        type: "get",
//        url: 'http://'+window.location.host +  window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/'))+'/deductbyone/'+id
//    });
//    alert('sdfsdf');
//};
//function pluscart(id, quantity) {
//    var url =getSitePublicUrl()+'/addtocart' + '/' + id;
//    window.location.href = url;
//}

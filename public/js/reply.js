$("#reply").click(function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#token_reply').val()
        }
    });

    var dataReply = {
        content: $('#reply_content').val(),
        product_id: $('#pro_id').val(),
        parent_id: $('#parent_id').val()
    }

    console.log(dataReply);
    $.ajax({
        type: "POST",
        url: 'reply_product',
        data: dataReply,
        dataType: 'json',
        success: function (data) {
            alert('Thank for reply!!');
            console.log(data);

            var reply = '<div class="media" style="border: 1px solid #e3e3e3; margin-top: 10px; margin-left: 50px; margin-right: 50px;">'
                    +'<div class="col-md-3">'+'<img src="http://localhost/php_project_laravel/public/'
                    +$('#avata_image1').attr("value")+'" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">'
                    +$('#username1').attr("value")+'<br>'+'</div>'+'<div class="col-md-7">'+data.content+'</div>'+'<div class="col-md-3">'+'<p>'
                    +'<span class="glyphicon glyphicon-time">'+'</span>'+'Posted:'+data.created_at +'</p>'+ '</div>'+'</div>'+'</div>'+'</div>';
            $('#show_reply').append(reply);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});
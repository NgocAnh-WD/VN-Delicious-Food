$("#comment-btn").click(function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#_token1').val()
        }
    });
    var formData = {
        title: $('#title').val(),
        content: $('#content').val(),
        product_id: $('#product_id').val()
    }

    console.log(formData);
    $.ajax({
        type: "POST",
        url: 'comment_product2',
        data: formData,
        dataType: 'json',
        success: function (data) {
            alert('Thank for feedback!!');
            console.log(data);

            var comment = '<div class="well">'+'<div class="media">' + '<div class="col-md-2">' +  '<img src="http://localhost/group_food/public/'
                    +$('#avata_image').attr("value")+'" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">'
                    +$('#username').attr("value")+'<br>'+'</div>'+'<div class="col-md-7">'+'<h4 class="media-heading">'
                    +'<a href="http://localhost/group_food/public/single/'+data.product_id+'"style="color: black;">'+data.title+'</a>'+'</h4>'
                    +data.content+'</div>'+'<div class="col-md-3">'+'<p>'+'<span class="glyphicon glyphicon-time">'+'</span>'+'Posted:'+diffForHumans(data.created_at)
                    +'</p>'+ '</div>'+'</div>'+'</div>'+'</div>';
            $('#show_comment').append(comment);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});








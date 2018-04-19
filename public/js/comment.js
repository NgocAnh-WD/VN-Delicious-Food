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
            var comment = '<div class="well">'
                    + '<div class="media">'
                    + '<div class="row">'
                    + '<div class="col-md-2">'
                    + '<img src="http://foodstore/' + $('#avata_image').attr("value") + '" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">'
                    + $('#username').attr("value") + '<br>'
                    + '</div>' + '<div class="col-md-7">' + '<h4 class="media-heading">' + data.title + '</h4>'
                    + data.content + '<br>' + '</div>' + '<div class="col-md-3">' + '<p>' + '<span class="glyphicon glyphicon-time">' + '</span>' + 'Posted:'
                    + diffForHumans(data.created_at) + '</p>' + '</div>' + '</div>' + '<div id="show_reply_' + data.id + '" style="margin-top: 35px;"></div>' + '</div>'
                    + '<div class="button">' + '<button type="button" class="replyPro btn btn-primary" data-toggle="collapse" data-target="#replyForProduct_'
                    + data.id + '">' + '<span class="glyphicon glyphicon-collapse-down"></span>' + 'Write Reply' + '</button>' + '</div>'
                    + '<div class="well collapse" id="replyForProduct_' + data.id + '">'
                    + '<form id="replyComment_' + data.id + '" name="comment" method="POST" enctype="multipart/form-data">'
                    + '<input type="hidden" id="token_reply" name="_token" value="' + $('input[name="_token"]').val() + '"/>'
                    + '<input type="hidden" id="pro_id_' + data.id + '" name="product_id" value="' + data.product_id + '">'
                    + '<input type="hidden" id="parent_id_' + data.id + '" name="parent_id" value="' + data.id + '">'
                    + '<input type="hidden" id="user_id" value="' + data.user_id + '"/>'


                    + '<div class="form-group">'
                    + '<label for="content">Content:</label>'

                    + '<textarea id="reply_content_' + data.id + '" name="content" class="form-control" rows="5" placeholder="Enter Content" required></textarea>'
                    + '<span class="text-danger"></span>'
                    + '</div>'

                    + '<div class="form-group">'
                    + '<button class="btn btn-primary reply" data-id="' + data.id + '" value="Reply">Reply</button>'
                    + '</div>'
                    + '</form>'
                    + '</div>'

                    + '</div>';
            $('#show_comment').append(comment);
            $('#title').val('');
            $('#content').val('');
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});







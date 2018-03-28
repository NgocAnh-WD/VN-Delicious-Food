$("#comment").click(function (e) {
alert('adsad');
        }
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('#_token').val()
}
})
        e.preventDefault();
        var formData = {
        title: $('#title').val(),
                content: $('#content').val(),
                product_id:$('#product_id').val()
        }

console.log(formData);
        $.ajax({
        type: type,
                url: 'comment_product',
                data: formData,
                dataType: 'json',
                success: function (data) {
                console.log(data);
                        var product = '<summary style="color: blue;">' + 'View Reply Comment' + '</summary>' + '@' + foreach($comments - > children as $replyComment)
                        + '<div class="media" style="border: 1px solid #e3e3e3; margin-top: 10px; margin-left: 50px; margin-right: 50px;">'
                        + '<div class="col-md-3">' + '@' + if ($replyComment - > user) + '<img src="' + {{asset($replyComment - > user - > avata_image)}}
                + '" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%; margin: 5px;">' +
                {{$replyComment - > user - > username}} + '<br>' + '@' + endif + '</div>' + '<div class="col-md-6">' + {{str_limit($replyComment - > content, 300)}}
                + '</div>' + '<div class="col-md-2">' + '<p><span class="glyphicon glyphicon-time"></span>' + 'Posted:' + {{$replyComment - > created_at}}
                + '</p>' + '</div>' + '</div>';
        
                error: function (data) {
                console.log('Error:', data);
                }
        });
//    $("#btn-save").click(function (e) {
//       
//   $.ajaxSetup({
//       headers: {
//           //  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//           'X-CSRF-TOKEN': $('#token').val()
//       }
//   })
//   e.preventDefault();
//
//   //used to determine the http verb to use [add=POST], [update=PUT]
//  



//   console.log(formData);
//  alert("Thank you for you ");
//   $.ajax({
//       type: "POST",
//       url: "comment_product",
//       data: { title: $('#title').val(),
//             content: $('#content').val(),
//             product_id:$('#btn-save').val()},
//       
//       dataType: 'json',
//       success: function (data) {
//
//alert("Thank you for you ");
//           console.log(data);s
//           var product =
//                   ' <table class="table">'
//                   + '     <thead>' + ' <tr class="info">'
//                   + ' <th>' + 'You:' + '</th>'
//                   + ' <th>' + data.content + '</th>'
//                   + '<th>' + data.created_at + '</th>';
//           +'  </t                                                                                                                                                                                                                                                                                                                                       r>'
//                   + '  </thead>'
//                   + ' </table>';
//           $('#frmProducts').append(product);
//         
//
//       },
//       error: function (data) {
//           console.log('Error:', data);
//       }
//   });
});

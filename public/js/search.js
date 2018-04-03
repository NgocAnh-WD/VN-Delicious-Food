
$(document).ready(function () {

    var categories = [];

    // Listen for 'change' event, so this triggers when the user clicks on the checkboxes labels
    $('input[name="price[]"]').on('change', function (e) {

        e.preventDefault();
        categories  = []; // reset 

        $('input[name="price[]"]:checked').each(function()
        {
            categories.push($(this).val());
        });

        $.post('/searchprice', {price: price}, function(markup)
        {
            $('#search-results').html(markup);
        });            

    });

});
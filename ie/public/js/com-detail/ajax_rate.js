jQuery(function ($) {

    $("div#commercial-view").ready( function () {
        let id = $('i#rac').text();

        $.ajax({
            url: 'rate_increment',
            type: 'post',
            dataType: 'json',
            data: {
                id : id
            },
            success: function (response) {
            },
            error: function () {

            }
        });
    });

});
jQuery(function ($) {
    $(document).on('change', '#com-form-cat', function ($event) {
        let $this = $(this);
        $.ajax({
            url: 'commercial_cat_ajax',
            type: 'post',
            dataType: 'json',
            data: {
                cat_id: $this.val()
            },
            success: function (response) {
                if (response.success === true) {
                    $("#com-form-subcat").html(response.result);
                }else{
                    $("#com-form-subcat").html("<option value='0'>انتخاب کنید</option>");
                }
            },
            error: function () {

            }
        });
    });
});
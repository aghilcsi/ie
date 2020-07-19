jQuery(function ($) {
    $("#del-commercial").on('click', function () {
        $("#del-alert").slideToggle(300);
    });
    $("#del-alert-n").on('click', function () {
        $("#del-alert").slideUp(300);
    });
});
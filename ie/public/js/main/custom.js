jQuery(function ($) {
    $("#search-commercials").on('click', function (event) {
        $("div.filter-container").slideToggle(500);
    });
    $("#filter-date").persianDatepicker();
    $("div.com-item-container").hover(function () {
        $this = $(this);
        $this.addClass("com-item-container-hover");
    }, function () {
        $this = $(this);
        $this.removeClass('com-item-container-hover');
    });
});
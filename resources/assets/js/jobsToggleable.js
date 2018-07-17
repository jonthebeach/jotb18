module.exports = $(window).on("load", function () {
    // Jobs toggleable
    $(".toggleable li header").click(function () {
        $(this)
            .siblings("div")
            .slideToggle("blind");
        $(this)
            .parent("li")
            .toggleClass("open");
    });
});
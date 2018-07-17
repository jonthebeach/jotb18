const desktopWidth = 992;

module.exports = $(window).on("load", function () {
    /** Nav menu elements with children. Click on the caret */
    $("ul.navbar-nav li.children a .caret").click(function (e) {
        if (window.innerWidth < desktopWidth) {
            e.preventDefault();
            $(this)
                .parent("a")
                .siblings("ul")
                .toggle();
            $(this)
                .parent("a")
                .parent("li")
                .toggleClass("open");
        }
    });
});
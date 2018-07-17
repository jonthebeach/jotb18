module.exports = $(window).on("load", function () {
    // Tickets tailor
    const tailor = ".ticket-tailor";
    const container = ".tickets-container";
    $(tailor).hide();
    $(container + " .disabled").click(function (e) {
        e.preventDefault();
    });

    $(container + " .iframe").click(function (e) {
        e.preventDefault();
        $(container).hide();
        $(tailor).show();
        $(window).scrollTop(0);
    });

    // If the url comes with a "buy", I open the iframe
    var parseQueryString = function () {
        var str = window.location.search;
        var objURL = {};

        str.replace(new RegExp("([^?=&]+)(=([^&]*))?", "g"), function (
            $0,
            $1,
            $2,
            $3
        ) {
            objURL[$1] = $3;
        });
        return objURL;
    };
    var params = parseQueryString();
    if (params.hasOwnProperty("buy")) {
        $(container + " .iframe").click();
    }
});
const $ = require("jquery");
require("fancybox")($);
require("fancybox/dist/css/jquery.fancybox.css");
require('jquery-ui/ui/widgets/tabs');

module.exports = $(window).on("load", function () {
    // General fancybox for speakers
    const fancybox = (elements) => elements.each(function () {
        const locationArray = window.location.pathname.split("/");

        $(".fancybox").each(function () {
            const locationArray = window.location.pathname.split("/");
            $(this).fancybox({
                wrapCSS: 'speakers',
                overlayOpacity: 1,
                openEffect: "none",
                closeEffect: "none",
                helpers: {
                    overlay: {
                        locked: false
                    }
                },
                afterShow: function () {
                    scrollTop = $(window).scrollTop();
                    $(window).scrollTop(0);
                    if (locationArray[1] === "speakers") {
                        window.history.pushState(
                            null,
                            "Speaker",
                            "/speakers/" +
                            $(this).data("id") +
                            "/" +
                            $(this).data("name")
                        );
                        $(window).scrollTop(0);
                    }
                }.bind(this),
                afterClose: function () {
                    $(window).scrollTop(scrollTop);
                    if (locationArray[1] === "speakers") {
                        window.history.pushState(null, "Speaker", "/speakers");
                    }
                }
            });
        });
    });
    fancybox($(".fancybox"));

    // To dynamically load the schedule
    currentMoment = new Date()
    currentDay = currentMoment.getDate();
    $("#schedule").tabs({
        active: (currentDay === 24 ? 2 : 3),
        beforeLoad: function (event, ui) {
            if (ui.tab.data("loaded")) {
                event.preventDefault();
                return;
            }

            ui.jqXHR.done(function () {
                ui.tab.data("loaded", true);
            });
            ui.jqXHR.fail(function () {
                ui.panel.html(
                    "Couldn't load Data. Please Reload Page or Try Again Later.");
            });
        },
        load: function (event, ui) {
            fancybox($(ui.panel).find('.fancybox'));
        }
    });

    // Speakers detail. When the url comes with the id of the speaker
    const locationArray = window.location.pathname.split("/");
    if (locationArray[1] === "speakers") {
        if (2 in locationArray) {
            $("a.fancybox.speaker-img-" + locationArray[2]).click();
        }
    }

    $("#schedule ul li").click(function () {
        $("html, body").scrollTop(0)
    })
});
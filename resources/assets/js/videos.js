const $ = require("jquery");
require('jquery-ui/ui/widgets/tabs');
require("fancybox")($);
const LazyLoad = require('lazyload');

module.exports = $(window).on("load", function () {
    function addImgClickListener(elements) {
        $(elements).each(function () {
            $(this).click(function () {
                const image = $(this).children('img');
                const dataUrl = $(image).data('src');
                $(this).removeClass('not-loaded');
                $(image).hide().next().show().attr('src', dataUrl);
            })
        })
    }

    $("#videos").tabs({
        active: 0,
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
            addImgClickListener($('.frame-container'));
        }
    });
});
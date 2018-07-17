const $ = require("jquery");
require('jquery-ui/ui/widgets/tabs');
require("fancybox")($);
const parseQueryString = require('./parseQueryString');

module.exports = $(window).on("load", function () {
    var urlQueryParams;
    var pictureParam;
    var paramsTab;

    function updateParams() {
        urlQueryParams = parseQueryString();
        pictureParam = urlQueryParams.hasOwnProperty("picture") ? urlQueryParams.picture.slice(0, -1) : null;
        // Last item of string is the tab number
        paramsTab = urlQueryParams.hasOwnProperty("picture") ? urlQueryParams.picture.slice(-1) : 0;
    }
    updateParams();

    /* Init Fancybox */
    function initFancybox(elements, tab) {
        $(elements).fancybox({
            wrapCSS: 'images',
            scrolling: false,
            overlayOpacity: 1,
            openEffect: 'none',
            closeEffect: 'none',
            helpers: {
                overlay: {
                    locked: false
                }
            },
            beforeShow: function () {
                // Add buttons to share/download the image
                var url = location.protocol + '//' + document.domain + '/pictures?picture=' + $(this.element).attr('id') + tab;
                this.title += '<a href="http://twitter.com/intent/tweet?url=' + url + '&text=Have a look to this picture from @JOTB18" target="_blank" class="twitter-share-button social" data-count="none">Twitter</a> ';
                this.title += '<a href="http://www.facebook.com/sharer/sharer.php?u=' + url + '" target="_blank" class="share-btn facebook social">Facebook</a> ';
                this.title += '<a href="http://www.linkedin.com/shareArticle?url=' + url + '&title=Jonthebeach Pictures&summary=Have a look to this picture from @JOTB18" target="_blank" class="share-btn linkedin social">Linkedin</a> ';
                this.title += '<a href="' + this.href + '" download="Jothebeach">Download</a>';

            },
            afterShow: function () {
                this.scrollTop = $(window).scrollTop();
                $(window).scrollTop(0);

                // I set the url to be able to share the image
                window.history.pushState(
                    null,
                    "Pictures",
                    "/pictures?picture=" + $(this.element).attr('id') + tab
                );
                updateParams();
                $(window).scrollTop(0);
            },
            afterClose: function () {
                $(window).scrollTop(this.scrollTop);

                // I set the url to the default pictures url
                window.history.pushState(
                    null,
                    "Pictures",
                    "/pictures"
                );
                updateParams();
            }
        });
    }

    // Init the tabs of the different sections of the images
    $("#event-images").tabs({
        active: paramsTab ? paramsTab : 0,
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
            initFancybox($(ui.panel[0]).find('.fancybox'), $('.ui-tabs-active').index());
            if (pictureParam) {
                $(`a#${pictureParam}`).click();
            }
        }
    });
});
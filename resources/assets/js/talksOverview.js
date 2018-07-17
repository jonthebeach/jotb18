module.exports = $(window).on('load', function () {
    if ($('#talks-overview').length === 0) return;

    /** Auto scrolling module */
    (function () {
        var funciones = [];
        var momentoActual,
            timeToFind,
            searchedElement,
            currentHour,
            currrentMinute,
            urlParams = new URLSearchParams(window.location.search);

        $('#talks-overview section').each(function () {
            const scopedSection = (function (section) {
                var arrayValues = []
                $(section).children('.row').each(function () {
                    if ($(this).data('time')) {
                        arrayValues.push($(this).data('time'))
                    }
                })
                return {
                    hall: $(section).data('hall'),
                    arrayValues: arrayValues,
                    currentValue: null,
                    execute: function (dataTime) {
                        if (dataTime && this.currentValue !== dataTime) {
                            console.log(this.hall, this.currentValue, '|', this.arrayValues, )
                            this.currentValue = dataTime;
                            var searchedElement = $(section).find(`[data-time=${dataTime}]`);
                            var currentElementTop = $(section).offset().top;
                            var targetElementTop = searchedElement.offset().top;
                            var neededOffset = targetElementTop - currentElementTop;
                            if (neededOffset !== 0) {
                                $(section).animate({
                                    scrollTop: $(section).scrollTop() + neededOffset + 'px'
                                })
                            }
                        }
                    },
                    findInArray: function (timeToSearch) {
                        const result = this.arrayValues.find((element, index) => {
                            let selectedTime = null;
                            console.log(element, timeToSearch, timeToSearch <= element && (this.arrayValues[index - 1] && this.arrayValues[index - 1] <= timeToSearch))
                            if (timeToSearch <= element && this.arrayValues[index - 1] && this.arrayValues[index - 1] <= timeToSearch) {
                                selectedTime = element;
                            } else if (timeToSearch > element && !this.arrayValues[index + 1]) {
                                selectedTime = element;
                            }
                            return selectedTime;
                        })
                        return result;
                    },
                    run: function (currentTime) {
                        this.execute(this.findInArray(currentTime))
                    }
                }
            })(this)

            funciones.push(scopedSection)
        })
        funciones.pop(); // Delete the last unused element

        function autoScrolling() {
            momentoActual = new Date()
            currentHour = ("0" + momentoActual.getHours()).slice(-2);
            currrentMinute = ("0" + momentoActual.getMinutes()).slice(-2);
            timeToFind = (urlParams.get('seconds') ? (momentoActual.getSeconds() % 24) : String(currentHour) + String(currrentMinute));
            funciones.map((element) => element.run(timeToFind))
            console.log("____________________________")
        }

        setInterval(autoScrolling, (urlParams.get('seconds') ? 1000 : 60000));
        autoScrolling();
    })()

    /** Twitter */
    function updateTwitter() {
        $.ajax({
            type: 'GET',
            url: '/timeline/tweets',
            data: {
                screen_name: 'jotb2018'
            }, //show retweets
            success: function (data, textStatus, XMLHttpRequest) {
                var tmp = false;
                var results = $('#twitter-results');
                results.empty().append($("<div>" + data[0]['text'] + "</div>").hide().fadeIn(500));
            },
            error: function (req, status, error) {
                console.log('error: ' + status);
            }
        });
    }

    setInterval(updateTwitter, 300000);
    updateTwitter();

    /** Clock */
    function updateClock() {
        var currentTime = new Date();
        var currentHours = ("0" + currentTime.getHours()).slice(-2);
        var currentMinutes = ("0" + currentTime.getMinutes()).slice(-2);

        // Compose the string for display
        var currentTimeString = currentHours + ":" + currentMinutes;

        $(".clock").html(currentTimeString);
    }
    updateClock();
    setInterval(updateClock, 5000)
})
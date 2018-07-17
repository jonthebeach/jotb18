module.exports = $(window).on("load", function () {

    // Handle the newsletter focus events
    var newsletterForm = $("form.newsletter>input[type=email]");
    newsletterForm.focus(function () {
        $(this)
            .siblings("input[type=submit]")
            .show();
    });

    newsletterForm.focusout(function () {
        if ($(this).val() === "") {
            $(this)
                .siblings("input[type=submit]")
                .hide();
        }
    });

    // Handle the newsletter submit
    var sending = false;
    $("form.newsletter").submit(function (e) {
        e.preventDefault();
        $(this)
            .children(".message")
            .empty();
        if (!sending) {
            sending = true;
            $.ajax({
                context: this,
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success: function (success) {
                    sending = false;
                    if (success === "true") {
                        $(this)
                            .siblings(".message")
                            .append(
                                '<div class="success">Thanks for registering to our newsletter!</div>'
                            );
                    } else if (success === "false") {
                        $(this)
                            .siblings(".message")
                            .append(
                                '<div class="error">You were already subscribed</div>'
                            );
                    }
                    $(this).remove();
                }
            });
        }
    });
});
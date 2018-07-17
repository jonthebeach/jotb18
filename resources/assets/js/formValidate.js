var $ = require("jquery");
var jQuery = $;
var jqueryValidation = require("jquery-validation");

module.exports = $(window).on("load", function () {
    $("form.validate").each(function () {
        $(this).validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "A valid email is required"
                }
            },
            errorElement: "div"
        });
    });
});
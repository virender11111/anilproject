/**
 Core script for esfero development
 **/
var Hopajim = function () {

    var showMyErrors = function (errors) {
        $.each(errors, function (index, value) {
            $('.' + index + '_error').html(value[0]).removeClass("hide");
        });
    }

    var hideMyErrors = function () {
        $(".error-message").each(function () {
            if ($(this).html().length <= 0)
                $(this).addClass("hide");
        })
    }

    var hopajimLoginPage = function () {

        $(document).on('submit', '#UserLoginForm', (function (event, state) {
            hideMyErrors();
            $.post($(this).attr("action"), $(this).serialize(), function (response) {
                if (typeof response.errors != 'undefined') {
                    showMyErrors(response.errors);
                } else if (response.status) {
                    window.location.href = response.url;
                }
            }, "json")

            event.preventDefault();
        }));

        $(document).on('submit', '#UserRegistrationForm', (function (event, state) {
            hideMyErrors();
            $.post($(this).attr("action"), $(this).serialize(), function (response) {
                if (typeof response.errors != 'undefined') {
                    showMyErrors(response.errors);
                } else if (response.status) {
                    $('.alert-dismissible').removeClass('hide');
                    //window.location.href = response.url;
                }
            }, "json")

            event.preventDefault();

        }));
    }




//* END:CORE HANDLERS *//
    return {
        hopajimLoginPage: function () {
            hopajimLoginPage();
        },
    };
}();

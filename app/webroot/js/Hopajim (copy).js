/**
 *@Core script for Hopajim development
 *@version 1.0 
 *
 **/
var Hopajim = function () {

    var notification = function (className, message) {
        /* http://bootstrap-notify.remabledesigns.com/ */
        $.notifyDefaults({
            type: className,
            allow_dismiss: true
        });
        $.notify(message);
    }

    var init = function () {
        //Please attach events which will be usable in complete project like datepicker, birthday picker etc..
    }

    var showMyErrors = function (errors, formType) {
        hideMyErrors();
        $(formType).addClass('valid_form_error');
        //console.log(errors);
        $.each(errors, function (index, value) {

            $(formType + ' .' + index + '_error').html(value[0]).removeClass("hide");
        });
    }

    var hideMyErrors = function () {
        $(".error-message").each(function () {
            $(this).addClass("hide");
        })
    }

    var emptyMyFields = function () {
        $('input[type=text],input[type=password],textarea').val('');
    }

    var responseHandler = function (selector, message) {

        $(selector).append(message).removeClass('hide');
        $(selector).delay(5000).fadeOut();
    }

    var hopajimLoginPage = function () {
        $(document).on('submit', '#UserLoginForm', (function (event, state) {
            var formType = '#UserLoginForm';
            $('.loading-image').removeClass('hide');
            $.post($(this).attr("action"), $(this).serialize(), function (response) {

                if (typeof response.errors != 'undefined') {
                    showMyErrors(response.errors, formType);
                    $('.loading-image').addClass('hide');
                    if (response.othersErrors) {
                        $('.error_message_valid').text(response.othersErrors);
                    } else {
                        $('.error_message_valid').text('');
                    }
                    if (response.For_captcha) {
                        $('.show-captcha').removeClass('hide');
                        $('.dynamic-banner-login-01').removeClass('hide');
                        $('.dynamic-banner-login-02').addClass('hide');
                    }
                } else if (response.status) {
                    $('.loading-image').addClass('hide');
                    window.location.href = response.url;
                }
            }, "json")


            event.preventDefault();
        }));

        $(document).on('submit', '#UserRegistrationForm', (function (event, state) {
            var formType = '#UserRegistrationForm';
            $('.loading-image').removeClass('hide');
            $.post($(this).attr("action"), $(this).serialize(), function (response) {

                if (typeof response.errors != 'undefined') {
                    showMyErrors(response.errors, formType);
                    if (response.othersErrors) {
                        $('.error_message_valid_registration').text(response.othersErrors);
                    } else {
                        $('.error_message_valid_registration').text('');
                    }
                    $('.loading-image').addClass('hide');
                } else if (response.status) {
                    responseHandler('.alert-dismissible', response.success_message);
                    hideMyErrors();
                    emptyMyFields();
                    $('.loading-image').addClass('hide');
                    $('.error_message_valid_registration').text('');
                }
            }, "json")

            event.preventDefault();
        }));
    }

    var hopajimGroupPage = function () {
// wait for document to load
        $(function () {

            $('#LessonLessonAttachment').MultiFile({
//max: 2,
                max_size: 400,
                accept: 'jpg|png|gif',
                list: '#T7-list',
                onFileAppend: function (element, value, master_element) {
                    //$('.Bottom-button').html(master_element.list[0].innerHTML);
                },
                STRING: {
                    remove: '<i class="fa fa-trash"></i>',
                    //selected: 'Selecionado: $file',
                    //denied: 'Invalido arquivo de tipo $ext!',
                    //duplicate: 'Arquivo ja selecionado:\n$file!'
                }
            });
        });

        $(document).on('submit', '#LessonGroupForm', (function (event, state) {
            var formType = '#LessonGroupForm';
            var url = $(this).attr('action');
            $('.loading-image').removeClass('hide');
            event.preventDefault();
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {

                    var response = JSON.parse(response);
                    if (!response.status) {
                        $('.loading-image').addClass('hide');
                        set_errors(response.errors);
                    } else {
                        $('.loading-image').addClass('hide');
                        window.location.href = response.url;
                    }
                },
                error: function () {

                }
            });
        }));
    }

    var set_errors = function (errors) {
        $.each(errors, function (index, value) {
            var html = '<strong>' + index + '</strong> : ' + value;
            Hopajim.notification('danger', html);
        })
    }


//* END:CORE HANDLERS *//
    return {
        init: function () {

        },
        notification: function (className, message) {
            notification(className, message);
        },
        hopajimLoginPage: function () {
            hopajimLoginPage();
        },
        hopajimGroupPage: function () {
            hopajimGroupPage();
        },
    };
}();

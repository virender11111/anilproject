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
            allow_dismiss: true,
            delay: 100000
        });

        $.notifyClose();

        $.notify(message, {
//            animate: {
//                enter: 'animated bounceInDown',
//                exit: 'animated bounceOutUp'
//            },
            placement: {
                from: 'top',
                align: 'right',
            },
            position: 'fixed',
            newest_on_top: true,
            z_index: 9999,
        });
    }

    var closeNotification = function ( ) {
        $.notifyClose();
    }

    var init = function () {
        //Please attach events which will be usable in complete project like datepicker, birthday picker etc..
    }

    var showMyErrors = function (errors, formType) {
        hideMyErrors();
        $(formType).addClass('valid_form_error');
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

    var hopajimResetPage = function () {
        $(document).on('submit', '#UserResetForm', (function (event, state) {
            closeNotification();
            $.ajax({url: $(this).attr("action"), data: $(this).serialize(), dataType: "json",
                method: "POST"}).done(function (response) {
                if (!response.status) {
                    set_errors(response.errors);
                } else {
                    emptyMyFields();
                    window.location.href = response.url;
                }
            })
            event.preventDefault();
        }));

    }


    //Function combinations which are using on both login and sign up pages
    var hopajimLoginPage = function () {
        $(document).on('submit', '#UserLoginForm', (function (event, state) {
            var formType = '#UserLoginForm';
//            $('.loading-image').removeClass('hide');
            closeNotification();
            $.ajax({url: $(this).attr("action"), data: $(this).serialize(), dataType: "json",
                method: "POST"}).done(function (response) {

                if (!response.status) {
                    $('.loading-image').addClass('hide');
                    set_errors(response.errors);
                    if (response.othersErrors) {
                        set_errors({Error: response.othersErrors});
                    }
                    if (response.For_captcha) {
                        $('.show-captcha').removeClass('hide');
                        $('.dynamic-banner-login-01').removeClass('hide');
                        $('.dynamic-banner-login-02').addClass('hide');
                    }
                } else if (response.status) {
                    emptyMyFields();
                    $('.loading-image').addClass('hide');
                    window.location.href = response.url;
                }
            })
            event.preventDefault();
        }));

        $(document).on('submit', '#UserRegistrationForm', (function (event, state) {
            var formType = '#UserRegistrationForm';
            closeNotification();
//            $('.loading-image').removeClass('hide');
            $.post($(this).attr("action"), $(this).serialize(), function (response) {

                if (!response.status) {
                    set_errors(response.errors);
                    $('.loading-image').addClass('hide');
                } else {
                    emptyMyFields();
                    notification('success', response.success_message);
                    $('.loading-image').addClass('hide');
                }
            }, "json")

            event.preventDefault();
        }));


        $(document).on('click', '.forgot-Password a', (function (event, state) {
            closeNotification();
            var serializedReturn = $('#UserEmail', $("#UserLoginForm")).serialize();

            $.post(SITEURL + 'users/forgot', serializedReturn, function (response) {
                if (!response.status) {
                    set_errors(response.errors);
                } else {
                    emptyMyFields();
                    notification('success', response.message);
                }
            }, "json")
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
                        emptyMyFields();
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
        hopajimResetPage: function () {
            hopajimResetPage();
        },
        hopajimGroupPage: function () {
            hopajimGroupPage();
        },
        set_errors: function (error) {
            set_errors(error);
        },
    };
}();

/*** 
 /* CREATE COACH FUNCTIONS */
/* NOV 2015 */
/* Beera the X code */
/****/

$(document).ready(function () {
    /* --- global init / defs  --- */
    var hour_minus = $(".yearpicker .fa-minus"),
            hour_plus = $(".yearpicker .fa-plus"),
            LessonCoachExperience = $("#LessonCoachExperience"),
            LessonCoachForm = $("#LessonCoachForm"),
            Field_col = $(".Field-col"),
            duration = 0,
            first_time_call = true,
            duration_span = $(".yearpicker .year-input"); // default viewmode list/listsmall/mosaic 

    time_rows = Array();
    /* *-* init / attach events on documant.ready  *-*-* */
    /* *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

// if element class found start the app
    if ($(".Main-row2").length > 0)
    {
        startUp()
    }



// ******************************************************************************
// function : action  --> main startup 
// ******************************************************************************
    function startUp() {

        set_duration();
    }

    function set_duration() {

        if (LessonCoachExperience.val() != '' && first_time_call) {
            first_time_call = false;
            duration = LessonCoachExperience.val();
        }
        
        duration_span.html(duration);

        if (duration > 0)
            LessonCoachExperience.val(duration)
    }

    hour_minus.click(function () {
        if (duration == 0)
            return

        duration--;
        set_duration();
    })

    hour_plus.click(function () {
        if (duration >= 50)
            return

        duration++;
        set_duration();
    })

    LessonCoachForm.on("submit", function (e) {
        e.preventDefault();
        var formType = '#LessonCoachForm';
        var url = $(this).attr('action');
        $('.loading-image').removeClass('hide');
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
                    set_errors(response.errors);
                } else if (response.status) {
                    $('.loading-image').addClass('hide');
                    window.location.href = response.url;
                }
            },
            error: function () {

            }
        });
    })

    function set_errors(errors) {
        $.each(errors, function (index, value) {
            var html = '<strong>' + index + '</strong> : ' + value;
            Hopajim.notification('danger', html);
        })
    }

});
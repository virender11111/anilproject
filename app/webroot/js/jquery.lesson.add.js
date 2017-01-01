/*** 
 /* CREATE LESSON FUNCTIONS */
/* NOV 2015 */
/* Beera the X code */
/****/

$(document).ready(function () {
    /* --- global init / defs  --- */
    var daysSelector = $('.class-days div label'),
            time_picker_first = $("#datetimepicker12"),
            schedule_add_btn = $(".schedule_add_btn"),
            start_date_span = $(".Start-Dt #startDate"),
            LessonInfoForm = $("#LessonInfoForm"),
            submit_main_form = $(".submit_main_form"),
            date_picker = $('#dp4'),
            LessonScheduleDuration = $("#LessonSchedule0Duration"),
            LessonStartDate = $("#LessonStartDate"),
            LessonScheduleStartTime = $("#LessonSchedule0StartTime"),
            LessonScheduleInfoForm = $("#LessonScheduleInfoForm"),
            hour_minus = $(".hourspicker .fa-minus"),
            hour_plus = $(".hourspicker .fa-plus"),
            duration_span = $(".hourspicker .year-input"),
            start_date = $(".datepicker"),
            add_date_inputs = $(".add-dateinput-wrap"),
            duration = 1,
            minutes = 0,
            hold_duration = 0,
            final_duration = 0,
            time_picker_first_hour,
            time_picker_first_minute,
            time_picker_first_median; // default viewmode list/listsmall/mosaic 

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

        time_picker_first.datetimepicker({
            inline: true,
            format: 'LT',
            sideBySide: true,
        }).on("dp.change", function (e) {
            var date = e.date; //e.date is a moment object
            var target = $(e.target).attr('name');
            LessonScheduleStartTime.val(date.format("HH:mm:ss"))
        })

        LessonScheduleStartTime.val("00:00:00");

        //days selector
        daysSelector.click(function () {
            unset_days();
            $(this).addClass("active");
            $(this).prev("input").prop("checked", true);
        })

        $.get(SITEURL + 'lessons/get_schedules/' + lesson_id, function (data) {
            var response = $.parseJSON(data);
            if (response.status) {
                data = JSON.parse(data);
                add_time_rows(data);
            } else {
                // no need to show any error
            }
        })

        set_duration();

        date_picker.datepicker()
                .on('changeDate', function (ev) {
                    date = new Date(ev.date);

                    var day = date.getDate();
                    var monthIndex = date.getMonth();
                    var year = date.getFullYear();
                    var send_date = year + '-' + (monthIndex + 1) + '-' + day;

                    $.post(SITEURL + 'lessons/set_start_date_manually', {id: lesson_id, start_date: send_date}, function (data) {
                        if (data.status) {
                            unset_days();
                            add_time_rows(data);
                        } else {
                            Hopajim.set_errors(data.errors);
                        }
                    }, "json")
                });
    }

    submit_main_form.click(function () {
        LessonInfoForm.submit();
    })

    LessonInfoForm.submit(function (e) {
        e.preventDefault();
        $.post($(this).attr("action"), $(this).serialize(), function (data) {
            if (data.status) {
                Hopajim.notification('success', data.message);
                window.location.href = data.url;
            } else {
                Hopajim.set_errors(data.errors);
            }
        }, "json")
    })

    LessonScheduleInfoForm.submit(function (e) {
        e.preventDefault();
        $.post($(this).attr("action"), $(this).serialize(), function (data) {
            if (data.status) {
                Hopajim.notification('success', data.message);
                unset_days();
                add_time_rows(data);
            } else {
                Hopajim.set_errors(data.errors);
            }
        }, "json")
    })


    function unset_days() {
        daysSelector.each(function () {
            $(this).removeClass("active");
        })
    }

    function set_duration() {

        var myDate = new Date('',
                '',
                '',
                duration,
                minutes,
                '',
                '');
        var df = moment(myDate).format('HH:mm');
        duration_span.html(df);
        LessonScheduleDuration.val(df)
    }

    hour_minus.click(function () {
        if (duration == 1 && minutes == 0)
            return

        if (minutes == 0) {
            minutes = 45;
            duration--;
        } else {
            minutes = minutes - 15;
        }

        set_duration();
    })

    hour_plus.click(function () {
        if (duration >= 9)
            return

        if (minutes == 45) {
            minutes = 0;
            duration++;
        } else {
            minutes = minutes + 15;
        }

        set_duration();
    })

    function add_time_rows(schedule_data) {

        add_date_inputs.html('');

        $(".day_select_run:checked").prop("checked", false);
        schedule_add_btn.val("Add More");

        $.each(schedule_data.schedules.LessonSchedule, function (index, value) {
            var html = '<li class="add-date-input" what-date=' + value.day + '>\n\
                                <div class="Weekly-time-row">\n\
                                    <div class="col-md-3 col-sm-3 col-xs-3 class-day">' + value.day + '</div>\n\
                                        <div class="col-md-6 col-sm-6 col-xs-6 aligncenter class-time">' + value.start_time_format + '  -  ' + value.end_time_format + '</div>\n\
                                            <div class="col-md-3 col-sm-3 col-xs-3 text-right ">\n\
                                                <a class="delete_day" href="' + SITEURL + 'lessons/delete_schedule/' + value.id + '/' + lesson_id + '" ><i class="fa fa-trash"></i></a>\n\
                                            </div>\n\
                                </div>\n\
                            </li>';
            add_date_inputs.append(html).fadeIn("slow");
        })

        date_picker.datepicker("update", schedule_data.first_lesson_date);
        start_date_span.html(schedule_data.first_lesson_date);
        LessonStartDate.val(schedule_data.first_lesson_date);
    }

    function set_days(input) {
        switch (input) {
            case 'SUN' :
                return "Sunday";
            case 'MON' :
                return "Monday";
            case 'TUE' :
                return "Tuesday";
            case 'WED' :
                return "Wednesday";
            case 'THU' :
                return "Thursday";
            case 'FRI' :
                return "Friday";
            case 'SAT' :
                return "Saturday";
        }
    }


    function get_day_in_li(input) {

        switch (input) {
            case 'Sunday' :
                return "SUN";
            case 'Monday' :
                return "MON";
            case 'Tuesday' :
                return "TUE";
            case 'Wednesday' :
                return "WED";
            case 'Thursday' :
                return "THU";
            case 'Friday' :
                return "FRI";
            case 'Saturday' :
                return "SAT";
        }
    }

    $(document).on("click", ".delete_day", function (e) {
        e.preventDefault();
        unset_days();
        $.get($(this).attr("href"), function (data) {
            data = JSON.parse(data);
            if (data.status) {
                Hopajim.notification('success', data.message);
                add_time_rows(data);
            } else {
                Hopajim.notification('danger', data.message);
            }
        })
    })
});

function get_days_number(input) {
    switch (input) {
        case 'SUN' :
            return 0;
        case 'MON' :
            return 1;
        case 'TUE' :
            return 2;
        case 'WED' :
            return 3;
        case 'THU' :
            return 4;
        case 'FRI' :
            return 5;
        case 'SAT' :
            return 6;
    }
}

function set_day_for_class() {

    var day_for_class = '';
    $('.class-days ul li').each(function () {
        if ($(this).hasClass("active")) {
            day_for_class += get_days_number($(this).html()) + ',';
        }
    })

    $("#TutorClassDayForClass").val(day_for_class);
}


var placeSearch, autocomplete,
        time_picker_first_median,
        componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

// ******************************************************************************
// function : initAutocomplete -> to start google search / geo location
// ******************************************************************************

function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
    autocomplete.addListener('place_changed', set_lat_long);
}

// [START region_fillform]
function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }
}


//function to set lat - long of chosen city
//function will set the value in form field as well
function set_lat_long() {
    var geocoder = new google.maps.Geocoder();
    var fulladd = document.getElementById("autocomplete").value;
    geocoder.geocode({'address': fulladd}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            document.getElementById("latitude").value = results[0].geometry.location.lat();
            document.getElementById("longitude").value = results[0].geometry.location.lng();
        } else {
            console.log(status);
        }
    });
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            console.log(geolocation);
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
        });
    }
}
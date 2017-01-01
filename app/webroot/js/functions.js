
jQuery(document).ready(function () {
    try {
//    $('input[type="text"], input[type="email"], input[type="password"], input[type="tel"]').each(function () {
//        var default_value = $(this).val();
//        $(this).focus(function () {
//            if ($(this).val() == default_value)
//            {
//                $(this).val("");
//            }
//        }).blur(function () {
//            if ($(this).val().length == 0) /*Small update*/
//            {
//                $(this).val(default_value);
//            }
//        });
//    });



//header dropdown(index2.php) start
        $(".navigation-bar > ul > li > a").click(function () {
            $(this).next(".navigation-bar > ul > li ul").stop().slideToggle(200);
        });
//header dropdown(index2.php) end


//header sticky
        $(".Home-header .Header").sticky({topSpacing: 0});
        $("#Signup-modal .other-modal-link").click(function () {  //use a class, since your ID gets mangled
            $("body").addClass("modal-open222"); //add the class to the clicked element
        });
        $(".Close").click(function () {  //use a class, since your ID gets mangled
            $("body").removeClass("modal-open222"); //add the class to the clicked element
        });
        if (jQuery(window).width() < 768) {
            jQuery(".Footer-col h4").click(function () {
                jQuery(this).toggleClass("active");
                jQuery(this).next(".Footer-col .Footer-content").stop('true', 'true').slideToggle("slow");
            });
        }



        if (jQuery(window).width() > 1200) {
            $(".login-user").hover(function () {
                $(".login-user ul").stop().slideToggle(200);
            });
        }

        if (jQuery(window).width() < 1200) {
            $(".login-user").click(function () {
                $(".login-user ul").stop().slideToggle(200);
            });
        }


        var startDate = new Date(2012, 1, 20);
        var endDate = new Date(2012, 1, 3025);
        $('#dp5').datepicker()
                .on('changeDate', function (ev) {
                    if (ev.date.valueOf() < startDate.valueOf()) {
                        $('#alert').show().find('strong').text('The end date can not be less then the start date');
                    } else {
                        $('#alert').hide();
                        endDate = new Date(ev.date);
                        $('#endDate').text($('#dp5').data('date'));
                    }
                    $('#dp5').datepicker('hide');
                });
        $('#dp1').datepicker({
            format: 'mm/dd/yyyy',
            todayBtn: 'linked'
        });
//$('#datetimepicker12').datetimepicker({
//                inline: true,
//				format:'LT',				 			 				 
//                sideBySide: true
//});
    } catch (e) {
        console.log(e);
    }
});
function hdrfix() {
	var hdrheight = $('.site-header').outerHeight();
 	//$('.site-header').css('min-height', hdrheight);
  $('.top-news, .page-banner, .buzz-video-row').css('margin-top', hdrheight);
	console.log(hdrheight);
}

jQuery(window).load(function(){
		hdrfix();
});


jQuery(document).ready(function(){
	$(window).resize(function() {
		hdrfix();
	});

//hdrfix();

	$('input[type="text"], input[type="email"], input[type="password"], input[type="tel"]').each(function(){
	var default_value = $(this).val();
	$(this).focus(function() {
		if($(this).val() == default_value)
		{
			 //$(this).val("");
		}
	}).blur(function(){
		if($(this).val().length == 0) /*Small update*/
		{
			$(this).val(default_value);
		}
	});
});

//simply scroll

$("#scroller").simplyScroll({
	 speed: 10,
	 frameRate: 24,

        auto: true,
        autoMode: 'loop'
	});
//header fix


/* $(window).scroll(function () {
      if ($(this).scrollTop() > 1) {
		  $('.site-header').addClass('headerfix');
		  }
	else{$('.site-header').removeClass('headerfix');}
 });*/

//home-slider start
/*$('.home-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
	autoplay:true,
	 autoplayTimeout:3000,
	    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ],
    responsive:{
        0:{
            items:1
        },
		568:{
            items:2
        },
        768:{
            items:3
        }
    }
})*/
//home-slider end


//latest news scroll(home page)
jQuery(function(){
	jQuery("ul#ticker01").liScroll();
});
//latest news scroll(home page) end

//accordion tabs(quality-assurance.php)
$('ul.accordion-ul').accordion();


//responsive menu
$('#header-nav').slicknav();


//responsive footer toggle
if (jQuery(window).width() < 768) {
     jQuery(".footer-col h3").click(function(){
			jQuery(this).toggleClass("active");
			jQuery(this).next(".footer-col .footer-content").stop('true','true').slideToggle("slow");
		});
  }


  $('#enqFrame').load(function(){
         $("#enqFrame").contents().find('input#cvF').bind('change',function(e) {
            var value = this.value.replace(/.*(\/|\\)/, '');
      //alert(value);
        $("#enqFrame").contents().find('#file_info').val(value);
            //title_name = $(this).val();
            //$('input#edit-title').val(title_name);
         });
    });
$('#select').css('color','#919194');
    $('#select').change(function() {
       var current = $('#select').val();
       if (current != 'null') {
           $('#select').css('color','#333');
       } else {
           $('#select').css('color','#919194');
       }
    });



    $('div.support-work-col a.emd').click(function() {



         var id = $(this).attr('id');
        // var asas = 'loadFaqContent' + id;
        // //var con = $('#' + asas).text();
         //var fcon = $('#jcon'+id).html();

        // $('#'+asas).append(fcon);
        // $('#'+id).hide();
        //alert(con);
        //var ccc = $('#loadFaqContent' + id).hide();
        //alert(ccc);
    });



    $('#enquiry-modal').on('shown.bs.modal', function () {
     $('#myInput').focus();
     //$("#enqFrame").contents().find('#job_upload_id').val(id);





      setInterval( function(){
        //alert("Hello");
        var form_status = $("#enqFrame").contents().find('div').hasClass( "alert-success" );
        //alert(form_status);

        if(form_status) {

            $("#enqFrame").contents().find('#JobName').val( "" );
            $("#enqFrame").contents().find('#JobEmail').val( "" );
            $("#enqFrame").contents().find('#JobPhone').val( "" );

            //$( "#x" ).prop( "checked", false );
            $("#enqFrame").contents().find('#JobRequest').prop( "checked", false );


         } else {

         }

      }, 200);




        // $("#enqForm").submit(function() {
        //     alert( "Handler for .submit() called." );

        // });


        // var ifrm = document.getElementById('enqFrame');
        // var win = ifrm.contentWindow;
        // var doc = ifrm.contentDocument? ifrm.contentDocument: ifrm.contentWindow.document;
        // doc.getElementById('enqForm').reset();
    });


     // var ifrm = document.getElementById('enqFrame');
     //  var win = ifrm.contentWindow;
     //  var doc = ifrm.contentDocument? ifrm.contentDocument: ifrm.contentWindow.document;
     //  doc.getElementById('encForm').find('#enqSub').click(function(){
     //      alert('here');
     //  });
     //parent.location.reload()
     $('#enquiry-modal').on("hidden.bs.modal", function (e) {
      // var ifrm = document.getElementById('enqFrame');
      // var win = ifrm.contentWindow;
      // var doc = ifrm.contentDocument? ifrm.contentDocument: ifrm.contentWindow.document;
      // doc.getElementById('enqForm').reset();
      $("#enqFrame").contents().find('.error-message').remove();
      $("#enqFrame").contents().find('.alert').remove();
      $("#enqFrame").contents().find('#JobName').val( "" );
            $("#enqFrame").contents().find('#JobEmail').val( "" );
            $("#enqFrame").contents().find('#JobPhone').val( "" );
             $("#enqFrame").contents().find('#JobComments').val( "" );
             $("#enqFrame").contents().find('#file_info').val( "" );
            //$( "#x" ).prop( "checked", false );
            $("#enqFrame").contents().find('#JobRequest').prop( "checked", false );

      //document.getElementById('enqFrame').contentDocument.location.reload(true);

    });


      //alert('dd');



	  /**
 * Do the clicking stuff
 *
 */

(function() {
  var cards = document.querySelectorAll(".card.effect__hover");
  for ( var i  = 0, len = cards.length; i < len; i++ ) {
    var card = cards[i];
    clickListener( card );
  }

  function clickListener(card) {
    card.addEventListener( "click", function() {
      var c = this.classList;
      c.contains("flipped") === true ? c.remove("flipped") : c.add("flipped");
    });
  }
})();

/**
 * Do the random stuff
 *
 */

//flip stuff (testimonial)
(function() {

  // cache vars
  var cards = document.querySelectorAll(".card.effect__random");
  var timeMin = 1;
  var timeMax = 3;
  var timeouts = [];

  // loop through cards
  for ( var i = 0, len = cards.length; i < len; i++ ) {
    var card = cards[i];
    var cardID = card.getAttribute("data-id");
    var id = "timeoutID" + cardID;
    var time = randomNum( timeMin, timeMax ) * 1000;
    cardsTimeout( id, time, card );
  }

  // timeout listener
  function cardsTimeout( id, time, card ) {
    if (id in timeouts) {
      clearTimeout(timeouts[id]);
    }
    timeouts[id] = setTimeout( function() {
      var c = card.classList;
      var newTime = randomNum( timeMin, timeMax ) * 1000;
      c.contains("flipped") === true ? c.remove("flipped") : c.add("flipped");
      cardsTimeout( id, newTime, card );
    }, time );
  }

  // random number generator given min and max
  function randomNum( min, max ) {
    return Math.random() * (max - min) + min;
  }

})();

//flip stuff (testimonial) end





  });

    // $('#enquiry-modal').on('hidden.bs.modal', function () {
    //   //location.reload();
    //   $(this).find('form')[0].reset();
    // });




      //$(window.parent.document).find('#enquiry-modal').reset();


      //location.reload();
    //   var myIFrame = document.getElementById('enqFrame');
     //var content = myIFrame.contentWindow.document.body.innerHTML;
    // alert(content);

      //$("form").trigger("reset");
        //$(e.target).removeData("bs.modal").find(".modal-body").trigger("reset");
        //$(this).find("input,textarea,select").val('').end();
        //$(this).find('form')[0].reset();


$(document).ready(function() {

    $("#contact_form").submit(function(event){
        event.preventDefault();
        var name = $('#JobName').val();
        var email = $('#JobEmail').val();
        var phone = $('#JobPhone').val();
        var company_name = $('#JobCompany').val();
        var category = $('#JobJobCategoryId').val();
        var comment = $('#JobComments').val();
        var request = $('#JobRequest').val();
        var newsletter = $('#JobNewsletter').val();
        var captchaResponse = $('#g-recaptcha-response').val();
        var email_regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var phone_regex = /^[0-9- ]*$/;
        var status = true;

        if(!name) {
            $('.gen_nameError').text('This field cannot be left blank.');
            status = false;
        } else if(/^[a-zA-Z ]*$/.test(name) == false) {
            $('.gen_nameError').text('Invalid name.');
            status = false;
        } else {
            $('.gen_nameError').empty();
        }

        if(!email) {
            $('.gen_emailError').text('This field cannot be left blank.');
            status = false;
        } else if(!email_regex.test(email)) {
            $('.gen_emailError').text('Invalid email address.');
            status = false;
        } else {
            $('.gen_emailError').empty();
        }

        if(!category) {
            $('.gen_categoryError').text('Please choose a category.');
            status = false;
        } else {
            $('.gen_categoryError').empty();
        }

        if($("#JobRequest").is(":checked") && !phone) {
            $('.gen_phoneError').text('This field cannot be left blank.');
            status = false;
        } else {
            $('.gen_phoneError').empty();
        }

        if(phone != '') {
            if(!phone_regex.test(phone)) {
                $('.gen_phoneError').text('Invalid phone number.');
                status = false;
            }
        }

        if(!captchaResponse) {
            $('.gen_captchaError').text('Captcha could not be verify.');
            status = false;
        } else {
            $('.gen_captchaError').empty();
        }
        if(status) {
            //return true;
            $.ajax({url: $(this).attr("action"), data: $(this).serialize(), dataType: "json",
                method: "POST"}).done(function (response) {
                    $(".load_image").removeClass("hide");
                    if (response.status) {
                        $(".load_image").addClass("hide");
                        $(".successMessage").removeClass("hide");
                        $(".successMessage").fadeTo(6000, 6000).slideUp(500, function(){
                          $(".successMessage").slideUp(6000);
                        });
                        $(".text-danger").text('');
                        $("#contact_form")[0].reset();
                        
                    } else {
                        $(".load_image").addClass("hide");
                        $(".failureMessage").removeClass("hide");
                        $(".failureMessage").fadeTo(6000, 6000).slideUp(500, function(){
                          $(".failureMessage").slideUp(6000);
                        });
                        $(".text").text('');
                    }
                })
        } else {
            return false;
        }
    });


    $("#contact_form1").submit(function(event){
        event.preventDefault();
        var name = $('#cli_name').val();
        var email = $('#cli_email').val();
        var phone = $('#cli_phone').val();
        var company_name = $('#cli_company').val();
        var category = $('#JobJobCategoryId').val();
        var comment = $('#cli_comment').val();
        var request = $('#cli_request').val();
        var newsletter = $('#cli_newsletter').val();
        var captchaResponse = $('#g-recaptcha-response-1').val();
        var email_regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var phone_regex = /^[0-9- ]*$/;
        var status = true;

        if(!name) {
            $('.cli_nameError').text('This field cannot be left blank.');
            status = false;
        } else if(/^[a-zA-Z ]*$/.test(name) == false) {
            $('.cli_nameError').text('Invalid name.');
            status = false;
        } else {
            $('.cli_nameError').empty();
        }

        if(!email) {
            $('.cli_emailError').text('This field cannot be left blank.');
            status = false;
        } else if(!email_regex.test(email)) {
            $('.cli_emailError').text('Invalid email address.');
            status = false;
        } else {
            $('.cli_emailError').empty();
        }

        if(!category) {
            $('.cli_categoryError').text('Please choose a category.');
            status = false;
        } else {
            $('.cli_categoryError').empty();
        }

        if($("#cli_request").is(":checked") && !phone) {
            $('.cli_phoneError').text('This field cannot be left blank.');
            status = false;
        } else {
            $('.cli_phoneError').empty();
        }

        if(phone != '') {
            if(!phone_regex.test(phone)) {
                $('.cli_phoneError').text('Invalid phone number.');
                status = false;
            }
        }

        if(!captchaResponse) {
            $('.cli_captchaError').text('Captcha could not be verify.');
            status = false;
        } else {
            $('.cli_captchaError').empty();
        }
        if(status) {
            //return true;
            $.ajax({url: $(this).attr("action"), data: $(this).serialize(), dataType: "json",
                method: "POST"}).done(function (response) {
                    $(".load_image").removeClass("hide");
                    if (response.status) {
                        $(".load_image").addClass("hide");
                        $(".successMessage").removeClass("hide");
                        $(".successMessage").fadeTo(6000, 6000).slideUp(500, function(){
                          $(".successMessage").slideUp(6000);
                        });
                        $(".text-danger").text('');
                        $("#contact_form1")[0].reset();
                    } else {
                        $(".load_image").addClass("hide");
                        $(".failureMessage").removeClass("hide");
                        $(".failureMessage").fadeTo(6000, 6000).slideUp(500, function(){
                          $(".failureMessage").slideUp(6000);
                        });
                        $(".text").text('');
                    }
                })
        } else {
            return false;
        }
    });


    $("#contact_form2").submit(function(event){
        event.preventDefault();
        var name = $('#buzz_name').val();
        var email = $('#buzz_email').val();
        var phone = $('#buzz_phone').val();
        var company_name = $('#buzz_company').val();
        var category = $('#JobJobCategoryId').val();
        var comment = $('#buzz_comment').val();
        var request = $('#buzz_request').val();
        var newsletter = $('#buzz_newsletter').val();
        var captchaResponse = $('#g-recaptcha-response-2').val();
        var email_regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var phone_regex = /^[0-9- ]*$/;
        var status = true;

        if(!name) {
            $('.buz_nameError').text('This field cannot be left blank.');
            status = false;
        } else if(/^[a-zA-Z ]*$/.test(name) == false) {
            $('.buz_nameError').text('Invalid name.');
            status = false;
        } else {
            $('.buz_nameError').empty();
        }

        if(!email) {
            $('.buz_emailError').text('This field cannot be left blank.');
            status = false;
        } else if(!email_regex.test(email)) {
            $('.buz_emailError').text('Invalid email address.');
            status = false;
        } else {
            $('.buz_emailError').empty();
        }

        if(!category) {
            $('.buz_categoryError').text('Please choose a category.');
            status = false;
        } else {
            $('.buz_categoryError').empty();
        }

        if($("#buzz_request").is(":checked") && !phone) {
            $('.buz_phoneError').text('This field cannot be left blank.');
            status = false;
        } else {
            $('.buz_phoneError').empty();
        }

        if(phone != '') {
            if(!phone_regex.test(phone)) {
                $('.buz_phoneError').text('Invalid phone number.');
                status = false;
            }
        }

        if(!captchaResponse) {
            $('.buz_captchaError').text('Captcha could not be verify.');
            status = false;
        } else {
            $('.buz_captchaError').empty();
        }
        if(status) {
            //return true;
            $.ajax({url: $(this).attr("action"), data: $(this).serialize(), dataType: "json",
                method: "POST"}).done(function (response) {
                    $("#load_image").removeClass("hide");
                    if (response.status) {
                        $("#load_image").addClass("hide");
                        $(".successMessage").removeClass("hide");
                        $(".successMessage").fadeTo(6000, 6000).slideUp(500, function(){
                          $(".successMessage").slideUp(6000);
                        });
                        $(".text-danger").text('');
                        $("#contact_form2")[0].reset();
                    } else {
                        $("#load_image").addClass("hide");
                        $(".failureMessage").removeClass("hide");
                        $(".failureMessage").fadeTo(6000, 6000).slideUp(500, function(){
                          $(".failureMessage").slideUp(6000);
                        });
                        $(".text").text('');
                    }
                })
        } else {
            return false;
        }
    });


    $("#modal_enquiry_form").submit(function(event){
        var name = $('#ModalName').val();
        var email = $('#ModalEmail').val();
        var phone = $('#ModalPhone').val();
        var cv_file = $('#cvF').val();
        var category = $('#ModalCategory').val();
        var comment = $('#ModalComment').val();
        var request = $('#ModalRequest').val();
        var captchaResponse = $('#g-recaptcha-response-1').val();
        var email_regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var valid_cv_extensions = /(\.pdf|\.docx|\.doc)$/i;
        var phone_regex = /^[0-9- ]*$/;
        var status = true;

        if(!name) {
            $('.nameErrorModal').text('This field cannot be left blank.');
            status = false;
        } else if(/^[a-zA-Z ]*$/.test(name) == false) {
            $('.nameErrorModal').text('Invalid name.');
            status = false;
        } else {
            $('.nameErrorModal').empty();
        }

        if(!email) {
            $('.emailErrorModal').text('This field cannot be left blank.');
            status = false;
        } else if(!email_regex.test(email)) {
            $('.emailErrorModal').text('Invalid email address.');
            status = false;
        } else {
            $('.emailErrorModal').empty();
        }

        if(!cv_file) {
          $('.fileErrorModal').text('Please upload your cv.');
          status = false;
        } else if(!valid_cv_extensions.test(cv_file)) {
            $('.fileErrorModal').text('File should be pdf, doc or docx.');
            status = false;
        } else {
            $('.fileErrorModal').empty();
        }

        // if(cv_file != '') {
        //     if(!valid_cv_extensions.test(cv_file)) {
        //         $('.fileErrorModal').text('File should be pdf, doc or docx.');
        //         status = false;
        //     } else {
        //         $('.fileErrorModal').empty();
        //     }
        // }

        if($("#ModalRequest").is(":checked") && !phone) {
            $('.phoneErrorModal').text('This field cannot be left blank.');
            status = false;
        } else {
            $('.phoneErrorModal').empty();
        }

        if(phone != '') {
            if(!phone_regex.test(phone)) {
                $('.phoneErrorModal').text('Invalid phone number.');
                status = false;
            }
        }

        if(!captchaResponse) {
            $('.captchaErrorModal').text('Captcha could not be verify.');
            status = false;
        } else {
            $('.captchaErrorModal').empty();
        }
        if(status) {
            return true
        } else {
            return false;
        }
    });

    $('input#cvF').bind('change',function(e) {
        var value = this.value.replace(/.*(\/|\\)/, '');
        $('#file_info').val(value);
    });

    $("#front_video_img").click(function() {
      $(this).hide();
      $("#home_video")[0].src += "&autoplay=1";
    });
});

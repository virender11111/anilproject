jQuery(document).ready(function(){
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


//home-slider start
$('.home-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
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
})
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


     $(document).on("change", ".cvfile", function () {
        alert("called"); 
     })
     


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

    



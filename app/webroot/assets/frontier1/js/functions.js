jQuery(document).ready(function(){
	$('input[type="text"], input[type="email"], input[type="password"], input[type="tel"]').each(function(){    
	var default_value = $(this).val();        
	$(this).focus(function() {
		if($(this).val() == default_value)
		{
			 $(this).val("");
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
  
  
  
$('#select').css('color','#919194');
    $('#select').change(function() {
       var current = $('#select').val();
       if (current != 'null') {
           $('#select').css('color','#333');
       } else {
           $('#select').css('color','#919194');
       }
    }); 
	  
});


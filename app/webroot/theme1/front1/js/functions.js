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


//header dropdown(index2.php) start
$(".login-user").hover(function(){
    $(".login-user ul").stop().slideToggle(200);
}); 
//header dropdown(index2.php) end


//header sticky
$(".Home-header .Header").sticky({ topSpacing: 0 });
	
});
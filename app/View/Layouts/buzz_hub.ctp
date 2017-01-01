<!DOCTYPE HTML>
<html lang="en-GB">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
<meta name="description" content='<?php echo $page_details['Meta']['description']; ?>'>
<meta name="keywords" content='<?php echo $page_details['Meta']['keywords']; ?>'>
<meta name="msvalidate.01" content="C07A541A77A2B308E0F1C39DD26AC976" />
<!-- Facebook OG Tags: -->
<meta property="og:locale" content="en_GB" />
<meta property="og:type" content="http://www.frontiersupport.co.uk/" />
<meta property="og:title" content="<?php echo Inflector::humanize($page_details['Meta']['title']); ?>" />
<meta property="og:image" content="http://www.frontiersupport.co.uk/assets/frontier/img/FLOOGOO.png" />
<meta property="og:description" content="<?php echo $page_details['Meta']['description']; ?>" />
<meta property="og:url" content="<?php echo Router::url($this->here, true); ?>" />
<!-- Twitter Card: -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?php echo $page_details['Meta']['description']; ?>" />
<meta name="twitter:title" content="<?php echo Inflector::humanize($page_details['Meta']['title']); ?>" />
<meta name="twitter:image" content="http://www.frontiersupport.co.uk/assets/frontier/img/FLOOGOO.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<?php 
echo $this->Html->meta('icon');
echo $this->Html->css(array(
'/assets/frontier/css/reset.css',
'/assets/frontier/bootstrap/css/bootstrap.css',
		//'/assets/frontier/bootstrap/css/bootstrap.min.css',
'/assets/frontier/plugins/owl-carousel-2.0/assets/owl.carousel.css',
'/assets/frontier/plugins/li-scroller/li-scroller.css',
'/assets/frontier/plugins/slicknav-master/slicknav.css',
'/assets/frontier/css/style.css',
'/assets/frontier/css/responsive.css',
'/full_calendar/css/fullcalendar',
'/assets/frontier/css/logo-animation.css'
)
);


?>
<style type="text/css">
	.fc-header .fc-state-default a{ margin:0 !important}
</style>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.js"></script>
<![endif]-->
<!--head end -->
<title><?php echo Inflector::humanize($page_details['Meta']['title']); ?></title>
<link rel="canonical" href="<?php echo Router::url( $this->here, true ); ?>" />
<link rel="alternate" type="application/rss+xml" title=" &raquo; Feed" href="http://www.frontiersupport.co.uk/feed.xml" />
</head>

<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M7CWN3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M7CWN3');</script>
<!-- End Google Tag Manager -->
<div class="page-top home-page-top buzz-page-top margin-bot-30">
  <div class="site-header"> 
    <!--header-top-->
   <?php echo $this->element('frontier/header-top'); ?>
    <!--/header-top--> 
    
    <!--header -->
     <?php echo $this->element('frontier/buzz-header'); ?>
    <?php //include("includes/buzz-header.php"); ?>
    <!--/header--> 
    
  </div>
  
  <!--buzz-video -->
  <?php echo $this->element('frontier/buzz-video'); ?>
  <?php //include("includes/buzz-video.php"); ?>
  <!--/buzz-video --> 
  
</div>
<div class="container">
  <div class="row buzz-row"> 
    
    <!--buzz-video -->
    <?php //include("includes/buzz-sidebar.php"); ?>
    <?php echo $this->element('frontier/buzz-sidebar'); ?>
 <?php echo $this->fetch('content'); ?>

</div>
</div>
<!--footer start -->
<?php echo $this->element('frontier/buzz-footer'); ?>
<?php //include("includes/buzz-footer.php"); ?>
<!--footer end --> 

<!--script start -->
<!-- calendar js -->
 <script src="<?php echo $this->webroot; ?>assets/frontier/js/lib/jquery-1.11.3.min.js"></script>
 <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
  <!-- end of calendar js -->
 
 <script src="<?php echo $this->webroot; ?>assets/frontier/bootstrap/js/bootstrap.js"></script>
 <script src="<?php echo $this->webroot; ?>assets/frontier/plugins/owl-carousel-2.0/owl.carousel.js"></script>
 <script src="<?php echo $this->webroot; ?>assets/frontier/plugins/sticky/jquery.sticky.js"></script>
 <script src="<?php echo $this->webroot; ?>assets/frontier/plugins/li-scroller/jquery.li-scroller.1.0.js"></script>
 <script src="<?php echo $this->webroot; ?>assets/frontier/plugins/accordion/jquery.accordion.js"></script>
 <script src="<?php echo $this->webroot; ?>assets/frontier/plugins/slicknav-master/jquery.slicknav.js"></script>
 <script src="<?php echo $this->webroot; ?>assets/frontier/plugins/simply-scroll.js"></script>
 <script src="<?php echo $this->webroot; ?>assets/frontier/js/functions.js"></script>

 
  <?php
  // calendar js
echo $this->Html->script(array('/full_calendar/js/fullcalendar.min1', '/full_calendar/js/jquery.qtip-1.0.0-rc3.min'));
// end of calendar js
?>
<script type="text/javascript">
plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "full_calendar";
</script>
<script type="text/javascript">
//full calendar
jQuery(document).ready(function () {
	jQuery.curCSS = jQuery.css;
$('#calendar').fullCalendar({
		timeFormat: 'HH:mm',
		header: {
   		left:   'title',
   		center: '',
   		//right:  'agendaDay,agendaWeek,month prev,next'
   		right:  'prev,next'
		},
		defaultView: 'month',
		firstHour: 8,
		weekMode: 'variable',
		aspectRatio: 2,
		editable: true,
		//events: plgFcRoot + "/events/feed",
		eventRender: function(event, element) {
       	$(element).tooltip({title: event.title});
       	/*element.qtip({
				content: event.details,
				position: { 
					target: 'mouse',
					adjust: {
						x: 10,
						y: -5
					}
				},
				style: {
					name: 'light',
					tip: 'leftTop'
				}
       	});*/
   	},
	/*	eventDragStart: function(event) {
			$(this).qtip("destroy");
		},
		eventDrop: function(event) {
			var startdate = new Date(event.start);
			var startyear = startdate.getFullYear();
			var startday = startdate.getDate();
			var startmonth = startdate.getMonth()+1;
			var starthour = startdate.getHours();
			var startminute = startdate.getMinutes();
			var enddate = new Date(event.end);
			var endyear = enddate.getFullYear();
			var endday = enddate.getDate();
			var endmonth = enddate.getMonth()+1;
			var endhour = enddate.getHours();
			var endminute = enddate.getMinutes();
			if(event.allDay == true) {
				var allday = 1;
			} else {
				var allday = 0;
			}
			var url = plgFcRoot + "/events/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00&allday="+allday;
			$.post(url, function(data){});
		},*/
		/*eventResizeStart: function(event) {
			$(this).qtip("destroy");
		},
		eventResize: function(event) {
			var startdate = new Date(event.start);
			var startyear = startdate.getFullYear();
			var startday = startdate.getDate();
			var startmonth = startdate.getMonth()+1;
			var starthour = startdate.getHours();
			var startminute = startdate.getMinutes();
			var enddate = new Date(event.end);
			var endyear = enddate.getFullYear();
			var endday = enddate.getDate();
			var endmonth = enddate.getMonth()+1;
			var endhour = enddate.getHours();
			var endminute = enddate.getMinutes();
			var url = plgFcRoot + "/events/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00";
			$.post(url, function(data){});
		},
		*/
		eventClick:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.details);
            $('#start').html($.fullCalendar.formatDate(event.start, "dd MMMM yyyy  HH:mm tt"));
            $('#end').html($.fullCalendar.formatDate(event.end, "dd MMMM yyyy  HH:mm tt"));
            $('#calendarModal').modal();
        }
   });



$('#calendar1').fullCalendar({
	header: {
		left:   'title',
		center: '',
		right:  'prev,next'
	},
	defaultView: 'month',
	firstHour: 8,
	weekMode: 'variable',
	aspectRatio: 2,
	editable: true,
	//events: plgFcRoot + "/events/feed",
	eventRender: function(event, element) {
   	element.qtip({
			content: event.details,
			position: { 
				target: 'mouse',
				adjust: {
					x: 10,
					y: -5
				}
			},
			style: {
				name: 'light',
				tip: 'leftTop'
			}
   	});
	},
	/*eventDragStart: function(event) {
		$(this).qtip("destroy");
	},
	eventDrop: function(event) {
		var startdate = new Date(event.start);
		var startyear = startdate.getFullYear();
		var startday = startdate.getDate();
		var startmonth = startdate.getMonth()+1;
		var starthour = startdate.getHours();
		var startminute = startdate.getMinutes();
		var enddate = new Date(event.end);
		var endyear = enddate.getFullYear();
		var endday = enddate.getDate();
		var endmonth = enddate.getMonth()+1;
		var endhour = enddate.getHours();
		var endminute = enddate.getMinutes();
		if(event.allDay == true) {
			var allday = 1;
		} else {
			var allday = 0;
		}
		var url = plgFcRoot + "/events/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00&allday="+allday;
		$.post(url, function(data){});
	},*/
	/*eventResizeStart: function(event) {
		$(this).qtip("destroy");
	},*/
	/*eventResize: function(event) {
		var startdate = new Date(event.start);
		var startyear = startdate.getFullYear();
		var startday = startdate.getDate();
		var startmonth = startdate.getMonth()+1;
		var starthour = startdate.getHours();
		var startminute = startdate.getMinutes();
		var enddate = new Date(event.end);
		var endyear = enddate.getFullYear();
		var endday = enddate.getDate();
		var endmonth = enddate.getMonth()+1;
		var endhour = enddate.getHours();
		var endminute = enddate.getMinutes();
		var url = plgFcRoot + "/events/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00";
		$.post(url, function(data){});
	},*/
	
	eventClick:  function(event, jsEvent, view) {
		console.log(event);
        $('#modalTitle').html(event.title);
        $('#modalBody').html(event.details);
        $('#start').html($.fullCalendar.formatDate(event.start, "dd MMMM yyyy  h:sstt"));
        $('#end').html($.fullCalendar.formatDate(event.end, "dd MMMM yyyy  h:sstt"));
        $('#calendarModal').modal();
    }
});
   
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#increaseFont').click(function(){  
        //alert("inc"); return false; 
        //var size = parseInt($('body').css("font-size"));
        size = 16;
        $('body').css("font-size", size);
        //$('a').css("font-size", size);
        $('p').css("font-size", size);
        $('span').css("font-size", size);
        $('li').css("font-size", size);
        $('#fontSize').css("font-size", 16);
        $('#increaseFont').css("font-size", 16);
        $('#decreaseFont').css("font-size", 16);
        $('#dincreaseFont').css("font-size", 16);
        $('#resetFont').css("font-size", 16);
      }); 
      $('#decreaseFont').click(function(){   
        //var size = parseInt($('body').css("font-size"));
        size = 12;
        $('body').css("font-size", size);
        //$('a').css("font-size", size);
        $('p').css("font-size", size);
        $('span').css("font-size", size);
        $('li').css("font-size", size);
        $('#fontSize').css("font-size", 16);
        $('#increaseFont').css("font-size", 16);
        $('#decreaseFont').css("font-size", 16);
        $('#dincreaseFont').css("font-size", 16);
        $('#resetFont').css("font-size", 16);
      });
      $('#dincreaseFont').click(function(){   
        //var size = parseInt($('body').css("font-size"));
        size = 18;
        $('body').css("font-size", size);
        //$('a').css("font-size", size);
        $('p').css("font-size", size);
        $('span').css("font-size", size);
        $('li').css("font-size", size);
        $('#fontSize').css("font-size", 16);
        $('#increaseFont').css("font-size", 16);
        $('#decreaseFont').css("font-size", 16);
        $('#dincreaseFont').css("font-size", 16);
        $('#resetFont').css("font-size", 16);
      });
      $('#resetFont').click(function(){   
         location.reload();
      });
    });

    

 </script>
<?php //echo $this->element('frontier/script'); ?>
<?php //include("includes/script.php"); ?>
<!--script end -->
 <?php echo $this->fetch('footer_js'); ?>

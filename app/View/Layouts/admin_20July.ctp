<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo Configure::read('Site.title') . ' | ' . $title_for_layout; ?>
        </title>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array(
            '/assets/global/plugins/font-awesome/css/font-awesome.min.css',
            '/assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
            '/assets/global/plugins/bootstrap/css/bootstrap.min.css',
            '/assets/global/plugins/uniform/css/uniform.default.css',
            '/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
            '/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
            '/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css',
            '/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
            '../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
            '/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
            '/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',
            '/assets/global/css/components.css',
            '/assets/global/css/plugins.css',
            '/assets/admin/layout/css/layout.css',
            '/assets/admin/layout/css/custom.css',
            '/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min',
            '/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css',
            '/assets/admin/pages/css/image-crop.css',
        		'/css/sumoselect.css',
        		'/full_calendar/css/fullcalendar'
                )
        );
        ?>

        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo $this->webroot; ?>assets/global/plugins/icheck/skins/all.css" rel="stylesheet"/>
        <link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet"/>
        <link href="<?php echo $this->webroot; ?>assets/global/plugins/select2/select2.css" rel="stylesheet"/>
        <link href="<?php echo $this->webroot; ?>assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <link href="<?php echo $this->webroot; ?>assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
        <style>
            .col-md-8 .icheckbox_minimal-grey {
                margin-top: 10px;
            }
            div.page-bar ul.page-breadcrumb li.last { font-size: 14px; }
.job_category_class{width:216px;}
        </style>

        <script>
            var currentURL = '<?php echo $this->here; ?>';
            var webroot = '<?php echo $this->webroot; ?>';
            var SITEURL = '<?php echo SITEURL; ?>';

        </script>
    </head>

    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-fixed ">
        <!-- BEGIN HEADER -->
        <?php echo $this->element('admin/header'); ?>
        <!-- END HEADER -->

        <div class="clearfix"> </div>

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php echo $this->element('admin/left'); ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->


            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!--                    <h3 class="page-title">
                    <?php //echo $title_for_layout;   ?>
                                        </h3>-->
                    <div class="page-bar">
                        <?php
                        echo $this->Html->getCrumbList(array('class' => 'page-breadcrumb', 'separator' => ' <i class="fa fa-angle-right"></i> '), array(
                            'text' => '<i class="icon-home"></i>Dashboard ',
                            //'text' => 'Dashboard ',
                            'url' => Router::url('/', true) . 'admin/dashboard',
                            'escape' => false
                        ));
                        ?>
                    </div>

                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <?php echo $this->Session->flash('admin'); ?>
                    <?php echo $this->fetch('content'); ?>

                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTAINER -->

            <!-- BEGIN FOOTER -->
            <?php //echo $this->element('admin/footer');  ?>


            <!-- END FOOTER -->
            <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
            <!-- BEGIN CORE PLUGINS -->
            <!--[if lt IE 9]>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/respond.min.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/excanvas.min.js"></script>
            <![endif]-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
            <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
            
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
           
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/flot/jquery.flot.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/flot/jquery.flot.categories.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/select2/select2.min.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>


            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/jcrop/js/jquery.color.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/jcrop/js/jquery.Jcrop.min.js"></script>

            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="<?php echo $this->webroot; ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/ecommerce-index.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/form-icheck.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/icheck/icheck.min.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/scripts/datatable.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/ecommerce-products.js"></script>
            <script src="<?php echo $this->webroot; ?>js/tinymce/tinymce.min.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/components-form-tools.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/index.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/components-pickers.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/components-dropdowns.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/components-jqueryui-sliders.js"></script>


            <script src="<?php echo $this->webroot; ?>assets/global/plugins/jcrop/js/jquery.color.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/global/plugins/jcrop/js/jquery.Jcrop.min.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/layout/scripts/demo.js"></script>
            <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/form-image-crop.js"></script>
            <script src="<?php echo $this->webroot; ?>js/jquery.sumoselect.min.js"></script>
             <?php
echo $this->Html->script(array('/full_calendar/js/fullcalendar.min', '/full_calendar/js/jquery.qtip-1.0.0-rc3.min'));
//echo $this->Html->css(array('/full_calendar/css/fullcalendar'));
?>
<script type="text/javascript">
plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "admin/full_calendar";
</script>
<?php
//echo $this->Html->script(array('/full_calendar/js/jquery-1.5.min', '/full_calendar/js/jquery-ui-1.8.9.custom.min', '/full_calendar/js/fullcalendar.min', '/full_calendar/js/jquery.qtip-1.0.0-rc3.min'));
//echo $this->Html->css(array('/full_calendar/css/fullcalendar'));
?>

            <!-- BEGIN selectr SCRIPTS -->
            <script src="<?php echo $this->webroot; ?>assets/global/dist/selectr.js" type="text/javascript"></script>
            <!-- BEGIN selectrselectr SCRIPTS -->

            <!-- END PAGE LEVEL SCRIPTS -->
            <script>
            tinymce.init({
                selector: "textarea.text_editor", theme: "modern", width: '99.7%', height: 250,
                plugins: [
                    "advlist autolink link image lists charmap hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                    "table directionality emoticons paste textcolor responsivefilemanager code "
                ],
                toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor code ",
                // toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                image_advtab: true,
                relative_urls: false,
                remove_script_host: false,
                document_base_url: "/",
                convert_urls: true,
                external_filemanager_path: "<?php echo $this->webroot; ?>js/tinymce/plugins/filemanager/",
                filemanager_title: "Frontier Filemanager",
                external_plugins: {"filemanager": "<?php echo $this->webroot; ?>js/tinymce/plugins/filemanager/plugin.min.js"}
            });


            jQuery(document).ready(function () {

            	jQuery.curCSS = jQuery.css;
                
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                QuickSidebar.init(); // init quick sidebar
                Demo.init(); // init demo features
                //Index.initCharts();
                //EcommerceIndex.init();
                FormiCheck.init(); // init page demo
                // EcommerceProducts.init();
                ComponentsFormTools.init();
                ComponentsPickers.init();
                ComponentsDropdowns.init();
                ComponentsjQueryUISliders.init();
//                FormImageCrop.init();

                //To call color selectr
                $(".color-selectr").selectr({
                    title: 'What would you like to drink?',
                    placeholder: 'Search beverages'
                });


                //Function to intiliaze datepicker

                $(document).on("click", "a[data-toggle=modal]", function () {
                    var curr_id = $(this).attr('data-id');
                    $.get($(this).attr('data-url'), function (result) {
                        $(".modal-body").html(result);
                    })
                });
                	$('.bs').SumoSelect({ selectAll: true });

					// full calendar

                	 $('#calendar').fullCalendar({
                			timeFormat: 'HH:mm',
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
                			events: plgFcRoot + "/events/feed",
                            /*
                            eventRender: function(event, element) {
      $(element).tooltip({title: event.title});             
  }
                            */
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
                						tip: 'rightTop'
                					}
                	        	});*/
                	    	},
                			eventDragStart: function(event) {
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
                			},
                			eventResizeStart: function(event) {
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
                			}
                	    });

                	
            });

            </script>


            <!-- END JAVASCRIPTS -->
            <?php echo $this->element('admin/modals/ajax_modal'); ?>
            <?php echo $this->fetch('footer_js'); ?>

    </body>

</html>

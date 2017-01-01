<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
    <head>
        <title>Frontier</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">  
        <?php
        echo $this->Html->meta(
                'favicon.ico', '/favicon.ico', array('type' => 'icon')
        );
        ?>
        <!--<link rel="shortcut icon" href="favicon.ico">-->  
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Covered+By+Your+Grace' rel='stylesheet' type='text/css'>  

        <?php
        echo $this->Html->css(array(
            'front/plugins/bootstrap/css/bootstrap.min.css',
            'front/plugins/font-awesome/css/font-awesome.css',
            'front/plugins/flexslider/flexslider.css',
            'front/plugins/animate-css/animate.min.css',
            'front/plugins/owl-carousel/assets/owl.carousel.css',
            'front/plugins/owl-carousel/assets/owl.theme.css',
            'front/css/styles.css',
            'front/css/custom.css',
            'front/css/responsive.css',
        ));
        ?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head> 

    <body data-spy="scroll">

        <!--Call header-->
        <?php //echo $this->element((isset($header_element) ? $header_element : 'front/header')); ?>
        <!--header ends--> 

        <!--Show main content-->
        <?php echo $content_for_layout; ?>
        <!--End main content-->

        <!--Row data delete later if needed-->
        <?php //echo $this->element('front/row'); ?>
        <!--row data ends-->

        <!--Footer -->
        <?php //echo $this->element('front/footer'); ?>
        <!--footer ends --> 

        <?php
        echo $this->Html->script(array(
            'front/plugins/jquery-1.11.2.min.js',
            'front/plugins/jquery-migrate-1.2.1.min.js',
            'front/plugins/isMobile/isMobile.min.js',
            'front/plugins/jquery.easing.1.3.js',
            'front/plugins/bootstrap/js/bootstrap.min.js',
            'front/plugins/jquery-inview/jquery.inview.min.js',
            'front/plugins/FitVids/jquery.fitvids.js',
            'front/plugins/jquery-scrollTo/jquery.scrollTo.min.js',
            'front/plugins/jquery-placeholder/jquery.placeholder.js',
            'front/plugins/flexslider/jquery.flexslider-min.js',
            'front/plugins/jquery-match-height/jquery.matchHeight-min.js',
            'front/plugins/owl-carousel/owl.carousel.js',
            'front/js/main.js',
        ));
        ?>
        <!--[if !IE]>--> 
        <?php
        echo $this->Html->script('front/js/animations.js');
        ?>
        <!--<![endif]-->  
        <?php echo $this->element('footer_js'); ?> 

    </body>
</html> 


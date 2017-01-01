<!DOCTYPE html>
<html lang="en">
    <?php echo $this->element('head'); ?>
    <body>
        <div class="form-page"> 
            <?php echo $this->element('userdashboard/header'); ?>


            <!-- MAIN CONTAINER -->
            <?php echo $this->fetch('content'); ?>
            <!-- MAIN CONTAINER --> 
            <!-- FOOTER WRAP -->
            <?php //echo $this->element('sql_dump');  ?>
            <?php echo $this->element('footer'); ?>

            <?php
            echo $this->Html->script(array(
                'lib/jquery-1.11.3.min.js',
                '/bootstrap/js/bootstrap.js',
                '/plugins/sticky/jquery.sticky.js',
                '/plugins/bootstrap-notify/dist/bootstrap-notify.min.js',
                'functions.js',
                'Hopajim.js',
            ));
            ?>
            <!-- FOOTER WRAP --> 
            <!--  JS Load --> 

            <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements --> 
            <!--[if lt IE 9]>
                      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                    <![endif]-->
            <?php echo $this->element('footer_js'); ?>
            <!-- /JS Load -->
        </div>
    </body>
</html>

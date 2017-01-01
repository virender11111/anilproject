<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title_for_layout; ?>
        </title>


        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array(
            '/assets/global/plugins/font-awesome/css/font-awesome.min.css',
            '/assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
            '/assets/global/plugins/bootstrap/css/bootstrap.min.css',
            '/assets/global/plugins/uniform/css/uniform.default.css',
            '/assets/global/plugins/select2/select2.css',
            '/assets/admin/pages/css/login-soft.css',
            '/assets/global/css/components.css',
            '/assets/global/css/plugins.css',
            '/assets/admin/layout/css/layout.css',
            '../../assets/admin/layout/css/themes/darkblue.css',
            '../../assets/admin/layout/css/custom.css',
                )
        );
        ?>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <?php //echo $this->Html->image('medical.png', array('alt' => Configure::read('Site.title'))); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            FRONTIER -  ALL RIGHTS RESERVED
        </div>
        <!--[if lt IE 9]>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/respond.min.js"></script>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $this->webroot; ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/login.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/select2/select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $this->webroot; ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL SCRIPTS -->

        <script>
            jQuery(document).ready(function() {     
              Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
              Login.init();
              Demo.init();
                   // init background slide images
                   $.backstretch([
                    "<?php echo $this->webroot; ?>assets/admin/pages/media/bg/1.jpg",
                    "<?php echo $this->webroot; ?>assets/admin/pages/media/bg/2.jpg",
                    "<?php echo $this->webroot; ?>assets/admin/pages/media/bg/3.jpg",
                    "<?php echo $this->webroot; ?>assets/admin/pages/media/bg/4.jpg"
                    ], {
                      fade: 1000,
                      duration: 8000
                }
                );
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>

</html>
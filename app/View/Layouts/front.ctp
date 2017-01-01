<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title_for_layout; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
        <!-- Bootstrap core CSS -->

        <?php
        echo $this->Html->css(array(
            'dash/plugins/bootstrap/css/bootstrap.min.css',
            'dash/css/font-awesome.min.css',
            'dash/css/simple-line-icons.css',
            'dash/css/animate.css',
            'dash/css/dev-style.css',
            'dash/plugins/switchery/switchery.min.css',
            'dash/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css',
            'dash/css/main.css',
            'dash/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css',
            'dash/plugins/todo/css/todos.css',
            'dash/plugins/morris/css/morris.css',
            'dash/css/dev-style.css',
            'dash/plugins/dataTables/css/dataTables.css',
            'dash/plugins/select2/select2.css',
        ));
        ?>
        <link href="<?php echo $this->webroot; ?>assets/plugins/c3Chart/css/c3.css" rel="stylesheet"/>
        <link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"/>
        <link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet"/>
        <link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"/>
        <link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
        <link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"/>
        <link href="<?php echo $this->webroot; ?>assets/plugins/c3Chart/css/c3.css" rel="stylesheet"/>
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <!-- Feature detection -->
        <?php
        echo $this->Html->script(array(
            'dash/js/modernizr-2.6.2.min.js',
        ));
        ?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->

        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.js"></script>
    </head>

    <body class="off-canvas">
        <div id="container">
            <?php echo ($logged_in) ? $this->element('dashboard/header') : ""; ?>
            <!--sidebar left start-->
            <?php echo ($logged_in) ? $this->element('dashboard/left') : ""; ?>
            <!--sidebar left end-->

            <section class="main-content-wrapper">
                <section id="main-content">
                    <div class="row">
                        <div class="col-md-12">
                            <!--breadcrumbs start -->
                            <div class="row">
                                <div class="col-md-12 pull-right">
                                    <?php
                                    if ($logged_in) {
                                        echo $this->Html->getCrumbList(array('class' => 'breadcrumb', 'separator' => false), array(
                                            'text' => 'Dashboard ',
                                            //'text' => 'Dashboard ',
                                            'url' => Router::url('/', true) . 'users/dashboard',
                                            'escape' => false
                                        ));
                                    }
                                    ?>
                                </div>
                            </div>

                            <!--breadcrumbs end -->
                            <h1 class="h1"><?php echo (isset($title)) ? $title : null; ?></h1>
                            <div class="pull-right">
                                <?php echo $this->fetch('right-top-btn'); ?>
                            </div>
                        </div>

                        <div class="col-md-12 pull-right" style="width: 1094px;">
                            <?php echo $this->fetch('right-top-search'); ?>
                        </div>

                        <?php echo $this->fetch('date-range-picker'); ?>

                    </div>
                    <div class="ajax_response"></div>
                    <?php
                    if (!$flashLayout) {
                        echo $this->Session->flash('front');
                    }
                    ?>

                    <?php echo $this->fetch('content'); ?>
                </section>
            </section>
        </div>
        <!--main content end-->
        <?php echo ($logged_in) ? $this->element('dashboard/right') : ""; ?>   
        <?php echo $this->element('dashboard/modals/ajax_modal'); ?>
        <?php echo $this->element('dashboard/footer'); ?>

    </body>
</html>

<?php echo $this->element('head'); ?>
<!--head end -->
<title>Hopajim</title>
</head>
<body>

    <!--header start -->
    <?php echo $this->element('userdashboard/header'); ?>
    <!--header end --> 

    <!--header start -->
    <div class="Svg-wrap">
        <svg>
        <defs>
        <g id="Share-icon">
        <path d="M48,39.26c-2.377,0-4.515,1-6.033,2.596L24.23,33.172c0.061-0.408,0.103-0.821,0.103-1.246c0-0.414-0.04-0.818-0.098-1.215  l17.711-8.589c1.519,1.609,3.667,2.619,6.054,2.619c4.602,0,8.333-3.731,8.333-8.333c0-4.603-3.731-8.333-8.333-8.333  s-8.333,3.73-8.333,8.333c0,0.414,0.04,0.817,0.098,1.215l-17.711,8.589c-1.519-1.609-3.666-2.619-6.054-2.619  c-4.603,0-8.333,3.731-8.333,8.333c0,4.603,3.73,8.333,8.333,8.333c2.377,0,4.515-1,6.033-2.596l17.737,8.684  c-0.061,0.407-0.103,0.821-0.103,1.246c0,4.603,3.731,8.333,8.333,8.333s8.333-3.73,8.333-8.333C56.333,42.99,52.602,39.26,48,39.26  z"/>
        </g>
        <g id="Pause-icon">
        <path d="M224,435.8V76.1c0-6.7-5.4-12.1-12.2-12.1h-71.6c-6.8,0-12.2,5.4-12.2,12.1v359.7c0,6.7,5.4,12.2,12.2,12.2h71.6   C218.6,448,224,442.6,224,435.8z"/>
        <path d="M371.8,64h-71.6c-6.7,0-12.2,5.4-12.2,12.1v359.7c0,6.7,5.4,12.2,12.2,12.2h71.6c6.7,0,12.2-5.4,12.2-12.2V76.1   C384,69.4,378.6,64,371.8,64z"/>
        </g>


        <g id="trash">
        <path clip-rule="evenodd" d="M418.081,122.802h-59.057V68.29  c0-20.077-16.262-36.34-36.341-36.34H177.316c-20.078,0-36.342,16.264-36.342,36.34v54.513H81.918  c-12.536,0-22.713,10.177-22.713,22.715c0,12.536,10.177,22.713,22.713,22.713h13.629v263.48c0,20.078,16.262,36.34,36.341,36.34  h236.224c20.078,0,36.341-16.262,36.341-36.34v-263.48h13.629c12.535,0,22.715-10.177,22.715-22.713  C440.796,132.979,430.616,122.802,418.081,122.802z M313.598,122.802H186.4V97.367c0-11.083,8.909-19.991,19.991-19.991h87.216  c11.084,0,19.99,8.909,19.99,19.991V122.802z M186.4,186.401v218.051c0,9.992-8.181,18.172-18.17,18.172s-18.17-8.18-18.17-18.172  V186.401c0-9.989,8.18-18.17,18.17-18.17S186.4,176.412,186.4,186.401z M268.172,186.401v218.051  c0,9.992-8.181,18.172-18.172,18.172c-9.99,0-18.17-8.18-18.17-18.172V186.401c0-9.989,8.181-18.17,18.17-18.17  C259.991,168.231,268.172,176.412,268.172,186.401z M349.938,186.401v218.051c0,9.992-8.181,18.172-18.169,18.172  c-9.99,0-18.172-8.18-18.172-18.172V186.401c0-9.989,8.182-18.17,18.172-18.17C341.758,168.231,349.938,176.412,349.938,186.401z" fill-rule="evenodd"/>

        </g>

        </defs>
        </svg>
    </div>

    <!--header end --> 

    <!--container start -->
    <div id="Container" class="post-container">
        <div class="container"> 

            <!--header start -->
            <div class="Bootstrap-Nav margin-bot-15">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="#"> My Purchase</a></li>
                            <li class="active"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Coaches Area</a>
                                <ul class="dropdown-menu multi-level">
                                    <li><a href="javascript:void(0)"> Group Lessons</a></li>
                                    <li><a href="javascript:void(0)"> Order Calendar</a></li>
                                    <li><a href="javascript:void(0)"> My clients</a></li>
                                    <li><a href="javascript:void(0)">payments</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Profile</a></li>
                            <li><a href="javascript:void(0)">Messages System</a></li>
                            <li><a href="javascript:void(0)">Invite Friends</a></li>
                        </ul>
                    </div>
                    <!--/nav-collapse --> 

                </div>
            </div>

            <div class="breadcrumbs-row margin-bot-15">
                <?php
                echo $this->Html->getCrumbList(array('separator' => '</li>'), array(
                    'text' => 'Coaches Area',
                    'url' => Router::url('/', true) . 'lessons',
                    'escape' => false
                ));
                ?>
            </div>

            <?php
            echo $this->fetch('content');
            ?>
        </div>
    </div>
    <!--container end --> 

    <!--footer start -->
    <?php echo $this->element('footer'); ?>

    <?php
    echo $this->Html->script(array(
        'lib/jquery-1.11.3.min.js',
        '/bootstrap/js/bootstrap.js',
        '/bootstrap/js/bootstrap-datepicker.js',
        '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js',
        '/bootstrap/js/bootstrap-datetimepicker.min.js',
        '/plugins/sticky/jquery.sticky.js',
        '/plugins/bootstrap-notify/dist/bootstrap-notify.min.js',
        'jquery.MultiFile.js',
        'functions.js',
        'Hopajim.js',
    ));
    ?>

    <?php echo $this->start("footer_js"); ?>

    <script type="text/javascript">
        $(function () {
            Hopajim.init();
            Hopajim.hopajimGroupPage();
        });
        var modelClass = <?php echo json_encode($modelClass); ?>;
    </script>
    <?php echo $this->end(); ?>   


<!--    <script src="//code.angularjs.org/1.4.7/angular.js"></script> -->
    <?php echo $this->element('footer_js'); ?>
    
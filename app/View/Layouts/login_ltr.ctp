<?php echo $this->element('head'); ?>
<!--head end -->
<body ng-app="hopajimApp">
    <div class="Home-header Home-header2 Top-banner"> 
        <!--header start -->
        <?php echo $this->element('header'); ?>
        <!--header end --> 

        <div class="banner-form">
            <h1>Lets start work up</h1>
            <span class="banner-subtext">42000 fitness groups close to your home</span>
            <form class="Banner-form">
                <ul>
                    <li>
                        <input name="" type="text" placeholder="Which group do you look for ?">
                    </li>
                    <li>
                        <input name="" type="text" placeholder="Where ?">
                    </li>
                    <li>
                        <input name="" type="submit" value="go" class="orange-btn">
                    </li>
                </ul>
            </form>
        </div>
    </div>


    <!--Signup-modal-->

    <?php echo $this->Element('register'); ?>

    <!--/Signup-modal--> 

    <!--Login-modal-->

    <?php echo $this->element('login'); ?>

    <!--/Login-modal-->

    <!--container start -->
    <div class="container">
        <?php echo $this->fetch('content'); ?>
    </div>
    <!--container end --> 


    <ul class="banner-panel-row">
        <li class=""> <a href="javascript:void(0)">
                <div class="banner-panel">
                    <?php echo $this->Html->image('banner2.jpg'); ?>
                    <div class="banner-panel-caption">Lorem Ipsum</div>
                    <div class="video-icon-div1">
                        <div class="video-icon-div2">
                            <div class="video-icon-div3"><i class="fa fa-play-circle"></i></div>
                        </div>
                    </div>
                </div>
            </a> </li>
    </ul>
    <div class="container">
        <ul class="row banner-panel-row">
            <li class="col-md-4 col-sm-4 col-xs-12 col-xs-12"> <a href="javascript:void(0)">
                    <div class="banner-panel">
                        <?php echo $this->Html->image('banner3.jpg'); ?>
                        <div class="banner-panel-caption">Lorem Ipsum</div>
                    </div>
                </a> </li>
            <li class="col-md-8 col-sm-8 col-xs-12"> <a href="javascript:void(0)">
                    <div class="banner-panel">
                        <?php echo $this->Html->image('banner4.jpg'); ?>
                        <div class="banner-panel-caption">Lorem Ipsum</div>
                    </div>
                </a> </li>
            <li class="col-md-12 col-sm-12 col-xs-12"> <a href="javascript:void(0)">
                    <div class="banner-panel">
                        <?php echo $this->Html->image('banner5.jpg'); ?>
                        <div class="banner-panel-caption">Lorem Ipsum</div>
                    </div>
                </a> </li>
        </ul>
        <div class="home-heading1 home-heading2">
            <h2>SWEAT OUT TO SHAPE UP</h2>
            <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since printer took a galley. </span> </div>
    </div>
    <ul class="banner-panel-row full-panel1">
        <li class="col-md-6 col-sm-6 col-xs-12"> <a href="javascript:void(0)">
                <div class="banner-panel">
                    <?php echo $this->Html->image('banner6.jpg'); ?>
                    <div class="banner-panel-caption">Lorem Ipsum</div>
                </div>
            </a> </li>
        <li class="col-md-6 col-sm-6 col-xs-12"> <a href="javascript:void(0)">
                <div class="banner-panel">
                    <?php echo $this->Html->image('banner7.jpg'); ?>
                    <div class="banner-panel-caption">Lorem Ipsum</div>
                </div>
            </a> </li>
    </ul>

    <!--footer start -->
    <!--footer starts-->
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
    <?php echo $this->start("footer_js"); ?>

    <script type="text/javascript">
        $(function () {
            Hopajim.hopajimLoginPage();
        });
    </script>
    <?php echo $this->end(); ?>   


<!--    <script src="//code.angularjs.org/1.4.7/angular.js"></script> -->
    <?php echo $this->element('footer_js'); ?>
    <!--footer ends-->
    <!--footer end -->



</body>
</html><!--body end-->


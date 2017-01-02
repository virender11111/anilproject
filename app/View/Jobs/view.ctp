<?php
$this->viewVars['title_for_layout'] = $pages['Meta']['title'];
$this->viewVars['meta_keyword'] = $pages['Meta']['keywords'];
$this->viewVars['meta_description'] = $pages['Meta']['description'];
?>
<section id="feature">
    <div class="buy-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-sm-12">
                    <div class="buy-logo">
                        <a href="#"><img width="140" height="27" alt="" src="assets/images/logo.jpg"></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-sm-12">
                    <div class="buy-nav">
                        <ul>
                            <li><a href="#">How It Works</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Sign in</a></li>
                            <li><a href="#" class="buy-btn-sky">Start your campaign</a></li>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feature-content">
        <div class="container">
            <div class="row"> <!-- MAIN FLUID ROWS  -->
                <div class="col-md-12">
                    <div class="custom-container page-view">
                        <h1><?php echo $pages['Page']['title']; ?></h1>
                        <p><?php echo $pages['Page']['description']; ?></p>
                    </div> <!--  .custom-container --> 
                </div> <!--  .span12 -->
            </div> <!-- /MAIN FLUID ROWS  -->
        </div>
    </div>
</section>
<section id="contact" class="contact section has-pattern">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="foot-1">
                    <div class="logo-footer"><a href="#">TEERRIFIC</a></div>
                    <h2>Teerrific allows you to crowdfund awesome custom apparel.</h2>
                    <ul>
                        <li><a class="<?php echo ($this->params['controller'] == 'homes' && $this->params['action'] == 'index')? 'scrollto' : ''?>" href="<?php echo Router::url("/", true); ?>#how">How it works</a>|</li>
                        <li><?php echo $this->Html->link('Features', '/features'); ?>|</li>
                        <li><a href="#">Contact</a>|</li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-5 col-xs-12">
                <div class="social-footer"><div class="text-center">
                        <ul class="social-icons list-inline">
                            <li><a href="<?php echo $this->Html->url(Configure::read('Social.tweeter_url')); ?>" ><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $this->Html->url(Configure::read('Social.facebook_url')); ?>" ><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $this->Html->url(Configure::read('Social.instagram_url')); ?>" ><i class="fa fa-instagram"></i></a></li>                  
                        </ul><!--//social-icons-->
                    </div></div>

            </div>
            <div class="col-md-3 col-sm-7 col-xs-12">
                <div class="get-start">
                    <a href="<?php echo $this->Html->url(array("controller" => "Campaigns", "action" => "addNew")); ?>">Launch your campaign</a>
                </div>

            </div>
        </div>
        <!--//row-->
    </div><!--//container-->
</section><!--//contact-->  





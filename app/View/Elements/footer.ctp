<!--footer start-->
<footer class="Footer">
    <div class="container">
        <ul class="row footer-row">
            <li class="col-lg-5 col-md-5 col-sm-5 col-xs-12 Footer-colum Footer-colum-1">
                <div class="Footer-col">
                    <h4>About Hopajim</h4>
                    <div class="Footer-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  </p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
            </li>
            <li class="col-lg-3 col-md-4 col-sm-3 col-xs-12 Footer-colum Footer-colum-2">
                <div class="Footer-col">
                    <h4>Site Map</h4>
                    <div class="Footer-content">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <ul class="Footer-menu">
                                    <li><?php echo $this->Html->link('Home', array('controller' => 'users', 'action' => 'login')); ?></li>
                                    <li><a href="javascript:void(0)"> <?php echo __("About"); ?> </a></li>
                                    <li><a href="javascript:void(0)"> Invite Friend</a></li>
                                    <li><a href="javascript:void(0)"> Post New Lesson</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <ul class="Footer-menu">
                                    <li><a href="javascript:void(0)"> Terms &amp; Conditions</a></li> 
                                    <li><a href="javascript:void(0)"> Help</a></li>
                                    <li><a data-toggle="modal" data-target="#Login-modal">Log In</a></li>
                                    <li><a data-toggle="modal" data-target="#Signup-modal">Sign Up</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-lg-4 col-md-3 col-sm-4 col-xs-12 Footer-colum Footer-colum-4">
                <div class="Footer-col">
                    <h4>Subscribe Newsletter</h4>
                    <div class="Footer-content">
                        <form class="Newsletter">
                            <input name="email-address" type="text" placeholder="Your email address" />
                            <input type="submit" value="Subscribe" />
                        </form>
                        <div class="app-link"> <span class="app-link-title">Download Our Mobile Apps</span> <a href="javascript:void(0)"><?php echo $this->Html->image('play-store.png'); ?></a> <a href="javascript:void(0)"><?php echo $this->Html->image('app-store.png'); ?></a> </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="Footer-social"> <span>Join Us On</span>
            <ul>
                <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i> </a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-pinterest-p"></i> </a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-youtube-play"></i> </a></li>
            </ul>
        </div>
    </div>
</footer>
<!--footer end--> 

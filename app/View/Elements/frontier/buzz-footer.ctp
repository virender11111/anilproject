<footer class="site-footer buzz-footer">
    <div class="footer-row1">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 buzz-footer-col1">
                    <div class="footer-col"><?php echo $this->Html->image('/assets/frontier/img/buzz-logo.png',array('alt'=>''));?> </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 buzz-footer-rt">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-col">
                                <h3>What's Happening</h3>
                                <div class="footer-content">
                                    <ul class="footer-menu">
                                        <li><a href="javascript:void(0)"> Nutritious Cooking</a></li>
                                        <li><a href="javascript:void(0)"> IT &amp; Communication Workshop</a></li>
                                        <li><a href="javascript:void(0)"> Art Sessions</a></li>
                                       <!-- <li><a href="javascript:void(0)"> Wellness and Fitness Session</a></li> -->
                                        <li><a href="javascript:void(0)"> Massage and Reflexology</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="footer-col">
                                <h3>Just Contact Us</h3>
                                <div class="footer-content">
                                    <ul class="footer-menu">
                                        <li> <?php
                                            echo $this->Html->link('Contact Details', array(
                                                'controller' => 'pages',
                                                'action' => 'contact_us'
                                            )); ?>
                                        </li>
                                        <li> 
                                        <a href="<?php echo Router::url('/', true).'just-contact-us?category=benq'; ?>">Buzzz Enquiries</a>
                                        <?php
                                            /* echo $this->Html->link('Buzzz Enquiries', array(
                                                'controller' => 'pages',
                                                'action' => 'contact_us?category=benq'
                                            )); */ ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-3 col-xs-12">
                            <div class="footer-col">
                                <h3>Follow us on</h3>
                                <div class="footer-content">
                                    <ul class="page-social sm34-page-social">
                                        <li><a href="<?php echo Configure::read("Social.facebook_url"); ?>" target="_blank" class="sprite fb-icon"></a></li>
                                        <li><a href="<?php echo Configure::read("Social.tweeter_url"); ?>" target="_blank" class="sprite twitter-icon"></a></li>
                                        <li><a href="<?php echo Configure::read("Social.gplus"); ?>" target="_blank" class="sprite g-plus-icon"></a></li>
                                        <li><a href="<?php echo Configure::read("Social.linkedin"); ?>" target="_blank" class="sprite linkedin-icon"></a></li>
                                        <li><a href="<?php echo Configure::read("Social.youtube"); ?>" target="_blank" class="sprite youtube-icon"></a></li>
                                        <li><a href="javascript:void(0)" class="sprite mail-icon"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-lt">
                <span>Copyright © <?php echo date("Y"); ?> Frontier Support. All Right Reserved. </span>
                <!-- <a href="javascript:void(0)">Cookies Policy</a> -->
            </div>
            <div class="footer-bottom-rt"><span><span>Powered By:</span> <a href="http://www.criticalmissioncomputing.co.uk/" target="_blank" rel="nofollow">Critical Mission Computing Ltd</a> </span></div>
        </div>
    </div>
</footer>

<footer class="site-footer main-footer">
    <div class="footer-row1">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 footer-row1-left">
                    <!-- <div class="row"> -->
                    <div class="col-md-2 col-sm-2 col-xs-12 footer-col1">
                        <div class="footer-col">
                            <h3>Useful Links</h3>
                            <div class="footer-content">
                                <ul class="footer-menu">
                                    <li><a href="https://www.kent.ac.uk/tizard/" target="_blank">Tizard Centre</a></li>
                                    <li><a href="https://www.nappiuk.com/" target="_blank">NAPPI</a></li>
                                    <li><a href="http://www.bild.org.uk/" target="_blank">BILD</a></li>
                                    <li><a href="https://www.gov.uk/government/organisations/department-of-health" target="_blank">DOH</a></li>
                                    <li><a href="http://www.cqc.org.uk/" target="_blank">CQC</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12 footer-col1-1">
                        <div class="footer-col">
                            <h3>Who We Are</h3>
                            <div class="footer-content">
                                <ul class="footer-menu">
                                    <li><a href="<?php echo Router::url('/meet-our-team/', true);?>">Meet Our Team</a></li>
                                    <li><a href="<?php echo Router::url('/testimonials/', true);?>">Our Testimonials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-5 col-xs-12 footer-col2">
                        <div class="footer-col">
                            <h3>What We Do</h3>
                            <div class="footer-content">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <ul class="footer-menu"> <?php 
                                            foreach($service_list as $key => $value) {
                                                if($key <= 5) { ?>
                                                    <li><a href="<?php echo Router::url('/what-we-do/', true);?>"><?php echo $service_list[$key]['Service']['title'];?></a></li> <?php
                                                    $lastKey = $key;
                                                } 
                                            } ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <ul class="footer-menu"> <?php
                                            for($i = ($lastKey+1); $i<count($service_list); $i++) { ?>
                                                <li><a href="<?php echo Router::url('/what-we-do/', true);?>"><?php echo $service_list[$i]['Service']['title'];?></a></li> <?php                      
                                            } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-12 footer-col3">
                        <div class="footer-col">
                            <h3>Just Contact Us</h3>
                            <div class="footer-content">
                                <ul class="footer-menu">
                                    <li><a href="<?php echo Router::url('/just-contact-us', true);?>">Contact Details</a></li>
                                    <li><a href="<?php echo Router::url('/just-contact-us?category=genq', true);?>">General Enquiries</a></li>
                                    <li><a href="<?php echo Router::url('/just-contact-us?category=cenq', true);?>">Clinical Enquiries</a></li>
                                    <li><a href="<?php echo Router::url('/just-contact-us?category=benq', true);?>">Buzzz Enquiries</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 footer-col4">
                    <div class="footer-col"> <a href="<?php echo Router::url('/', true);?>" class="footer-logo"><?php echo $this->Html->image('/assets/frontier/img/FLOOGOO.png',array('alt' => 'Frontier Support Services'));?></a>
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
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-lt"><span>Copyright &copy; <?php echo date("Y"); ?> Frontier Support. All Right Reserved. </span></div>
            <div class="footer-bottom-rt"><span><span>Powered By:</span> <a href="http://www.criticalmissioncomputing.co.uk/" target="_blank" rel="nofollow">Critical Mission Computing Ltd</a> </span></div>
        </div>
    </div>
</footer>

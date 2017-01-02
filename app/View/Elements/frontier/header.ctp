<header class="header-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 header-logo-col">
                <a href="<?php echo Router::url('/', true);?>"><?php echo $this->Html->image('/assets/frontier/img/FLOOGOO.png', array('alt' => 'Frontier Support Services'));?></a>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 header-nav-colum">
                <nav class="header-nav">
                    <ul id="header-nav"> <?php 
                		$action = $this->params['action'];
                		$controller = $this->params['controller']; ?>
                        
                        <?php $activeClass = ($controller == "pages" && $action == "index") ? "active" : ""; ?>
                        <li class="<?php echo $activeClass; ?>">
                            <a href="<?php echo Router::url('/', true);?>">At a Glance </a>
                        </li>

                        <?php $activeClass = ($controller == "pages" && ($action == "who_we_are" || $action == "testimonials" || $action == "our_team")) ? "active" : ""; ?>
                        <li class="<?php echo $activeClass; ?>">
                            <a href="<?php echo Router::url('/who-we-are/', true);?>"> Who We Are </a>
                            <ul>
                                <li><a href="<?php echo Router::url('/meet-our-team/', true);?>">Meet Our Team</a></li>
                                <li><a href="<?php echo Router::url('/testimonials/', true);?>">Our Testimonials</a></li>
                            </ul>
                        </li>  

                        <?php $activeClass = ($controller == "pages" && ($action == "what_we_do" || $action == "service_detail")) ? "active" : ""; ?>
                        <li class="<?php echo $activeClass; ?>">
                            <a href="<?php echo Router::url('/what-we-do/', true);?>"> What We Do </a> <?php /*
                            <ul> <?php
                                foreach($service_list as $allservices){?>
                                    <li><a href="<?php echo Router::url('/services/service_detail/'.$allservices['Service']['id'], true);?>"><?php echo $allservices['Service']['title'];?></a></li> <?php 
                                } ?>
                            </ul> */ ?>
                        </li>

                        <?php $activeClass = ($controller == "pages" && $action == "jobs") ? "active" : ""; ?>
                        <li class="<?php echo $activeClass; ?>">
                            <a href="<?php echo Router::url('/come-join-us/', true);?>"> Come Join Us </a>
                        </li>

                        <?php $activeClass = ($controller == "blog_posts" && ($action == "index" || $action == "view")) ? "active" : ""; ?>
                        <li class="<?php echo $activeClass; ?>">
                            <a href="<?php echo Router::url('/blog/', true);?>"> News and Blog </a>
                        </li>

                        <?php $activeClass = ($controller == "pages" && $action == "contact_us") ? "active" : ""; ?>
                        <li class="<?php echo $activeClass; ?>">
                            <a href="<?php echo Router::url('/just-contact-us/', true);?>"> Just Contact Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script type="application/ld+json"> {
    "@context": "http://schema.org", "@type": "Organization", "url": "http://www.frontiersupport.co.uk/", "name": "Frontier Support", "description": "Frontier Support provides specialist care to vulnerable adults with Learning Disabilities, Autism, Aspergers, Epilepsy, Mental Health conditions.", "logo": "http://frontiersupport.co.uk/assets/frontier/img/LOOGOO.png", "sameAs": [ "https://www.facebook.com/Frontier-Support-506491282882837", "https://twitter.com/LazdaneZane", "https://plus.google.com/116299639548800052356"], "telephone": "+44-2086037230", "email": "enquiry@frontiersupport.co.uk", "makesOffer": [ "Positive Behaviour Support", "Physical Disability Support", "Mental Health Support", "challenging behaviour service", "Aspergers support", "Autism support"]
} 
</script>
</header>

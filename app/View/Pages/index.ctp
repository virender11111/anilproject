<div class="container">
    <div class="top-news">
        <div class="top-news-inner">
            <ul id="ticker01">       
                <li><span>We were inspected by the CQC in June 2016 & rated as ‘GOOD’ which means we are performing well and meeting expectations.</span></li>
            </ul>
        </div>
    </div>
    <div class="video-row home-video-row">
        <div class="row video-section">
            <div class="col-md-6 col-sm-12">
                <div class="video-col">
                    <div class="video-col-inner"> <?php 
                        $document = new DOMDocument();
                        $document->loadHTML($video_section['Page']['description']);
                        $lst = $document->getElementsByTagName('iframe');
                        $iframe= $lst->item(0); ?>
                        <iframe width="100%" height="439" src="<?php echo $iframe->attributes->getNamedItem('src')->value;?>" id="home_video" class="video-frame1" allowfullscreen="allowfullscreen"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="video-article">
                    <div class="video-article-inner"> <?php
                        $contents = strip_tags($video_section['Page']['description'], '<p><strong>');
                        echo $contents; ?>
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
</div></div></div>
<div class="thumb-panel">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="thumb-col">
                    <a href="<?php echo Router::url('/testimonials/', true);?>">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <?php echo $this->Html->image('/assets/frontier/img/testimonial_3.png',array('alt' => 'reviews about our adult disability support'));?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="thumb-col">
                    <a href="<?php echo Router::url('/buzz-hub/', true);?>">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <?php echo $this->Html->image('/assets/frontier/img/buzzz-hub-new.png',array('alt' => 'place for adults with disabilities'));?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="thumb-col">
                    <a href="<?php echo Router::url('/registered-providers/', true);?>">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <?php echo $this->Html->image('/assets/frontier/img/Registered_Providers.png',array('alt' => 'registered disability care providers'));?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="thumb-col">
                    <a href="<?php echo Router::url('/quality-assurance/', true);?>">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <?php echo $this->Html->image('/assets/frontier/img/quality-assurance-new.jpg',array('alt' => 'Quality Assurance - Disability Support Services'));?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="home-article"> <?php echo $page_details['Page']['description']; ?></div>
    <div class="home-slider-row">
        <div class="home-slider">
            <ul id="scroller"> <?php
            foreach($brands as $brand){?>
                <li>
                    <div><?php echo $this->Html->image('/files/brand/image/'.$brand['Brand']['id'].'/'.$brand['Brand']['image'],array('alt'=>''));?></div>
                </li> <?php 
            } ?>
            </ul>
        </div>
    </div>
</div>
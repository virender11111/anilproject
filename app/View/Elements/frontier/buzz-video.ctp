<div class="container"> <?php 
    if(isset($buzz_video)) { ?>
        <div class="video-row buzz-video-row">
            <div class="row video-section">
                <div class="col-md-6 col-sm-6 col-xs-12 video-col-1">
                    <div class="video-col">
                        <div class="video-col-inner"> <?php         
                            $document = new DOMDocument();
                            $document->loadHTML($buzz_video['Page']['description']);
                            $lst = $document->getElementsByTagName('iframe');
                            $iframe= $lst->item(0); ?>
                            <iframe width="616" height="410" src="<?php echo $iframe->attributes->getNamedItem('src')->value;?>" class="video-frame" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 video-col-2">
                    <div class="video-article">
                        <div class="video-article-inner"> <?php
                            $contents = strip_tags($buzz_video['Page']['description'], '<p><a>');
                            echo $contents;?>
                            <ul class="page-social  sm34-page-social">
                                <li><a class="sprite fb-icon" href="<?php echo Configure::read("Social.facebook_url"); ?>" target="_blank"></a></li>
                                <li><a class="sprite twitter-icon" href="<?php echo Configure::read("Social.tweeter_url"); ?>" target="_blank"></a></li>
                                <li><a class="sprite g-plus-icon" href="<?php echo Configure::read("Social.gplus"); ?>" target="_blank"></a></li>
                                <li><a class="sprite linkedin-icon" href="<?php echo Configure::read("Social.linkedin"); ?>" target="_blank"></a></li>
                                <li><a href="<?php echo Configure::read("Social.youtube"); ?>" target="_blank" class="sprite youtube-icon"></a></li>
                                <li><a class="sprite mail-icon" href="javascript:void(0)"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <?php
    } else { ?>
        <div class="page-banner"> <?php
            echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'],array('alt' => '', 'id' => 'buzz_banner_image')); ?>
        </div> <?php
    } ?>
</div>

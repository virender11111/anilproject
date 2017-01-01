<div class="sidebar-row1 margin-bot-35"> <?php
	if($this->params['action'] != 'testimonials'){?>
        <div class="sidebar-aboutus margin-bot-20">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-3 sidebar-aboutus-img">
                    <figure><a href="<?php echo Router::url('/testimonials/', true); ?>"><?php echo $this->Html->image('/assets/frontier/img/testimonial_3.png',array('alt' => 'reviews about our adult disability support', 'class' => 'radius-5px')); ?></a></figure>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-9 sidebar-aboutus-col2">
                    <div class="sidebar-aboutus-desc">
                        <p><?php 
                            $contents = strip_tags($testimonial_detail['Page']['short_description'], '<p>');
                            $words = str_word_count($contents, 2);
                            $pos = array_keys($words);
                            $contents = substr($contents, 0, $pos[15]) . '...';
                            echo $contents;
                            ?>
                        </p>
                        <a href="<?php echo Router::url('/testimonials/', true); ?>">read more...</a>
                    </div>
                </div>
            </div>
        </div> <?php
    } ?>

    <div class="sidebar-aboutus margin-bot-20">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-3 sidebar-aboutus-img">
                <figure><a href="<?php echo Router::url('/buzz-hub/', true); ?>"><?php echo $this->Html->image('/assets/frontier/img/buzzz-hub-new.png',array('alt' => 'place for adults with disabilities', 'class' => 'radius-5px')); ?></a></figure>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-9 sidebar-aboutus-col2">
                <div class="sidebar-aboutus-desc">
                    <p><?php 
                        $contents = strip_tags($buzz_hub_details['Page']['short_description'], '<p>');
                        $words = str_word_count($contents, 2);
                        $pos = array_keys($words);
                        $contents = substr($contents, 0, $pos[15]) . '...';
                        echo $contents;
                        ?>
                    </p>
                    <a href="<?php echo Router::url('/buzz-hub/', true); ?>">read more...</a>
                </div>
            </div>
        </div>
    </div> <?php 
    
    if($this->params['action'] != 'our_partners'){?>
        <div class="sidebar-aboutus margin-bot-20">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-3 sidebar-aboutus-img">
                    <figure><a href="<?php echo Router::url('/registered-providers/', true); ?>"><?php echo $this->Html->image('/assets/frontier/img/Registered_Providers.png',array('alt' => 'registered disability care providers','class' => 'radius-5px')); ?></a></figure>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-9 sidebar-aboutus-col2">
                    <div class="sidebar-aboutus-desc">
                        <p><?php 
                            $contents = strip_tags($our_partners_details['Page']['short_description'], '<p>');
                            $words = str_word_count($contents, 2);
                            $pos = array_keys($words);
                            $contents = substr($contents, 0, $pos[15]) . '...';
                            echo $contents;
                            ?>
                        </p>
                        <a href="<?php echo Router::url('/registered-providers/', true); ?>">read more...</a>
                    </div>
                </div>
            </div>
        </div> <?php
    } 

    if($this->params['action'] != 'quality_assurance') { ?>
        <div class="sidebar-aboutus margin-bot-20">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-3 sidebar-aboutus-img">
                    <figure><a href="<?php echo Router::url('/quality-assurance/', true); ?>"><?php echo $this->Html->image('/assets/frontier/img/quality-assurance-new.jpg',array('alt' => 'Quality Assurance - Disability Support Services','class' => 'radius-5px')); ?></a></figure>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-9 sidebar-aboutus-col2">
                    <div class="sidebar-aboutus-desc">
                        <p><?php
                            $contents = strip_tags($quality_assurance_details['Page']['short_description'], '<p>');
                            $words = str_word_count($contents, 2);
                            $pos = array_keys($words);
                            $contents = substr($contents, 0, $pos[15]) . '...';
                            echo $contents;
                            ?>
                        </p>
                        <a href="<?php echo Router::url('/quality-assurance/', true); ?>">read more...</a>
                    </div>
                </div>
            </div>
        </div> <?php
    } ?>
</div>
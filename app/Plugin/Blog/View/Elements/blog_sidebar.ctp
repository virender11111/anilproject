<aside class="col-md-4 col-sm-5 col-xs-12">
    <div class="page-sidebar blog-sidebar radius-2px"> <?php
        echo $this->Form->create('blog', array(
            'class' => 'search-form margin-bot-30',
            'type' => 'post',
            'novalidate' => true
        ));
        echo $this->Form->input('search',array('div' => '', 'label' => false, 'placeholder' => 'Search...'));?>
        <button><i class="fa fa-search"></i> </button>
        <?php echo $this->Form->end();?>
        </form>
        <div class="sidebar-row1 margin-bot-45">
            <div class="sidebar-title radius-3px">Recent Posts</div> <?php
            foreach($blogpost_list as $blogsss) { ?>
                <div class="sidebar-aboutus margin-bot-20">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-3 sidebar-aboutus-img">
                            <figure> <?php 
                                echo $this->Html->image('/files/blog_post/image/'.$blogsss['BlogPost']['id'].'/'.$blogsss['BlogPost']['image'], array(
                                    "alt" => "",
                                    'url' => array(
                                        'action' => 'view',
                                        'slug' => $blogsss['BlogPost']['slug']
                                    )
                                )); ?>
                            </figure>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-9 sidebar-aboutus-col2">
                            <div class="sidebar-aboutus-desc">
                                <strong><?php echo $this->Html->link($blogsss['BlogPost']['title'], array('action' => 'view', 'slug' => $blogsss['BlogPost']['slug']));?></strong>
                                <?php
                                $contents = strip_tags($blogsss['BlogPost']['body'], '<p>');
                                $words = str_word_count($contents, 2);
                                $pos = array_keys($words);
                                $contents = substr($contents, 0, $pos[15]) . '...';
                                ?>
                                <?php echo $contents; ?> <br/><?php echo $this->Html->link('read more', array('action' => 'view', 'slug' => $blogsss['BlogPost']['slug']), array('title' => $blogsss['BlogPost']['title'], 'rel' => 'bookmark')); ?> <span class="sidebar-blog-dd"><?php echo date('d M Y',strtotime($blogsss['BlogPost']['created']));?></span>
                            </div>
                        </div>
                    </div>
                </div> <?php
            } ?>
        </div>
    </div>
    <div class="sidebar-row2 margin-bot-20">
        <div class="sidebar-title radius-3px">Our Services</div>
        <div class="sidebar-content">
            <ul class="sidebar-menu"> <?php
                foreach($service_list as $allservices) { ?>
                    <li><a href="<?php echo Router::url('/what-we-do/', true);?>"><?php echo $allservices['Service']['title'];?></a></li> <?php 
                } ?>
            </ul>
        </div>
    </div>
    <div class="sidebar-row2 margin-bot-35">
        <div class="sidebar-title radius-3px">Blog Categories</div>
        <div class="sidebar-content">
            <ul class="sidebar-menu">
                <?php echo $this->Blog->nav($categories); ?>
            </ul>
        </div>
    </div>
    <div class="sidebar-row2 margin-bot-35">
        <div class="sidebar-title radius-3px">Archives</div>
        <div class="sidebar-content">
            <ul class="sidebar-menu">
                <?php echo $this->Blog->nav($archives); ?>
            </ul>
        </div>
    </div>
    <div class="blog-sidebar-aboutus">
        <div class="sidebar-aboutus margin-bot-20">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-3 sidebar-aboutus-img">
                    <figure>
                        <a href="<?php echo Router::url('/testimonials/', true);?>"><?php echo $this->Html->image('/assets/frontier/img/testimonial_3.png',array('alt'=>'place for adults with disabilities','class'=>'radius-5px')); ?></a></figure>
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
                        <a href="<?php echo Router::url('/testimonials/', true);?>">read more...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-aboutus margin-bot-20">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-3 sidebar-aboutus-img">
                    <figure>
                        <a href="<?php echo Router::url('/buzz-hub/', true);?>"><?php echo $this->Html->image('/assets/frontier/img/buzz-logo3.jpg',array('alt'=>'place for adults with disabilities','class'=>'radius-5px')); ?></a></figure>
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
                        <a href="<?php echo Router::url('/buzz-hub/', true);?>">read more...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-aboutus margin-bot-20">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-3 sidebar-aboutus-img">
                    <figure><a href="<?php echo Router::url('/registered-providers/', true);?>"><?php echo $this->Html->image('/assets/frontier/img/Registered_Providers.png',array('alt'=>'registered disability care providers','class'=>'radius-5px')); ?></a></figure>
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
                        <a href="<?php echo Router::url('/registered-providers/', true);?>">read more...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-aboutus margin-bot-20">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-3 sidebar-aboutus-img">
                    <figure><a href="<?php echo Router::url('/quality-assurance/', true);?>"><?php echo $this->Html->image('/assets/frontier/img/quality-assurance-new.jpg',array('alt'=>'Quality Assurance - Disability Support Services','class'=>'radius-5px')); ?></a></figure>
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
                        <a href="<?php echo Router::url('/quality-assurance/', true);?>">read more...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</aside>
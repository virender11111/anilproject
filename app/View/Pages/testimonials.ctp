<div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'], array('alt' => 'testimonials disability support Services')); ?>
</div>
</div>
<div class="breadcrumb-row margin-bot-50">
    <div class="container"> 
        <ul class="breadcrumb-ul" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li class="first" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/', true); ?>" property="item" typeof="WebPage"><span property="name">At a Glance</span></a>
                <meta property="position" content="1">
            </li>
            <li property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/who-we-are/', true); ?>" property="item" typeof="WebPage"><span property="name">Who We Are</span></a>
                <meta property="position" content="2">
            </li>
            <li class="last" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/testimonials/', true); ?>" property="item" typeof="WebPage"><span property="name">Our Testimonials</span></a>
                <meta property="position" content="3">
            </li>
        </ul>
        <?php
        // $this->Html->addCrumb('Who We Are', array('controller' => 'pages', 'action' => 'who_we_are'));
        // $this->Html->addCrumb('Our Testimonials', array('controller' => 'pages', 'action' => 'testimonials'));
        // echo $this->Html->getCrumbList(array(
        //     'class' => 'breadcrumb-ul',
        //     'separator' => false), array(
        //         'text' => 'At a Glance ',
        //         'url' => Router::url('/', true) . '',
        //         'escape' => false
        //     )
        // );
        echo $this->element("frontier/social-icon"); ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="page-left">
                <div class="article-col">
                    <div class="common-title">
                        <h3><?php echo $page_details['Page']['title']; ?></h3>
                    </div>
                    <p><?php echo $page_details['Page']['description']; ?></p>
                </div>
                
                <div class="testimonial-row margin-bot-50"> <?php
                    foreach($testimonials as $key => $value) { ?>
                        <div class="testimonial-panel margin-bot-30">
                            <div class="testimonial-left">
                                <div class="testimonial-left">
                                    <div class="flip-stuff">
                                        <div class="card effect__hover full-radius">
                                            <div class="card__front full-radius">
                                                <div class="table-col">
                                                    <div class="td-col"><?php echo $value['Testimonial']['name']; ?></div>
                                                </div>
                                            </div>
                                            <div class="card__back full-radius">
                                                <div class="table-col">
                                                    <div class="td-col">back</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-right">
                                    <div class="testimonial-content">
                                        <div class="table-col">
                                            <div class="td-col"><?php echo $value['Testimonial']['feedback']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <?php
                    } ?>
                </div>
                <div class="blog-pagination aligncenter"> <?php
                    $paging = $this->Paginator->params();
                    if ($paging['pageCount'] > 1){ ?>
                        <nav id="paging"> <?php
                            echo $this->Paginator->prev('Previous', null, null, array('class' => 'disabled'));
                            echo "&nbsp;&nbsp;&nbsp;";
                            echo $this->Paginator->numbers();
                            echo "&nbsp;&nbsp;&nbsp;";
                            echo $this->Paginator->next('Next', null, null, array('class' => 'disabled')); ?>
                        </nav> <?php
                    } ?>
                </div>
            </div>
        </div>
        <aside class="col-md-4 col-sm-5 col-xs-12">
            <div class="page-sidebar"> <?php
                echo $this->element("frontier/sidebar-about-us");
                echo $this->element("frontier/our-services");
                echo $this->element("frontier/quick-enquiry"); ?>
            </div>
        </aside>
    </div>
</div>

 <div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'],array('alt' => 'care and support for vulnerable adults')); ?>
</div>
</div>
<div class="breadcrumb-row margin-bot-50">
    <div class="container">
        <ul class="breadcrumb-ul" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li class="first" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/', true); ?>" property="item" typeof="WebPage"><span property="name">At a Glance</span></a>
                <meta property="position" content="1">
            </li>
            <li class="last" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/what-we-do/', true); ?>" property="item" typeof="WebPage"><span property="name">What We Do</span></a>
                <meta property="position" content="2">
            </li>
        </ul>
        <?php
        // $this->Html->addCrumb('What We Do', array('controller' => 'pages', 'action' => 'what_we_do'));
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
                <div class="common-title">
                    <h3><?php echo $page_details['Page']['title']; ?></h3>
                </div>
                <?php echo $page_details['Page']['description']; ?>
                <div class="what-we-do">
                    <div class="row"> <?php
                        foreach($services as $service) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 square-panel-col">
                                <div class="verticle-devider"></div>
                                <div class="square-panel">
                                    <a href="javascript:(void(0));">
                                        <div class="square-panel-img">
                                            <div class="table-col">
                                                <div class="td-col"> <?php
                                                    echo $this->Html->image('/files/service/image/'.$service['Service']['id'].'/'.$service['Service']['image'], array('alt' => $service['Service']['title']));?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="square-panel-title">
                                            <h2><?php echo $service['Service']['title'];?></h2>
                                        </div>
                                    </a>
                                    <div class="border-devider"><span></span></div>
                                    <div class="square-panel-pera">
                                        <p><?php echo $service['Service']['short_description'];?> </p>
                                    </div>
                                </div>
                            </div> <?php
                        } ?>
                    </div>
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
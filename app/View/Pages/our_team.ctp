<div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'], array('alt' => 'disability care team at frontier support')); ?>
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
                <a href="<?php echo Router::url('/meet-our-team/', true); ?>" property="item" typeof="WebPage"><span property="name">Meet Our Team</span></a>
                <meta property="position" content="3">
            </li>
        </ul>
        <?php
        // $this->Html->addCrumb('Who We Are', array('controller' => 'pages', 'action' => 'who_we_are'));
        // $this->Html->addCrumb('Meet Our Team', array('controller' => 'pages', 'action' => 'our_team'));
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
                        <h3><?php echo $page_details['Page']['title'];?></h3>
                    </div>
                    <p><?php echo $page_details['Page']['description'];?></p>
                </div>
                <div class="our-team-row"> <?php 
                    foreach($team_details as $key => $value) { ?>
                        <div class="team-panel margin-bot-30">
                            <div class="team-inner-mid"> <?php
                                echo $this->Html->image('../files/team/image/' . $value['Team']['id'] . '/' . $value['Team']['image'],array('alt' => $value['Team']['title'].' - frontier support', 'class' => 'img img-circle')); ?>
                                <h3><a href="javascript:void(0);"><?php echo $value['Team']['title']; ?></a>
                                <?php /*echo $this->Html->link($value['Team']['title'], array(
                                    'controller' => 'pages',
                                    'action' => 'view_team',$value['Team']['id']
                                ));*/ ?></h3>
                                <p><?php echo $value['Team']['description']; ?></p>
                            </div>
                        </div> <?php
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
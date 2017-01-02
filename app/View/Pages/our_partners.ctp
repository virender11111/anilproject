 <div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'],array('alt' => 'Registered Disability care Providers')); ?>
</div></div>
<div class="breadcrumb-row margin-bot-50">
    <div class="container">
        <ul class="breadcrumb-ul" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li class="first" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/', true); ?>"><span property="name">At a Glance</span></a>
            </li>
            <li class="last" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/registered-providers', true); ?>"><span property="name">Registered Providers</span></a>
            </li>
        </ul>
        <?php
        // $this->Html->addCrumb('Registered Providers', array(
        //     'controller' => 'pages',
        //     'action' => 'our_partners'
        // ));
        // echo $this->Html->getCrumbList(array(
        //     'class' => 'breadcrumb-ul',
        //     'separator' => false), array(
        //         'text' => 'At a Glance ',
        //         'url' => Router::url('/', true) . '',
        //         'escape' => false
        //     )
        // ); ?>
        <?php echo $this->element("frontier/social-icon"); ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="page-left">
                <div class="common-title">
                    <h3>Registered Providers</h3>
                </div>
                <p><?php echo $page_details['Page']['short_description'];?></p>
                <p>&nbsp;</p>
                <?php echo $page_details['Page']['description'];?>
            </div>
        </div>
        <aside class="col-md-4 col-sm-5 col-xs-12">
            <div class="page-sidebar"> 
                <?php echo $this->element("frontier/sidebar-about-us"); ?>
                <?php echo $this->element("frontier/our-services"); ?>
                <?php echo $this->element("frontier/quick-enquiry"); ?>
            </div>
        </aside>
    </div>
</div>
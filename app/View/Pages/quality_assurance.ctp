<div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'],array('alt' => 'Quality Assurance- Disability care services')); ?>
</div></div>
<div class="breadcrumb-row margin-bot-50">
    <div class="container">
        <ul class="breadcrumb-ul" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li class="first" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/', true); ?>"><span property="name">At a Glance</span></a>
            </li>
            <li class="last" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/quality-assurance', true); ?>"><span property="name">Quality Assurance</span></a>
            </li>
        </ul>
        <?php
        // $this->Html->addCrumb('Quality Assurance', array(
        //     'controller' => 'pages',
        //     'action' => 'quality_assurance'
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
            <?php echo $page_details['Page']['description'];?>
            <?php /* ?>
                <?php echo $page_details['Page']['description'];?>
                <div class="faq-row">
                    <div class="common-title">
                        <h3>We ask the same five questions of all the services we inspect</h3>
                    </div>
                    <div class="faq-content-row">
                        <ul class="accordion-ul"> <?php
                            foreach($page_details['Faq'] as $key => $value) { ?>
                                <li><a class="accordion-a">Q<?php echo ($key+1).". "; ?> <?php echo $value['question']; ?> <?php echo $this->Html->image('/assets/frontier/img/plus.png',array('alt'=>'', 'class' => 'plus'));?><?php echo $this->Html->image('/assets/frontier/img/minus.png',array('alt'=>'', 'class' => 'minus'));?> </a>
                                    <div class="faq-content"><?php echo $value['description']; ?> </div>
                                </li> <?php
                            } ?>
                        </ul>
                    </div>
                </div>
                <?php */ ?>
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

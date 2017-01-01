<div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'],array('alt'=>'')); ?>
</div></div>
<div class="breadcrumb-row margin-bot-50">
    <div class="container"> <?php
        $this->Html->addCrumb('Specialist Services', array(
            'controller' => 'pages',
            'action' => 'specialist_services'
        ));
        echo $this->Html->getCrumbList(array(
            'class' => 'breadcrumb-ul',
            'separator' => false), array(
                'text' => 'At a Glance ',
                'url' => Router::url('/', true) . '',
                'escape' => false
            )
        ); ?>
        <?php echo $this->element("frontier/social-icon"); ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="page-left">
                <?php echo $page_details['Page']['description']; ?>
                <div class="faq-row">
                    <div class="common-title">
                        <h3>Case Studies</h3>
                    </div>
                    <div class="faq-content-row">
                        <ul class="accordion-ul"> <?php
                            foreach($page_details['Faq'] as $key => $value) { 
                                if($page_details['Faq'][$key]['status'] == 1) { ?>
                                    <li><a class="accordion-a"><?php echo $value['question']; ?> <?php echo $this->Html->image('/assets/frontier/img/plus.png',array('alt'=>'', 'class' => 'plus'));?> <?php echo $this->Html->image('/assets/frontier/img/minus.png',array('alt'=>'', 'class' => 'minus'));?> </a>
                                        <div class="faq-content" style="margin-bottom: 10px;" id="<?php echo 'loadFaqContent'.$key; ?>">    <strong class="safe-title"><?php echo $value['question']; ?> : </strong> <?php echo $this->Text->truncate($value['description'], 400, array()); ?> 
                                            <div class="faq-sm-btn text-right">
                                                <a href="javascript:void(0)" class="solid-red-btn radius-5px loadFaqContent" type="button" id="<?php echo $key; ?>">View More</a>
                                            </div>
                                            <div class="faq-content fullContent" id="<?php echo 'con'.$key; ?>"><?php echo $value['description']; ?>
                                            </div>
                                        </div>                  
                                    </li> <?php
                                }
                            } ?>
                        </ul>
                    </div>
                </div>
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
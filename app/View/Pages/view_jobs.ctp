<!-- ************ ENQUIRY FORM MODAL ********************-->
<div class="modal fade " id="enquiry-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog quick-enquirymodal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="enquiry-logo">
                    <a href="index.php"> <?php
                        echo $this->Html->image('/assets/frontier/img/logo.png', array('')); ?>
                    </a>
                    <h2>Upload CV</h2>
                </div>
            </div>
            <div class="modal-body">
                <iframe src="<?php echo Router::url('/jobs/enquiry_modal', true) ?>" width="100%" height="496" frameborder="0" allowtransparency="true" id="enqFrame"></iframe>
            </div>      
        </div>
    </div>
</div>
<!-- *******************ENQUIRY FORM MODAL END *******************************-->
<div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'],array('alt'=>'')); ?>
</div></div>
<div class="breadcrumb-row margin-bot-50">
    <div class="container"> <?php
        $this->Html->addCrumb('Join Our Team', array(
            'controller' => 'pages',
            'action' => 'jobs'
        ));
        echo $this->Html->getCrumbList(array(
            'class' => 'breadcrumb-ul',
            'separator' => false), array(
                'text' => 'At a Glance ',
                'url' => Router::url('/', true) . '',
                'escape' => false
            )
        );
        echo $this->element("frontier/social-icon"); ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="page-left">
                <div class="article-col">
                    <div class="common-title">
                        <h3><?php echo $job_details['JobCategory']['name']; ?></h3>
                    </div>
                    <h4 class="subtitle-text"><?php echo $job_details['JobUpload']['title']; ?></h4>
                    <?php echo $job_details['JobUpload']['description']; ?>
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

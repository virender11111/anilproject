<!-- *******************JOB MODAL START *******************************-->
<div class="modal fade " id="job-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog quick-enquirymodal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="enquiry-logo">
                    <a href="index.php"> <?php
                        echo $this->Html->image('/assets/frontier/img/LOOGOO.png', array(
                            'url' => array(
                                'controller' => 'pages',
                                'action' => 'index'
                            )
                        )); ?></a>
                </div>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
<!-- *******************JOB MODAL END *******************************-->
<!-- ************ ENQUIRY FORM MODAL ********************-->
<div class="modal fade " id="enquiry-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog quick-enquirymodal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="enquiry-logo"> <?php
                    echo $this->Html->image('/assets/frontier/img/LOOGOO.png', array(
                        'url' => array(
                            'controller' => 'pages',
                            'action' => 'index')
                        )
                    ); ?>
                    <h2>Upload CV</h2>
                </div>
            </div>
            <div class="modal-body">
                <div class="alert alert-success hide successMessageModal">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Your enquiry has been successfully sent.
                </div>
                <div class="alert alert-danger hide failureMessageModal">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Oops!</strong> Please try again.
                </div>
                <div class="enquiry-form"> <?php
                    echo $this->Form->create('Job', array(
                        'id' => 'modal_enquiry_form',
                        'enctype' => "multipart/form-data",
                        'type' => 'post',
                        'name' => 'Job',
                        'url' => array(
                            "controller" => 'jobs',
                            "action" => "modal_quick_enquiry"
                        ),
                        'novalidate' => true
                    ));
                    echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden')); ?>
                    <div id="success_message"></div>
                    <ul class="enqform">
                        <li> <?php
                            echo $this->Form->input('name', array(
                                'placeholder' => 'Name*',
                                'id' => 'ModalName', 
                                'type' => 'text', 
                                'label' => false, 
                                'div' => false, 
                                'class' => 'fix-50')
                            ); ?>
                            <span class="nameErrorModal text-danger"></span>
                        </li>
                        <li> <?php
                            echo $this->Form->input('email', array(
                                'placeholder' => 'Email*',
                                'id' => 'ModalEmail',
                                'type' => 'text', 
                                'label' => false, 
                                'div' => false, 
                                'class' => 'fix-50')
                            ); ?>
                            <span class="emailErrorModal text-danger"></span>
                        </li>
                    </ul>
                    <ul class="enqform">
                        <li> <?php
                            echo $this->Form->input('phone', array(
                                'placeholder' => 'Phone',
                                'id' => 'ModalPhone', 
                                'type' => 'text', 
                                'label' => false, 
                                'div' => false, 
                                'class' => 'fix-50')
                            ); ?>
                            <span class="phoneErrorModal text-danger"></span>
                        </li>
                        <li> <?php
                            echo $this->Form->input('job_category_id', array(
                                'options' => array(
                                    '4' => 'Care & Support',
                                    '5' => 'Supported Employment',
                                    '7' => 'Graduate Opportunity',
                                    '6' => 'Other Positions',
                                    ),
                                'label' => false, 
                                'div' => false,
                                'id' => 'ModalCategory', 
                                'class' => 'fix-50')
                            ); ?>
                        </li>
                    </ul> <?php
                    echo $this->Form->textarea('comments', array(
                        'cols' => 1, 
                        'rows' => 6,
                        'id' => 'ModalComment', 
                        'placeholder' => 'Comments')
                    ); ?>
                    <div class="custom_file_upload">
                        <input type="text" class="file" name="file_info" id="file_info" value="" disabled>
                        <div class="file_upload"> <?php
                            echo $this->Form->input('cv_upload', array(
                                'type' => 'file', 
                                'div' => false, 
                                'label' => false, 
                                'class' => 'cvfile', 
                                'id' => 'cvF')
                            ); ?>
                        </div>
                    </div>
                    <span class="fileErrorModal text-danger"></span>
                    <div id="checkbx">
                        <label class="chkbox-col" style="display: inline"> <?php
                            echo $this->Form->checkbox('request', array('id' => 'ModalRequest')); ?>
                            <span>Request call back</span></label><br/>
                    </div>
            
                    <div class="captcha-row"><p>Please tick the box below <strong>I'm not a robot</strong> and click on SUBMIT</p>
                        <div id="RecaptchaField2"></div>
                        <span class="captchaErrorModal text-danger"></span>
                    </div>
                    <div class="red-btn-outer light-blue-btn radius-5px"> <?php
                        echo $this->Form->button('Submit', array(
                            'type' => 'submit', 
                            'class' => 'red-btn radius-5px', 
                            'id' => 'enqSub')
                        ); ?>
                    </div> <?php 
                    echo $this->Form->end(); ?>              
                </div>
            </div>
        </div>
    </div>
</div>
<!-- *******************ENQUIRY FORM MODAL END *******************************-->

<div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'],array('alt' => 'disability Support Workers')); ?>
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
                <a href="<?php echo Router::url('/come-join-us/', true); ?>" property="item" typeof="WebPage"><span property="name">Come Join Us</span></a>
                <meta property="position" content="2">
            </li>
        </ul>
        <?php
        // $this->Html->addCrumb('Come Join Us', array('controller' => 'pages', 'action' => 'jobs'));
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
            <?php echo $this->Session->flash(); ?>
            <div class="page-left">
                <div class="common-title">
                    <h3><?php echo $page_details['Page']['title']; ?></h3>
                </div>
                <?php echo $page_details['Page']['description']; ?>
                <div class="job-with-us">
                    <ul class="tabs-list">
                        <li class="active"><a data-toggle="tab" href="#support-work">Care & Support</a></li>
                        <li><a data-toggle="tab" href="#supported-employment">Supported Employment</a></li>
                        <li><a data-toggle="tab" href="#graduate-oppurtunity">Graduate Opportunity</a></li>
                        <li><a data-toggle="tab" href="#Other">Other Positions</a></li>
                    </ul>
                    <div class="tabs-content-row">
                        <div class="support-work">
                            <div class="tab-content">
                                <!--*********** START ********-->
                                <div id="support-work" class="tab-pane fade in active">
                                    <div class="content-inner"> <?php
                                        foreach($swj as $key => $value) {  ?>
                                            <div class="support-work-col">
                                                <h4><?php echo $value['JobUpload']['title']; ?></h4>
                                                <p><?php echo $value['JobUpload']['description']; ?></p>
                                                <div class="support-work-btn">
                                                    <a href="javascript:void(0)" class="solid-red-btn radius-5px upload_cv_button"  data-target="#enquiry-modal" jobCategory="care" type="button" data-toggle="modal">Upload CV</a>
                                                    <div class="job-content fullContent" id="<?php echo 'jcon'.$value['JobUpload']['id']; ?>">
                                                        <h4><strong><?php echo $value['JobUpload']['title']; ?></strong></h4>
                                                        <p><?php echo $value['JobUpload']['description']; ?></p>
                                                    </div>
                                                </div>
                                            </div> <?php
                                        } ?>
                                    </div>
                                </div>
                                <div id="supported-employment" class="tab-pane fade">
                                    <div class="content-inner"> <?php
                                        foreach($sej as $key => $value) { ?>
                                            <div class="support-work-col">
                                                <h4><?php echo $value['JobUpload']['title']; ?></h4>
                                                <p><?php echo $value['JobUpload']['description']; ?></p>
                                                <div class="support-work-btn">
                                                    <a href="javascript:void(0)" class="solid-red-btn radius-5px upload_cv_button"  data-target="#enquiry-modal" jobCategory="support" type="button" data-toggle="modal">Upload CV</a>
                                                    <div class="job-content fullContent" id="<?php echo 'jcon'.$value['JobUpload']['id']; ?>">
                                                        <h4><strong><?php echo $value['JobUpload']['title']; ?></strong></h4>
                                                        <p><?php echo $value['JobUpload']['description']; ?></p>
                                                    </div>
                                                </div>
                                            </div> <?php
                                        } ?>
                                    </div>
                                </div>
                                <div id="graduate-oppurtunity" class="tab-pane fade">
                                    <div class="content-inner"> <?php
                                        foreach($goj as $key => $value) {  ?>
                                            <div class="support-work-col">
                                                <h4><?php echo $value['JobUpload']['title']; ?></h4>
                                                <p><?php echo $value['JobUpload']['description']; ?></p>
                                                <div class="support-work-btn">
                                                    <a href="javascript:void(0)" class="solid-red-btn radius-5px upload_cv_button"  data-target="#enquiry-modal" jobCategory="graduate" type="button" data-toggle="modal">Upload CV</a>
                                                    <div class="job-content fullContent" id="<?php echo 'jcon'.$value['JobUpload']['id']; ?>">
                                                        <h4><strong><?php echo $value['JobUpload']['title']; ?></strong></h4>
                                                        <p><?php echo $value['JobUpload']['description']; ?></p>
                                                    </div>
                                                </div>
                                            </div> <?php
                                        } ?>
                                    </div>
                                </div>
                                <div id="Other" class="tab-pane fade">
                                    <div class="content-inner"> <?php
                                        foreach($oj as $key => $value) { ?>
                                            <div class="support-work-col">
                                                <h4><?php echo $value['JobUpload']['title']; ?></h4>
                                                <p><?php echo $value['JobUpload']['description']; ?></p>
                                                <div class="support-work-btn">
                                                    <a href="javascript:void(0)" class="solid-red-btn radius-5px upload_cv_button"  data-target="#enquiry-modal" jobCategory="other" type="button" data-toggle="modal">Upload CV</a>
                                                    <div class="job-content fullContent" id="<?php echo 'jcon'.$value['JobUpload']['id']; ?>">
                                                        <h4><strong><?php echo $value['JobUpload']['title']; ?></strong></h4>
                                                        <p><?php echo $value['JobUpload']['description']; ?></p>
                                                    </div>
                                                </div>
                                            </div> <?php
                                        } ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
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
<?php echo $this->start("footer_js"); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".upload_cv_button").click(function(){
            if($(this).attr("jobcategory") == "care") {
                $("select#ModalCategory").val("4");
            } else if($(this).attr("jobcategory") == "support") {
                $("select#ModalCategory").val("5");
            } else if($(this).attr("jobcategory") == "other") {
                $("select#ModalCategory").val("6");   
            } else if($(this).attr("jobcategory") == "graduate") {
                $("select#ModalCategory").val("7");   
            }
            //return false;
        })
    });
</script>
<?php echo $this->end(); ?>
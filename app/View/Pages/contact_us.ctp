<script type="text/javascript">
    var CaptchaCallback = function(){
        grecaptcha.render('RecaptchaField3', {'sitekey' : '6LcyxSQTAAAAAHrTerraVu4qQ7aExQu9i6ckdwp5'});
        grecaptcha.render('RecaptchaField4', {'sitekey' : '6LcyxSQTAAAAAHrTerraVu4qQ7aExQu9i6ckdwp5'});
        grecaptcha.render('RecaptchaField5', {'sitekey' : '6LcyxSQTAAAAAHrTerraVu4qQ7aExQu9i6ckdwp5'});
    };
</script>
<script src="//www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script> <?php
echo $this->Html->css(array(
    'captcha/style.css',
)); ?>

<div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'], array(
        'alt' => 'contact disability Support services')); ?>
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
                <a href="<?php echo Router::url('/just-contact-us/', true); ?>" property="item" typeof="WebPage"><span property="name">Just Contact Us</span></a>
                <meta property="position" content="2">
            </li>
        </ul>
        <?php
        // $this->Html->addCrumb('Just Contact Us', array(
        //     'controller' => 'pages', 
        //     'action' => 'contact_us'
        // ));
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
                <div class="common-title"><h3>Just Contact Us</h3></div>
                <div class="contact-row margin-bot-45">
                    <div class="row" itemscope itemtype="https://schema.org/Organization">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="contact-col radius-2px">
                                <h3 itemprop="name">Frontier Support Services</h3>
                                <div class="contact-info" id="fs_service_address">
                                    <?php echo $fs_support_address["Setting"]["value"]; ?>
                                </div>
                                <div class="map-col">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2491.2750631863164!2d-0.10002538474366028!3d51.36123982920112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876074c477d14ed%3A0xdcfd622922c3c908!2s29+Brighton+Rd%2C+South+Croydon%2C+Greater+London+CR2+6EB%2C+UK!5e0!3m2!1sen!2sin!4v1451393773959"  allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="contact-col radius-2px" itemprop="subOrganization" itemscope itemtype="https://schema.org/Organization">
                                <h3 itemprop="name">Buzzz Hub</h3>
                                <div class="contact-info" id="buzz_hub_address">
                                    <?php echo $buzz_hub_address["Setting"]["value"]; ?>
                                </div>
                                <div class="map-col">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2491.1165014450903!2d-0.10127408474350634!3d51.36415492898839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876074bdfad4ae5%3A0x1ad0615ebd87f2dc!2s96D+S+End%2C+Croydon%2C+Greater+London+CR0+1DQ%2C+UK!5e0!3m2!1sen!2sin!4v1451394023692" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="direction-row margin-bot-30">
                    <div class="direction-title-outer">
                        <span class="direction-title">Directions :<?php echo $this->Html->image('/assets/frontier/img/arrow.png',array('alt'=>'')); ?></span>
                    </div>
                    <div class="direction-col">
                        <h4>Head Office :</h4>
                        <?php echo Configure::read('HeadOfficeDirections'); ?>
                    </div>
                    <div class="direction-col">
                        <h4>Buzzz Hub :</h4>
                        <?php echo Configure::read('BuzzzHubDorection'); ?>
                    </div>
                </div>
                <div class="contact-tabs">
                    <div class="contact-tabs-row">
                        <span class="req-tetx">(*=Required fields)</span>
                        <ul class="tabs-list">
                            <li class="active"><a href="#support-work" data-toggle="tab">General Enquiries</a></li>
                            <li><a href="#Other" data-toggle="tab">Clinical Enquiries</a></li>
                            <li><a href="#supported-employment" data-toggle="tab">Buzzz Enquiries</a></li>
                        </ul>
                    </div>
                    <div class="tabs-content-row">
                        <div class="support-work">
                            <div class="tab-content">
                                <div class="alert alert-success hide successMessage">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong> Your enquiry has been submitted successfully.
                                </div>
                                <div class="alert alert-danger hide failureMessage">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Oops!</strong> Please try again.
                                </div>
                                <div class="tab-pane fade in active" id="support-work">
                                    <div class="content-inner"> <?php
                                        echo $this->Form->create('Job', array(
                                            'class' => 'sidebar-form contact-form',
                                            'type' => 'post',
                                            'id' => 'contact_form',
                                            'url' => array(
                                                "action" => "quick_enquiry"
                                            ),
                                            'novalidate' => true
                                        )); 
                                        echo $this->Form->input('Data.referer', array(
                                            'value' => $referer,
                                            'class' => 'form-control',
                                            'type' => 'hidden'
                                        ));
                                        echo $this->Session->flash(); ?>
                                        <div class="form-content">
                                            <div class="row contact-form-row">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <ul>
                                                        <li> <?php
                                                            echo $this->Form->input('name', array(
                                                                'placeholder' => 'Name*',
                                                                'type' => 'text',
                                                                'label' => false,
                                                                'div' => false
                                                            )); ?>
                                                            <span class="gen_nameError text-danger"></span>
                                                        </li>
                                                        <li> <?php
                                                            echo $this->Form->input('email', array(
                                                                'placeholder' => 'Email*',
                                                                'type' => 'email',
                                                                'label' => false,
                                                                'div' => false
                                                            )); ?>
                                                            <span class="gen_emailError text-danger"></span>
                                                        </li>
                                                        <li> <?php
                                                            echo $this->Form->input('phone', array(
                                                                'placeholder' => 'Phone',
                                                                'type' => 'text',
                                                                'label' => false, 
                                                                'div' => false
                                                            )); ?>
                                                            <span class="gen_phoneError text-danger"></span>
                                                        </li>
                                                        <li> <?php
                                                            echo $this->Form->input('company', array(
                                                                'placeholder' => 'Company Name',
                                                                'type' => 'text',
                                                                'label' => false,
                                                                'div' => false
                                                            )); ?>
                                                            <span class="gen_companyError text-danger"></span>
                                                        </li>
                                                        <li>
                                                            <div class="captcha-row">
                                                                <span>Please tick the box below <strong>I'm not a robot</strong> and click on SUBMIT</span>
                                                                <div id="RecaptchaField3"></div>
                                                                <span class="gen_captchaError text-danger" style="color: #a94442"></span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <ul>
                                                        <li> <?php
                                                            echo $this->Form->textarea('comments', array(
                                                                'cols' => 1,
                                                                'rows' => 2,
                                                                'placeholder' => 'Comments'
                                                            )); ?>
                                                        </li>
                                                        <li>
                                                            <label class="chkbox-col" style="display: inline"> <?php
                                                                echo $this->Form->checkbox('request', array()); ?>
                                                                <span>Request call back</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="chkbox-col" style="display: inline"> <?php
                                                                echo $this->Form->checkbox('newsletter', array()); ?>
                                                                <span>Subscribe to our Newsletter</span>
                                                            </label>
                                                        </li>
                                                        <li> <?php
                                                            echo $this->Form->input('job_category_id', array(
                                                                'value' => 1,
                                                                'class' => 'form-control',
                                                                'type' => 'hidden'
                                                            ));?>
                                                            <div class="red-btn-outer light-blue-btn radius-5px"> <?php
                                                                echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'red-btn radius-2px')); ?>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> <?php
                                        echo $this->Form->end(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Other">
                                    <div class="content-inner"> <?php
                                        echo $this->Form->create('Job', array(
                                            'class' => 'sidebar-form contact-form',
                                            'type' => 'post',
                                            'id' => 'contact_form1',
                                            'url' => array(
                                                "action" => "quick_enquiry"
                                            ),
                                            'novalidate' => true
                                        )); 
                                        echo $this->Form->input('Data.referer', array(
                                            'value' => $referer,
                                            'class' => 'form-control',
                                            'type' => 'hidden'
                                        ));
                                        echo $this->Session->flash(); ?>
                                        <div class="form-content">
                                            <div class="row contact-form-row">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <ul>
                                                        <li> <?php
                                                            echo $this->Form->input('name', array(
                                                                'placeholder' => 'Name*',
                                                                'type' => 'text',
                                                                'label' => false,
                                                                'div' => false,
                                                                'id' => 'cli_name'
                                                            )); ?>
                                                            <span class="cli_nameError text-danger"></span>
                                                        </li>
                                                        <li> <?php
                                                            echo $this->Form->input('email', array(
                                                                'placeholder' => 'Email*',
                                                                'type' => 'email',
                                                                'label' => false,
                                                                'div' => false,
                                                                'id' => 'cli_email'
                                                            )); ?>
                                                            <span class="cli_emailError text-danger"></span>
                                                        </li>
                                                        <li> <?php
                                                            echo $this->Form->input('phone', array(
                                                                'placeholder' => 'Phone',
                                                                'type' => 'text',
                                                                'label' => false, 
                                                                'div' => false,
                                                                'id' => 'cli_phone'
                                                            )); ?>
                                                            <span class="cli_phoneError text-danger"></span>
                                                        </li>
                                                        <li> <?php
                                                            echo $this->Form->input('company', array(
                                                                'placeholder' => 'Company Name',
                                                                'type' => 'text',
                                                                'label' => false,
                                                                'div' => false,
                                                                'id' => 'cli_company'
                                                            )); ?>
                                                            <span class="cli_companyError text-danger"></span>
                                                        </li>
                                                        <li>
                                                            <div class="captcha-row">
                                                                <span>Please tick the box below <strong>I'm not a robot</strong> and click on SUBMIT</span>
                                                                <div id="RecaptchaField4"></div>
                                                                <span class="cli_captchaError text-danger" style="color: #a94442"></span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <ul>
                                                        <li> <?php
                                                            echo $this->Form->textarea('comments', array(
                                                                'cols' => 1,
                                                                'rows' => 2,
                                                                'placeholder' => 'Comments', 
                                                                'id' => 'cli_comment'
                                                            )); ?>
                                                        </li>
                                                        <li>
                                                            <label class="chkbox-col" style="display: inline"> <?php
                                                                echo $this->Form->checkbox('request', array(
                                                                    'id' => 'cli_request'
                                                                )); ?>
                                                                <span>Request call back</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="chkbox-col" style="display: inline"> <?php
                                                                echo $this->Form->checkbox('newsletter', array(
                                                                    'id' => 'cli_newsletter'
                                                                )); ?>
                                                                <span>Subscribe to our Newsletter</span>
                                                            </label>
                                                        </li>
                                                        <li> <?php
                                                            echo $this->Form->input('job_category_id', array(
                                                                'value' => 2,
                                                                'class' => 'form-control',
                                                                'type' => 'hidden'
                                                            )); ?>
                                                            <div class="red-btn-outer light-blue-btn radius-5px"> <?php
                                                                echo $this->Form->button('Submit', array(
                                                                    'type' => 'submit',
                                                                    'class' => 'red-btn radius-2px'
                                                                )); ?>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> <?php
                                        echo $this->Form->end(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="supported-employment">
                                    <div class="more-jobs-col"> <?php
                                        echo $this->Form->create('Job', array(
                                            'class' => 'sidebar-form contact-form',
                                            'type' => 'post',
                                            'id' => 'contact_form2',
                                            'url' => array(
                                                "action" => "quick_enquiry"
                                            ),
                                            'novalidate' => true
                                        )); 
                                        echo $this->Form->input('Data.referer', array(
                                            'value' => $referer,
                                            'class' => 'form-control',
                                            'type' => 'hidden'
                                        ));
                                        echo $this->Session->flash(); ?>
                                        <div class="form-content">
                                            <div class="row contact-form-row">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <ul>
                                                        <li> <?php
                                                            echo $this->Form->input('name', array(
                                                                'placeholder' => 'Name*',
                                                                'type' => 'text',
                                                                'label' => false,
                                                                'div' => false,
                                                                'id' => 'buzz_name'
                                                            )); ?>
                                                            <span class="buz_nameError text-danger"></span>
                                                        </li>
                                                    <li> <?php
                                                        echo $this->Form->input('email', array(
                                                            'placeholder' => 'Email*',
                                                            'type' => 'email',
                                                            'label' => false,
                                                            'div' => false,
                                                            'id' => 'buzz_email'
                                                        )); ?>
                                                        <span class="buz_emailError text-danger"></span>
                                                    </li>
                                                    <li> <?php
                                                        echo $this->Form->input('phone', array(
                                                            'placeholder' => 'Phone',
                                                            'type' => 'text',
                                                            'label' => false,
                                                            'div' => false,
                                                            'id' => 'buzz_phone'
                                                        )); ?>
                                                        <span class="buz_phoneError text-danger"></span>
                                                    </li>
                                                    <li> <?php
                                                        echo $this->Form->input('company', array(
                                                            'placeholder' => 'Company Name',
                                                            'type' => 'text',
                                                            'label' => false,
                                                            'div' => false,
                                                            'id' => 'buzz_company'
                                                        )); ?>
                                                        <span class="buz_companyError text-danger"></span>
                                                    </li>
                                                    <li>
                                                        <div class="captcha-row">
                                                            <span>Please tick the box below <strong>I'm not a robot</strong> and click on SUBMIT</span>
                                                            <div id="RecaptchaField5"></div>
                                                            <span class="buz_captchaError text-danger" style="color: #a94442"></span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <ul>
                                                    <li> <?php
                                                        echo $this->Form->textarea('comments',array(
                                                            'cols' => 1,
                                                            'rows' => 2,
                                                            'placeholder' => 'Comments',
                                                            'id' => 'buzz_comment'
                                                        )); ?>
                                                    </li>
                                                    <li>
                                                        <label class="chkbox-col" style="display: inline"> <?php
                                                            echo $this->Form->checkbox('request', array(
                                                                'id' => 'buz_request'
                                                            )); ?>
                                                            <span>Request call back</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="chkbox-col" style="display: inline"> <?php
                                                            echo $this->Form->checkbox('newsletter', array(
                                                                'id' => 'buzz_newsletter'
                                                            )); ?>
                                                            <span>Subscribe to our Newsletter</span>
                                                        </label>
                                                    </li>
                                                    <li> <?php
                                                        echo $this->Form->input('job_category_id', array(
                                                            'value' => 3,
                                                            'class' => 'form-control',
                                                            'type' => 'hidden'
                                                        ));?>
                                                        <div class="red-btn-outer light-blue-btn radius-5px"> <?php
                                                            echo $this->Form->button('Submit', array(
                                                                'type' => 'submit',
                                                                'class' => 'red-btn radius-2px'
                                                            )); ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> <?php
                                    echo $this->Form->end(); ?>
                                </div>
                            </div>
                            <i class="fa fa-refresh fa-spin load_image hide" id="load_image"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <aside class="col-md-4 col-sm-5 col-xs-12">
        <div class="page-sidebar">
            <?php echo $this->element("frontier/sidebar-about-us"); ?>
            <?php echo $this->element("frontier/our-services"); ?>
        </div>
    </aside>
</div>
</div>

<?php echo $this->start("footer_js"); ?>
<script type="text/javascript">
    $(document).ready(function() {
        <?php
        if(isset($this->request->query['category']) && !empty($this->request->query['category'])) {
            if($this->request->query['category'] == "genq") { ?>
                $('ul.tabs-list li').eq(0).addClass('active');
                $("html, body").animate({scrollTop: 1250}); <?php
            } 
            if($this->request->query['category'] == "cenq") { ?>
                $('ul.tabs-list li').eq(1).addClass('active');
                $('ul.tabs-list li').eq(0).removeClass('active');
                $('div#Other').addClass('active in');
                $('div#support-work').removeClass('active in');
                $('div#supported-employment').removeClass('active in');
                $("html, body").animate({scrollTop: 1250}); <?php 
            }
            if($this->request->query['category'] == "benq") { ?>
                $('ul.tabs-list li').eq(2).addClass('active');
                $('ul.tabs-list li').eq(0).removeClass('active');
                $('div#supported-employment').addClass('active in');
                $('div#support-work').removeClass('active in');
                $('div#Other').removeClass('active in');
                $("html, body").animate({scrollTop: 1500}); <?php
            }
        }
        ?>
        
        // $("#fs_service_address").find("p:nth(0)").attr("itemprop", "streetAddress");
        // $("#fs_service_address").find("p:nth(1)").attr("itemprop", "addressLocality");
        // $("#fs_service_address").find("p:nth(2)").attr("itemprop", "addressRegion");
        // $("#fs_service_address").find("p:nth(3)").attr("itemprop", "postalCode");
        // $("#fs_service_address").find("p:nth(4) span").attr("itemprop", "telephone");
        
        // $("#buzz_hub_address").find("p:nth(0)").attr("itemprop", "streetAddress");
        // $("#buzz_hub_address").find("p:nth(1)").attr("itemprop", "addressLocality");
        // $("#buzz_hub_address").find("p:nth(2)").attr("itemprop", "addressRegion");
        // $("#buzz_hub_address").find("p:nth(3)").attr("itemprop", "postalCode");
        // $("#buzz_hub_address").find("p:nth(4) span").attr("itemprop", "telephone");
    });
</script>
<?php echo $this->end(); ?>
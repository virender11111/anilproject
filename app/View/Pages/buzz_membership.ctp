<script src="https://www.google.com/recaptcha/api.js"></script> <?php
echo $this->Html->css(array('captcha/style.css')); ?>
<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
    <div class="buzz-right-page buzz-inner-page">
        <div class="common-title buzz-common-title">
            <h3>Buzzz Membership</h3>
        </div>
        <div class="brokerage-article"> <?php
            echo $page_details['Page']['description']; ?>
            <div class="buzz-contact-form">
                <div class="contact-tabs-row"><span class="req-tetx">(*=Required fields)</span></div>
                <div class="tabs-content-row"> <?php
                    echo $this->Form->create('Job', array(
                        'class' => 'sidebar-form contact-form',
                        'type' => 'post',
                        'id' => 'contact_form',
                        'url' => array(
                            "action" => "quick_enquiry"),
                        'novalidate' => true
                    )); 
                    echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden')); ?>
                    <?php echo $this->Session->flash(); ?>
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
                                        <span class="nameError text-danger"></span>
                                    </li>
                                    <li> <?php
                                        echo $this->Form->input('email', array(
                                            'placeholder' => 'Email*',
                                            'type' => 'email',
                                            'label' => false,
                                            'div' => false
                                        )); ?>
                                        <span class="emailError text-danger"></span>
                                    </li>
                                    <li> <?php
                                        echo $this->Form->input('phone', array(
                                            'placeholder' => 'Phone*',
                                            'type' => 'text',
                                            'label' => false,
                                            'div' => false
                                        )); ?>
                                        <span class="phoneError text-danger"></span>
                                    </li>
                                    <li> <?php
                                        echo $this->Form->input('company', array(
                                            'placeholder' => 'Company Name',
                                            'type' => 'text',
                                            'label' => false,
                                            'div' => false
                                        )); ?>
                                        <span class="companyError text-danger"></span>
                                    </li>
                                    <li>
                                        <div class="captcha-row">
                                            <span>Please tick the box below <strong>I'm not a robot</strong> and click on SUBMIT</span>
                                            <div class="g-recaptcha" data-sitekey="6LfHRBQTAAAAAINtUl0sdKz4aNY-vaBXVnSmpla_"></div>
                                            <span class="captchaError text-danger" style="color: #a94442"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <ul>
                                    <li> <?php
                                        echo $this->Form->textarea('comments', array(
                                            'cols' => 1,
                                            'rows' => 1,
                                            'placeholder' => 'Comments'
                                        )); ?>
                                    </li>
                                    <li>
                                        <label class="chkbox-col" style="display: inline"> <?php
                                            echo $this->Form->checkbox('request', array('value' => 1)); ?>
                                            <span>Request call back</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="chkbox-col" style="display: inline"> <?php
                                            echo $this->Form->checkbox('newsletter', array('value' => 1)); ?>
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
                                            echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'red-btn radius-5px')); ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> <?php
                    echo $this->Form->end();
                    unset($_SESSION['errors']); ?>
                </div>
            </div>          
        </div>
    </div>
</div>
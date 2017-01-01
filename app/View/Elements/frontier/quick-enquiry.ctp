<?php
echo $this->Form->create('Job', array(
    'class' => 'sidebar-form',
    'type' => 'post',
    'id' => 'quick_enquiry_form',
    'name' => 'Job',
    'url' => array(
        "action" => "quick_enquiry"
    ),
    'novalidate' => true
)); ?>

<div class="sidebar-title radius-3px">Quick Enquiry</div>
    <div class="form-content">
        <?php echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));?>
        <div class="alert alert-success hide successMessage">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Your enquiry has been submitted successfully.
        </div>
        <div class="alert alert-danger hide failureMessage">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Oops!</strong> Please try again.
        </div>
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
                    'placeholder' => 'Phone',
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
            <li> <?php
                echo $this->Form->input('job_category_id', array(
                    'options' => array(
                        '1' => 'General Enquiry',
                        '2' => 'Clinical Enquiry',
                        '3' => 'Buzzz Enquiry'
                    ), 
                    'empty' => 'Select one', 
                    'label' => false, 
                    'div' => false
                )); ?> 
                <span class="categoryError text-danger"></span>
            </li>
            <li> <?php
                echo $this->Form->textarea('comments', array(
                    'cols' => 1,
                    'rows' => 1,
                    'placeholder' => 'Comments'
                )); ?>
            </li>
            <li>
                <label class="chkbox-col" style="display: inline"> <?php
                    echo $this->Form->checkbox('request', array()); ?><span>Request call back</span></label>
            </li>
            <li>
                <label class="chkbox-col" style="display: inline"> <?php
                    echo $this->Form->checkbox('newsletter', array()); ?><span>Subscribe to our Newsletter</span></label>
            </li>
            <li>
                <div class="captcha-row">
                    <span>Please tick the box below <strong>I'm not a robot</strong> and click on SUBMIT</span> <?php
                    if($this->request->params["action"] == "jobs") { ?>
                        <div id="RecaptchaField1"></div> <?php
                    } else { ?>
                        <div class="g-recaptcha" data-sitekey="6LcyxSQTAAAAAHrTerraVu4qQ7aExQu9i6ckdwp5"></div> <?php
                    } ?>
                    <span class="captchaError text-danger"></span>
                </div>
            </li>
            <li>
                <div class="red-btn-outer light-blue-btn radius-5px"> <?php
                    echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'red-btn radius-5px')); ?>
                </div>
                <i class="fa fa-refresh fa-spin load_image hide"></i>
            </li>
        </ul>
    </div> <?php
echo $this->Form->end();

echo $this->start('footer_js');
if($this->request->params["action"] == "jobs") { ?>
    <script type="text/javascript">
        var CaptchaCallback = function(){
            grecaptcha.render('RecaptchaField1', {'sitekey' : '6LcyxSQTAAAAAHrTerraVu4qQ7aExQu9i6ckdwp5'});
            grecaptcha.render('RecaptchaField2', {'sitekey' : '6LcyxSQTAAAAAHrTerraVu4qQ7aExQu9i6ckdwp5'});
        };
    </script>
    <script src="//www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script> <?php
} else { ?>
    <script src="https://www.google.com/recaptcha/api.js"></script> <?php
} ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#quick_enquiry_form").submit(function(event) {
            event.preventDefault();
            $("span.text-danger").text("");
            var status = true;
            var email_regex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
            var phone_regex = /^[0-9- ]*$/;
            if(!$("#JobName").val()) {
                $('.nameError').text('This field cannot be left blank.');
                status = false;
            } else if(/^[a-zA-Z ]*$/.test($("#JobName").val()) == false) {
                $('.nameError').text('Please provide a valid name.');
                status = false;
            }
            if(!$("#JobEmail").val()) {
                $('.emailError').text('This field cannot be left blank.');
                status = false;
            } else if(!email_regex.test($("#JobEmail").val())) {
                $('.emailError').text('Please provide a valid email address.');
                status = false;
            }
            if(!$("#JobJobCategoryId").val()) {
                $('.categoryError').text('Please choose a category.');
                status = false;
            }
            if($("#JobRequest").is(":checked") && !$("#JobPhone").val()) {
                $('.phoneError').text('This field cannot be left blank.');
                status = false;
            }
            if($("#JobPhone").val()) {
                if(!phone_regex.test($("#JobPhone").val())) {
                    $('.phoneError').text('Please provide a valid phone number.');
                    status = false;
                }
            }
            if(!$("#g-recaptcha-response").val()) {
                $('.captchaError').text('Captcha could not be verify.');
                status = false;
            }

            if(status) {
                $.ajax({url: $(this).attr("action"), data: $(this).serialize(), dataType: "json",
                method: "POST"}).done(function (response) {
                    $(".load_image").removeClass("hide");
                    if (response.status) {
                        $(".load_image").addClass("hide");
                        $(".successMessage").removeClass("hide");
                        $(".successMessage").fadeTo(6000, 6000).slideUp(500, function(){
                          $(".successMessage").slideUp(6000);
                        });
                        $(".text-danger").text('');
                        $("#quick_enquiry_form")[0].reset()
                    } else {
                        $(".load_image").addClass("hide");
                        $(".failureMessage").removeClass("hide");
                        $(".failureMessage").fadeTo(6000, 6000).slideUp(500, function(){
                          $(".failureMessage").slideUp(6000);
                        });
                        $(".text").text('');
                    }
                })
            }
        });
    })
</script>

<?php echo $this->end(); ?>
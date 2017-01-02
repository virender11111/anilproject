<?php //pr($dataValidate['cv_upload']['0']); ?>
<?php 
      echo $this->Html->css(array(
'/assets/frontier/css/reset.css',
'/assets/frontier/bootstrap/css/bootstrap.css',
'/assets/frontier/plugins/owl-carousel-2.0/assets/owl.carousel.css',
'/assets/frontier/plugins/li-scroller/li-scroller.css',
'/assets/frontier/plugins/slicknav-master/slicknav.css',
'/assets/frontier/css/style.css',
'/assets/frontier/css/responsive.css'

)
); ?>
<script type="text/javascript">
var CaptchaCallback = function(){
        //grecaptcha.render('RecaptchaField1', {'sitekey' : '6LfHRBQTAAAAAINtUl0sdKz4aNY-vaBXVnSmpla_'});
        grecaptcha.render('RecaptchaField2', {'sitekey' : '6LfHRBQTAAAAAINtUl0sdKz4aNY-vaBXVnSmpla_'});
    };
</script>
<script src="//www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>

<?php echo $this->Session->flash(); ?>
<div class="enquiry-form"> <?php
              echo $this->Form->create('Job', array(
                'id' => 'enqForm',
                'enctype' => "multipart/form-data",
                'type' => 'post',
                'name' => 'Job',
                'url' => array(
                  "action" => "enquiry_modal"),
                'novalidate' => true
              ));

              /*echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));*/ ?>
              <ul class="enqform">
                <li>
                  <?php
                  echo $this->Form->input('name', array('placeholder' => 'Name*', 'type' => 'text', 'label' => false, 'div' => false, 'class' => 'fix-50')); ?>
                </li>
                <li>
                  <?php
                  echo $this->Form->input('email', array('placeholder' => 'Email*', 'type' => 'text', 'label' => false, 'div' => false, 'class' => 'fix-50')); ?>
                </li>
              </ul>

              <ul class="enqform">
                <li>
                  <?php
                    echo $this->Form->input('phone', array('placeholder' => 'Phone', 'type' => 'text', 'label' => false, 'div' => false, 'class' => 'fix-50')); ?>
                </li>
                <li>
                  <?php
                    echo $this->Form->input('job_category_id', array('options' => array(
                      '4' => 'Care & Support',
                      '5' => 'Supported Employment',
                      '6' => 'Other Positions'), 'label' => false, 'div' => false, 'class' => 'fix-50')); ?>
                </li>
              </ul>
              <?php
              echo $this->Form->textarea('comments', array('cols' => 1, 'rows' => 6, 'placeholder' => 'Comments', 'value' => '', 'value' => '')); ?>

              <div class="custom_file_upload">
                <input type="text" class="file" name="file_info" id="file_info" value="">
                <div class="file_upload">
                  <!--<input type="file" id="file_upload" name="file_upload">--><?php
                  echo $this->Form->input('cv_upload', array('type' => 'file', 'div' => false, 'label' => false, 'class' => 'cvfile', 'id' => 'cvF')); ?>
                </div>
                <div class="fileError" style="display: inline; float: right; margin-right: 25px; color: red"> <?php
                  if(isset($dataValidate['cv_upload'])) {
                    echo $dataValidate['cv_upload']['0'];
                  } ?>                  
                </div>
              </div>

              <div id="checkbx">
                <label class="chkbox-col" style="display: inline"> <?php
                  echo $this->Form->checkbox('request', array()); ?>
                  <span>Request call back</span></label><br/>
                
                <!--<label class="chkbox-col" style="display: inline"> <?php
                  //echo $this->Form->checkbox('newsletter', array()); ?>
                  <span>Suscribe to our Newsletter</span></label>-->
              </div>
                
            <div class="captcha-row"><p>Please tick the box below <strong>I'm not a robot</strong> and click on SUBMIT</p>
            <div id="RecaptchaField2"></div>
            <div class="error-message"><?php echo (isset($dataValidate['g-recaptcha-response'][0])) ? $dataValidate['g-recaptcha-response'][0]:'';?></div></div>

            <div class="red-btn-outer light-blue-btn radius-5px"> <?php
              //echo $this->Form->input('job_upload_id', array('type' => 'hidden', 'value' => '', 'id' => 'job_upload_id')); 
              echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'red-btn radius-5px', 'id' => 'enqSub')); ?>
            </div>

            <?php echo $this->Form->end(); ?>
              <!--<form>
                  <input type="text" placeholder="Name" class="fix-50">
                    <input type="Email" placeholder="Email" class="fix-50">
                    <input type="text" placeholder="Phone" class="fix-50">
                    <select class="fix-50">
                      <option>General Enquiry</option>
                    </select>
                    <textarea placeholder="Comments"></textarea>
                    <div class="custom_file_upload">
                      <input type="text" class="file" name="file_info">
                      <div class="file_upload">
                        <input type="file" id="file_upload" name="file_upload">
                      </div>
                    </div>-->
                    <!--<li>
                      <label class="chkbox-col" style="display: inline"> <?php
                        //echo $this->Form->checkbox('request', array('value' => 1)); ?>
                        <span>Request call back</span></label>
                    </li>-->
                    <!--<label class="chkbox-col" style="display: inline">
                      <input type="checkbox">
                      <span>Request call back</span></label><br/>
                    <label class="chkbox-col" style="display: inline">
                      <input type="checkbox">
                      <span>Suscribe to our Newsletter</span></label>-->

                    <!--<input type="checkbox"><label>Request call back</label><br>-->

                    <!--<input type="checkbox"><label>Suscribe to our Newsletter</label>-->
                    <!--<p>Please tick the box below <strong>I'm not a robot</strong> and click on SUBMIT</p>
                    <p>Captcha block</p>
                    <div class="red-btn-outer light-blue-btn radius-5px">
                      <button class="red-btn radius-5px">Submit</button>
                    </div>
                    
                </form>-->
            </div>
<script type="text/javascript">


</script>
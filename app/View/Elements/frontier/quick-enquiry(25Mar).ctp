<?php
$nameError = $emailError = $phoneError = $jobCategoryError = $captchaError = $companyError = "";
$lname = $lemail = $lphone = $lcomment = $lcompany = $ljid = "";
$lrequest = $lnewsletter = 0;
if(isset($_SESSION['lastData'])) {
  //pr($_SESSION['lastData']);
  $lname = $_SESSION['lastData']['name'];
  $lemail = $_SESSION['lastData']['email'];  
  $lphone = $_SESSION['lastData']['phone'];
  $ljid = $_SESSION['lastData']['job_category_id'];
  $lcomment = $_SESSION['lastData']['comments'];
  $lcompany = $_SESSION['lastData']['company'];
  $lrequest = $_SESSION['lastData']['request'];
  $lnewsletter = $_SESSION['lastData']['newsletter'];
  unset($_SESSION['lastData']);
}

if(isset($_SESSION['errors']['job_category_id'])) {
  $jobCategoryError = $_SESSION['errors']['job_category_id'][0];
} 

if(isset($_SESSION['errors']['name'])) {
  $nameError = $_SESSION['errors']['name'][0];
}

if(isset($_SESSION['errors']['email'])) {
  $emailError = $_SESSION['errors']['email'][0];
}

if(isset($_SESSION['errors']['phone'])) {
  $phoneError = $_SESSION['errors']['phone'][0];
}

if(isset($_SESSION['errors']['g-recaptcha-response'])) {
  $captchaError = $_SESSION['errors']['g-recaptcha-response'][0];
}
echo $this->Html->css(array(
    'captcha/style.css',
));
?>
<!--<script src="https://www.google.com/recaptcha/api.js"></script>-->

<?php
  echo $this->Form->create('Job', array(
    'class' => 'sidebar-form',
    'type' => 'post',
    'name' => 'Job',
    'url' => array(
      //'controller' => 'jobs',
      "action" => "quick_enquiry"),
    'novalidate' => true
    )); ?>

  <div class="sidebar-title radius-3px">Quick Enquiry</div>
  <div class="form-content">
  <?php echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));?>
  <?php echo $this->Session->flash(); ?>
    <ul>
      <li> <?php
        echo $this->Form->input('name', array('placeholder' => 'Name*', 'type' => 'text', 'label' => false, 'div' => false, 'value' => $lname)); ?>
        <div class="jobError" style="color: #F00"><?php echo $nameError; ?></div>
      </li>
      <li> <?php
        echo $this->Form->input('email', array('placeholder' => 'Email*', 'type' => 'email', 'label' => false, 'div' => false, 'value' => $lemail)); ?>
        <div class="jobError" style="color: #F00"><?php echo $emailError; ?></div>
      </li>
      <li> <?php
        echo $this->Form->input('phone', array('placeholder' => 'Phone', 'type' => 'text', 'label' => false, 'div' => false, 'value' => $lphone)); ?>
        <div class="jobError" style="color: #F00"><?php echo $phoneError; ?></div>
      </li>
      <li> <?php
        echo $this->Form->input('company', array('placeholder' => 'Company Name', 'type' => 'text', 'label' => false, 'div' => false, 'value' => $lcompany)); ?>
        <div class="jobError" style="color: #F00"><?php echo $companyError; ?></div>
      </li>
      <li> <?php
        echo $this->Form->input('job_category_id', array('options' => array(
          '1' => 'General Enquiry',
          '2' => 'Clinical Enquiry',
          '3' => 'Buzzz Enquiry'), 'empty' => 'Select one', 'label' => false, 'div' => false, 'value' => $ljid)); ?> 
        <div class="jobError" style="color: #F00"><?php echo $jobCategoryError; ?></div>
      </li>
      <li> <?php
        echo $this->Form->textarea('comments', array('cols' => 1, 'rows' => 1, 'placeholder' => 'Comments', 'value' => $lcomment)); ?>
      </li>
      <li>
        <label class="chkbox-col" style="display: inline"> <?php
        echo $this->Form->checkbox('request', array('value' => 1, 'checked' => ( empty($lrequest) ? '' : 'checked' ) )); ?>
        <span>Request call back</span></label>
      </li>
      <li>
        <label class="chkbox-col" style="display: inline"> <?php
        echo $this->Form->checkbox('newsletter', array('value' => 1, 'checked' => ( empty($lnewsletter) ? '' : 'checked' ))); ?>
        <span>Subscribe to our Newsletter</span></label>
      </li>
      <li>
        <div class="captcha-row"> <span>Please tick the box below <strong>I'm not a robot</strong> and click 
          on SUBMIT</span>
          <div id="RecaptchaField1"></div>
          <div class="jobError" style="color: #F00"><?php echo $captchaError; ?></div>
          <!--<span><?php 
              //if(isset($dataValidate) && !empty($dataValidate)){
              // echo $dataValidate['g-recaptcha-response'][0];
              //}
              ?></span>-->
        </div>
      </li>
      <li>
        <div class="red-btn-outer light-blue-btn radius-5px"> <?php
          echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'red-btn radius-5px')); ?>
        </div>
      </li>
    </ul>
  </div> <?php
echo $this->Form->end(); ?>
<?php unset($_SESSION['errors']); ?>

<!--<form class="sidebar-form">
  <div class="sidebar-title radius-3px">Quick Enquiry</div>
  <div class="form-content">
    <ul>
      <li>
        <input type="text" placeholder="Name*">
      </li>
      <li>
        <input type="text" placeholder="Email*">
      </li>
      <li>
        <input type="text" placeholder="Phone*">
      </li>
      <li>
        <select id="select">
          <option>General Enquiry</option>
          <option>Clinical Enquiries</option>
          <option>Buzzz Enquiries</option>
        </select>
      </li>
      <li>
        <textarea cols="1" rows="1" placeholder="'Comments'"></textarea>
      </li>
      <li>
        <label class="chkbox-col">
          <input type="checkbox" value="">
          <span>Request call back</span></label>
      </li>
      <li>
        <label class="chkbox-col">
          <input type="checkbox" value="">
          <span>Subscribe to our Newsletter</span></label>
      </li>
      <li>
        <div class="captcha-row"> <span>Please tick the box below <strong>I'm not a robot</strong> and click 
          on SUBMIT</span>
          <div class="captcha-col"><?php //echo $this->Html->image('/assets/frontier/img/captcha.jpg',array('alt'=>''));?></div>
        </div>
      </li>
      <li>
        <div class="red-btn-outer light-blue-btn radius-5px">
          <button class="red-btn radius-5px">Submit</button>
          
        </div>
      </li>
    </ul>
  </div>
</form>-->

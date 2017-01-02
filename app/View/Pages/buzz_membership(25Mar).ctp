<script src="https://www.google.com/recaptcha/api.js"></script>
<?php
$nameError = $emailError = $phoneError = $captchaError = "";
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
    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
      <div class="buzz-right-page buzz-inner-page">
        <div class="common-title buzz-common-title">
          <h3>Buzzz Membership</h3>
        </div>
        <div class="brokerage-article"> <?php
        echo $page_details['Page']['description'];
        ?>
          <!--<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
          <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.</p>
          -->
          
          
          <div class="buzz-contact-form">
        <div class="contact-tabs-row"><span class="req-tetx">(*=Required fields)</span>
          
          </div>
        <div class="tabs-content-row"> <?php
          echo $this->Form->create('Job', array(
                    'class' => 'sidebar-form contact-form',
                    'type' => 'post',
                    'url' => array(
                      "action" => "quick_enquiry"),
                    'novalidate' => true)); 
                  echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden')); ?>
                  <?php echo $this->Session->flash(); ?>
                  <div class="form-content">
                    <div class="row contact-form-row">
                      <div class="col-md-6 col-sm-12 col-xs-12">
                        <ul>
                          <li> <?php
                            echo $this->Form->input('name', array('placeholder' => 'Name*', 'type' => 'text', 'label' => false, 'div' => false)); ?>
                            <div class="jobError" style="color: #F00"><?php echo $nameError; ?></div>
                          </li>
                          <li> <?php
                            echo $this->Form->input('email', array('placeholder' => 'Email*', 'type' => 'email', 'label' => false, 'div' => false)); ?>
                            <div class="jobError" style="color: #F00"><?php echo $emailError; ?></div>
                          </li>
                          <li> <?php
                            echo $this->Form->input('phone', array('placeholder' => 'Phone*', 'type' => 'text', 'label' => false, 'div' => false)); ?>
                            <div class="jobError" style="color: #F00"><?php echo $phoneError; ?></div>
                          </li>
                          <li>
                            <div class="captcha-row"> <span>Please tick the box below <strong>I'm not a robot</strong> and click on SUBMIT</span>
                            
                              <div class="g-recaptcha" data-sitekey="6LfHRBQTAAAAAINtUl0sdKz4aNY-vaBXVnSmpla_"></div>
                              <div class="jobError" style="color: #F00"><?php echo $captchaError; ?></div>
                              </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-sm-12 col-xs-12">
                        <ul>
                          <li> <?php
                            echo $this->Form->textarea('comments', array('cols' => 1, 'rows' => 1, 'placeholder' => 'Comments')); ?>
                            <!--<textarea cols="1" rows="1" placeholder="Comments"></textarea>-->
                          </li>
                          <li>
                            <label class="chkbox-col" style="display: inline"> <?php
                              echo $this->Form->checkbox('request', array('value' => 1)); ?>
                              <span>Request call back</span></label>
                          </li>
                          <li>
                            <label class="chkbox-col" style="display: inline"> <?php
                              echo $this->Form->checkbox('newsletter', array('value' => 1)); ?>
                              <span>Subscribe to our Newsletter</span></label>
                          </li>

                          <li> <?php
                            echo $this->Form->input('job_category_id', array('value' => 3, 'class' => 'form-control', 'type' => 'hidden'));?>
                            <div class="red-btn-outer light-blue-btn radius-5px"> <?php
                              echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'red-btn radius-5px')); ?>
                              <!--<button class="red-btn radius-2px">Submit</button>-->
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div> <?php
                  echo $this->Form->end(); ?>
                  <?php unset($_SESSION['errors']); ?>
         <!--
         <form class="sidebar-form contact-form">
                    <div class="form-content">
                      <div class="row contact-form-row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
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
                          </ul>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <ul>
                            <li>
                              <textarea placeholder="Comments" rows="1" cols="1"></textarea>
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
                              <div class="red-btn-outer radius-5px">
                                <button class="red-btn radius-5px">Submit</button>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </form>
                  -->
        </div>
      </div>
                  
        </div>
      </div>
    </div>
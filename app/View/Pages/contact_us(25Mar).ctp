<script type="text/javascript">
var CaptchaCallback = function(){
        //grecaptcha.render('RecaptchaField1', {'sitekey' : '6LfHRBQTAAAAAINtUl0sdKz4aNY-vaBXVnSmpla_'});
        grecaptcha.render('RecaptchaField3', {'sitekey' : '6LfHRBQTAAAAAINtUl0sdKz4aNY-vaBXVnSmpla_'});
    };
</script>
<script src="//www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>
<?php
$nameError = $emailError = $phoneError = $captchaError = "";
$lname = $lemail = $lphone = $lcomment = $lcompany = "";
$lrequest = $lnewsletter = 0;
if(isset($_SESSION['lastData'])) {
  $lname = $_SESSION['lastData']['name'];
  $lemail = $_SESSION['lastData']['email'];  
  $lphone = $_SESSION['lastData']['phone'];
  $lcomment = $_SESSION['lastData']['comments'];
  $lcompany = $_SESSION['lastData']['company'];
  $lrequest = $_SESSION['lastData']['request'];
  $lnewsletter = $_SESSION['lastData']['newsletter'];
  unset($_SESSION['lastData']);
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

<div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'],array('alt'=>'')); ?>
</div>
</div>
<div class="breadcrumb-row margin-bot-50">
  <div class="container"> <?php
        $this->Html->addCrumb('Talk to Us', array('controller' => 'pages', 'action' => 'contact_us'));
        echo $this->Html->getCrumbList(array('class' => 'breadcrumb-ul', 'separator' => false), array(
          'text' => 'At a Glance ',
          'url' => Router::url('/', true) . '',
          'escape' => false
        )); ?>
    <!--<ul class="breadcrumb-ul">
      <li><a>At a Glance</a></li>
      <li><a>Talk to Us</a></li>
    </ul>-->
    <?php echo $this->element("frontier/social-icon"); ?>
    <!--<div class="breadcrumb-social"> <span>Follow us on :</span>
      <ul class="page-social sm34-page-social">
        <li><a href="javascript:void(0)" class="sprite fb-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite twitter-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite g-plus-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite linkedin-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite youtube-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite rss-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite mail-icon"></a></li>
      </ul>
    </div>-->
  </div>
</div>
<div class="container">
<div class="row">  <div class="col-md-8 col-sm-7 col-xs-12">
    <div class="page-left">
      <div class="common-title">
        <h3>Contact Us</h3>
      </div>
      <div class="contact-row margin-bot-45">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="contact-col radius-2px">
              <h3>Frontier Support Services</h3>
              <div class="contact-info"> 27-29 Brighton Road <br>
                South Croydon<br>
                Surrey<br>
                CR2 6EB<br>
              </div>
              <div class="contact-info contact-ph"> <strong>Phone :</strong> <br>
                020 8603 7230 </div>
              <div class="map-col">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2491.2750631863164!2d-0.10002538474366028!3d51.36123982920112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876074c477d14ed%3A0xdcfd622922c3c908!2s29+Brighton+Rd%2C+South+Croydon%2C+Greater+London+CR2+6EB%2C+UK!5e0!3m2!1sen!2sin!4v1451393773959"  allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="contact-col radius-2px">
              <h3>Buzzz Hub</h3>
              <div class="contact-info"> 96D South End<br>
                South Croydon<br>
                Surrey<br>
                CR0 1DQ </div>
              <div class="contact-info contact-ph"> <strong>Phone :</strong> <br>
                020 8603 7230 </div>
              <div class="map-col">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2491.1165014450903!2d-0.10127408474350634!3d51.36415492898839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876074bdfad4ae5%3A0x1ad0615ebd87f2dc!2s96D+S+End%2C+Croydon%2C+Greater+London+CR0+1DQ%2C+UK!5e0!3m2!1sen!2sin!4v1451394023692" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="direction-row margin-bot-30">
        <div class="direction-title-outer"><span class="direction-title">Direction :<?php echo $this->Html->image('/assets/frontier/img/arrow.png',array('alt'=>'')); ?>
        <!--<img src="assets/img/arrow.png" alt="">--> </span></div>
        <div class="direction-col">
          <h4>By Bus :</h4>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
        <div class="direction-col">
          <h4>By Car :</h4>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
      </div>
      <div class="contact-tabs">
        <div class="contact-tabs-row"><span class="req-tetx">(*=Required fields)</span>
          <ul class="tabs-list">
            <li class="active"><a href="#support-work" data-toggle="tab">General Enquiries</a></li>
            <li><a href="#Other" data-toggle="tab">Clinical Enquiries</a></li>
            <li><a href="#supported-employment" data-toggle="tab">Buzzz Enquiries</a></li>
          </ul>
          </div>
        <div class="tabs-content-row">
          <div class="support-work">
            <div class="tab-content">
              <div class="tab-pane fade in active" id="support-work">
                <div class="content-inner"> <?php
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
                            <div class="jobError" style="color: #F00"><?php //echo $companyError; ?>
                          </li>
                          <li>
                            <div class="captcha-row"> <span>Please tick the box below <strong>I'm not a robot</strong> and click on SUBMIT</span>
                            
                              <div id="RecaptchaField3"></div>
                              <div class="jobError" style="color: #F00"><?php echo $captchaError; ?></div>
                              </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-sm-12 col-xs-12">
                        <ul>
                          <li> <?php
                            echo $this->Form->textarea('comments', array('cols' => 1, 'rows' => 2, 'placeholder' => 'Comments', 'value' => $lcomment)); ?>
                            <!--<textarea cols="1" rows="1" placeholder="Comments"></textarea>-->
                          </li>
                          <li>
                            <label class="chkbox-col" style="display: inline"> <?php
                              echo $this->Form->checkbox('request', array('value' => 1, 'checked' => ( empty($lrequest) ? '' : 'checked' ))); ?>
                              <span>Request call back</span></label>
                          </li>
                          <li>
                            <label class="chkbox-col" style="display: inline"> <?php
                              echo $this->Form->checkbox('newsletter', array('value' => 1, 'checked' => ( empty($lnewsletter) ? '' : 'checked' ))); ?>
                              <span>Subscribe to our Newsletter</span></label>
                          </li>

                          <li> <?php
                            echo $this->Form->input('job_category_id', array('value' => 1, 'class' => 'form-control', 'type' => 'hidden'));?>
                            <div class="red-btn-outer light-blue-btn radius-5px"> <?php
                              echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'red-btn radius-2px')); ?>
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
                              <textarea cols="1" rows="1" placeholder="Comments"></textarea>
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
                                <div class="captcha-col"><img src="assets/img/captcha.jpg" alt=""></div>
                              </div>
                            </li>
                            <li>
                              <div class="red-btn-outer light-blue-btn radius-5px">
                                <button class="red-btn radius-2px">Submit</button>
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
              <div class="tab-pane fade" id="Other">
                <div class="content-inner">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab quidem quam quo, commodi debitis et.Debitis porro libero 
                    delectus eligendi tempore expedita voluptates, nobis laboriosam odio iste, harum, accusantium, facilis. Lorem ipsum dolor 
                    sit amet, consectetur adipisicing elit. Ab quidem quam quo, commodi debitis et. Maecenas quis consequat libero, a feugiat 
                    eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
                </div>
              </div>
              <div class="tab-pane fade" id="supported-employment">
                <div class="more-jobs-col">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab quidem quam quo, commodi debitis et.Debitis porro libero 
                    delectus eligendi tempore expedita voluptates, nobis laboriosam odio iste.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <aside class="col-md-4 col-sm-5 col-xs-12">
    <div class="page-sidebar"> 
      
      <!--sidebar-about-us -->
        <?php echo $this->element("frontier/sidebar-about-us"); ?>
        <?php //include("includes/sidebar-about-us.php"); ?>
        <!--/sidebar-about-us --> 
        
        <!--Our Services -->
        <?php echo $this->element("frontier/our-services"); ?>
        <?php //include("includes/our-services.php"); ?>
        <!--/Our Services --> 

      
    </div>
  </aside></div>
</div>
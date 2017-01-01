<!-- ************ ENQUIRY FORM MODAL ********************-->
<div class="modal fade " id="enquiry-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog quick-enquirymodal" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
        <div class="enquiry-logo">
              <?php
              echo $this->Html->image('/assets/frontier/img/logo.png', array('url' => array(
              'controller' => 'pages',
              'action' => 'index'))); ?>
          <!-- <img alt="" src="assets/img/logo.png"> -->
        
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
</div>
</div>
<div class="breadcrumb-row margin-bot-50">
  <div class="container"> <?php
        $this->Html->addCrumb('Join Our Team', array('controller' => 'pages', 'action' => 'jobs'));
        echo $this->Html->getCrumbList(array('class' => 'breadcrumb-ul', 'separator' => false), array(
          'text' => 'At a Glance ',
          'url' => Router::url('/', true) . '',
          'escape' => false
        )); ?>
    <!--<ul class="breadcrumb-ul">
      <li><a>At a Glance</a></li>
      <li><a> Job With Us</a></li>
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
  <div class="row">
    <div class="col-md-8 col-sm-7 col-xs-12">
      <div class="page-left">
        <?php echo $page_details['Page']['description'];?>
        <!-- <div class="article-col">
          <div class="common-title">
            <h3> Job With Us</h3>
          </div>
          <h4 class="subtitle-text">Job Opportunities at Frontier</h4>
          <p> Frontier Support Services is a growing organisation and welcomes enquiries about job vacancies. We are happy to receive prospective CVs from candidates wishing to be considered for future jobs. </p>
          <p><strong class="sami-strong">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, consectetur, neque, aliquid officia quibusdam quidem facere ipsum aperiam quod aliquam nemo totam. Sunt, nostrum adipisci dicta suscipit vitae perspiciatis repellat.</strong> </p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, animi iusto sit ipsum quae nobis nostrum fuga laboriosam ab nesciunt aliquam inventore odio alias accusantium maiores hic voluptate similique sed assumenda. </p>
        </div>
        -->
        <div class="job-with-us">
          <ul class="tabs-list">
            <li class="active"><a data-toggle="tab" href="#support-work">Care & Support</a></li>
            <li><a data-toggle="tab" href="#supported-employment">Supported Employment</a></li>
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
                        <?php //echo $this->Text->truncate($value['JobUpload']['description'], 400, array()); ?>
                        <p><?php echo $this->Text->truncate($value['JobUpload']['description'], 300, array()); ?></p>
                        <div class="support-work-btn">
                          <a href="javascript:void(0)" class="solid-red-btn radius-5px"  data-target="#enquiry-modal" type="button" data-toggle="modal" style="margin-left: 20px;">Upload CV</a>
                          <a href="javascript:void(0)" class="solid-red-btn radius-5px jd"  data-target="#job-modal" type="button" data-toggle="modal" id="<?php echo $value['JobUpload']['id']; ?>">See More</a>

                          <div class="job-content fullContent" id="<?php echo 'jcon'.$value['JobUpload']['id']; ?>">
                              <?php //echo $value['description']; ?>
                              <h4><strong><?php echo $value['JobUpload']['title']; ?></strong></h4>
                              <p><?php echo $value['JobUpload']['description']; ?></p>
                          </div>
                          <!--<a href="javascript:void(0)" class="solid-red-btn radius-5px" type="button">See More</a>--><?php
                          /*echo $this->html->link('See More', array('controller' => 'pages', 'action' => 'view_jobs',$value['JobUpload']['id']),
                              array('class' => 'solid-red-btn radius-5px'));*/ ?>
                        </div>
                      </div> <?php
                    } ?>
                  </div>
                  <!-- <div class="more-jobs-col">
                    <div class="support-work-btn">
                      <p>Vivamus at nisi viverra, egestas velit pulvinar, facilisis augue. In sed hendrerit leo.</p>
                      <a href="javascript:void(0)" class="solid-red-btn radius-5px">More Jobs</a>
                    </div>
                  </div> -->
                </div>

                <div id="supported-employment" class="tab-pane fade">
                  <div class="content-inner"> <?php
                    foreach($sej as $key => $value) { ?>
                      <div class="support-work-col">
                        <h4><?php echo $value['JobUpload']['title']; ?></h4>
                        <p><?php echo $this->Text->truncate($value['JobUpload']['description'], 300, array()); ?></p>
                        <div class="support-work-btn">
                          <a href="javascript:void(0)" class="solid-red-btn radius-5px"  data-target="#enquiry-modal" type="button" data-toggle="modal" style="margin-left: 20px;">Upload CV</a>

                          <a href="javascript:void(0)" class="solid-red-btn radius-5px jd"  data-target="#job-modal" type="button" data-toggle="modal" id="<?php echo $value['JobUpload']['id']; ?>">See More</a>

                          <div class="job-content fullContent" id="<?php echo 'jcon'.$value['JobUpload']['id']; ?>">
                              <?php //echo $value['description']; ?>
                              <h4><strong><?php echo $value['JobUpload']['title']; ?></strong></h4>
                              <p><?php echo $value['JobUpload']['description']; ?></p>
                          </div>
                          <!--<a href="javascript:void(0)" class="solid-red-btn radius-5px" type="button">See More</a>--><?php
                          /*echo $this->html->link('See More', array('controller' => 'pages', 'action' => 'view_jobs',$value['JobUpload']['id']),
                              array('class' => 'solid-red-btn radius-5px'));*/ ?>
                        </div>
                      </div> <?php
                    } ?>
                  </div>
                  <!-- <div class="more-jobs-col">
                    <div class="support-work-btn">
                      <p>Vivamus at nisi viverra, egestas velit pulvinar, facilisis augue. In sed hendrerit leo.</p>
                      <a href="javascript:void(0)" class="solid-red-btn radius-5px">More Jobs</a>
                    </div>
                  </div> -->
                </div>

                <div id="Other" class="tab-pane fade">
                  <div class="content-inner"> <?php
                    foreach($oj as $key => $value) { ?>
                      <div class="support-work-col">
                        <h4><?php echo $value['JobUpload']['title']; ?></h4>
                        <p><?php echo $this->Text->truncate($value['JobUpload']['description'], 300, array()); ?></p>
                        <div class="support-work-btn">
                          <a href="javascript:void(0)" class="solid-red-btn radius-5px"  data-target="#enquiry-modal" type="button" data-toggle="modal" style="margin-left: 20px;">Upload CV</a>

                          <a href="javascript:void(0)" class="solid-red-btn radius-5px jd"  data-target="#job-modal" type="button" data-toggle="modal" id="<?php echo $value['JobUpload']['id']; ?>">See More</a>

                          <div class="job-content fullContent" id="<?php echo 'jcon'.$value['JobUpload']['id']; ?>">
                              <?php //echo $value['description']; ?>
                              <h4><strong><?php echo $value['JobUpload']['title']; ?></strong></h4>
                              <p><?php echo $value['JobUpload']['description']; ?></p>
                          </div>
                          <!--<a href="javascript:void(0)" class="solid-red-btn radius-5px" type="button">See More</a>--><?php
                          /*echo $this->html->link('See More', array('controller' => 'pages', 'action' => 'view_jobs',$value['JobUpload']['id']),
                              array('class' => 'solid-red-btn radius-5px'));*/ ?>
                        </div>
                      </div> <?php
                    } ?>
                  </div>
                  <!-- <div class="more-jobs-col">
                    <div class="support-work-btn">
                      <p>Vivamus at nisi viverra, egestas velit pulvinar, facilisis augue. In sed hendrerit leo.</p>
                      <a href="javascript:void(0)" class="solid-red-btn radius-5px">More Jobs</a>
                    </div>
                  </div> -->
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
        
        <!--Quick Enquiry -->
           <?php echo $this->element("frontier/quick-enquiry"); ?>
        <?php //include("includes/quick-enquiry.php"); ?>
        <!--/Quick Enquiry --> 
      </div>
    </aside>
  </div>
</div>
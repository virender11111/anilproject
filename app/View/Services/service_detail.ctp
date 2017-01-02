 <div class="page-banner"><?php echo $this->Html->image('/assets/frontier/img/jobs.jpg',array('alt'=>''));?></div>
</div>
<div class="breadcrumb-row margin-bot-50">
  <div class="container">
  <?php
    $this->Html->addCrumb('Service detail', array('controller' => 'services', 'action' => 'service_detail',$services['Service']['id']));
        echo $this->Html->getCrumbList(array('class' => 'breadcrumb-ul', 'separator' => false), array(
          'text' => 'At a Glance ',
          'url' => Router::url('/', true) . '',
          'escape' => false
        )); ?>
    <!--<ul class="breadcrumb-ul">
      <li><a>At a Glance</a></li>
      <li><a>Service detail</a></li>
    </ul>-->
    <div class="breadcrumb-social"> <span>Follow us on :</span>
      <ul class="page-social sm34-page-social">
        <li><a href="javascript:void(0)" class="sprite fb-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite twitter-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite g-plus-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite linkedin-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite youtube-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite rss-icon"></a></li>
        <li><a href="javascript:void(0)" class="sprite mail-icon"></a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container">
 <div class="row"> <div class="col-md-8 col-sm-7 col-xs-12">
    <div class="page-left">
      <div class="article-col">
        <div class="common-title">
          <h3><?php echo $services['Service']['title'];?></h3>
        </div>
        <?php //pr($services);?>
        <?php echo $services['Service']['description'];?>
       <!--  <p> Lorem ipsum dolor sit amet, consectetur adipisiciang elit. Ab quidem quam quo, commodi debitis et.Debitis porro libero delectus eligendi tempore expedita voluptates, nobis laboriosam odio iste, harum, accusantium, facilis. </p>
        <p>Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper. Maecenas quis consequat libero, a feugiat eros. </p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab quidem quam quo, commodi debitis et. Debitis porro libero delectus eligendi tempore expedita voluptates, nobis laboriosam odio iste, harum, accusantium,Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet. </p>
        
         <div class="video-col-3">
         <?php //echo $this->Html->image('/assets/frontier/img/video3.jpg',array('alt'=>''));?>
      </div>
      -->
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
  </aside></div>
</div>
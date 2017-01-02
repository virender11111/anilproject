<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <!-- END HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <?php echo $this->Html->link($this->Html->image('logo2.png', array('alt' => Configure::read('Site.title'))), array('controller' => 'dashboard', 'admin' => true, 'plugin' => false), array('escape' => false, 'class' => 'logo-default'));?>
            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                
                
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <?php 
                        echo $this->Image->img('user/image/' . $logged_in['id'] . '/' . $logged_in['image'], 29, 29, array('class' =>"img-circle"), 'no-image.jpg',false);
                        ?>
                        <span class="username username-hide-on-mobile">
                            <?php echo ucfirst($this->Session->read('Auth.Admin.first_name'));?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <?php echo $this->Html->link(__('<i class="icon-user"></i> Edit Profile'), array('plugin' => false,'controller' => 'users', 'action' => 'profile'), array('title' => 'Reset Password', 'escape' => false)); ?>
                            
                        </li>
                        <li>
                            <?php echo $this->Html->link(__('<i class="icon-lock"></i> Reset Password'), array('plugin' => false,'controller' => 'users', 'action' => 'reset_password'), array('title' => 'Reset Password', 'escape' => false)); ?>
                            
                        </li>
                        <li>
                            <?php echo $this->Html->link(__('<i class="icon-key"></i> Log Out'), array('plugin' => false,'controller' => 'users', 'action' => 'logout'), array('title' => 'logout', 'escape' => false)); ?>
                        </li>
                        
                    </ul>
                </li>
               
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
</div>

<?php /*

  <div class="header navbar navbar-inverse navbar-fixed-top">


  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">
  <div class="container-fluid">
  <!-- BEGIN LOGO -->
  <?php echo $this->Html->link($this->Html->image('jewellers_hub_logo.png', array('alt' => Configure::read('Site.title'))), array('controller' => 'dashboard', 'admin' => true, 'plugin' => false), array('escape' => false, 'class' => 'brand')); ?>

  <!-- END LOGO -->
  <!-- BEGIN RESPONSIVE MENU TOGGLER -->
  <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
  <img src="<?php echo $this->webroot; ?>assets/img/menu-toggler.png" alt="" />
  </a>
  <!-- END RESPONSIVE MENU TOGGLER -->
  <!-- BEGIN TOP NAVIGATION MENU -->
  <ul class="nav pull-right">
  <!-- BEGIN NOTIFICATION DROPDOWN -->

  <!-- BEGIN USER LOGIN DROPDOWN -->
  <li class="dropdown user">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <img alt="" src="<?php echo $this->webroot; ?>assets/img/avatar.png"  style="height: 30px;" />
  <span class="username"><?php echo ucfirst($this->Session->read('Auth.Admin.name')); ?></span>
  <i class="icon-angle-down"></i>
  </a>
  <ul class="dropdown-menu">
  <li><?php echo $this->Html->link(__('<i class="icon-edit"></i> Edit Profile'), array('plugin' => false, 'controller' => 'users', 'action' => 'profile'), array('title' => 'Reset Password', 'escape' => false)); ?>
  </li>
  <!--<li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
  <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>
  <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
  <li class="divider"></li>
  <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>-->
  <li><?php echo $this->Html->link(__('<i class="icon-user"></i> Reset Password'), array('plugin' => false, 'controller' => 'users', 'action' => 'reset_password'), array('title' => 'Reset Password', 'escape' => false)); ?>
  <li>
  <?php echo $this->Html->link(__('<i class="icon-key"></i> Log Out'), array('plugin' => false, 'controller' => 'users', 'action' => 'logout'), array('title' => 'logout', 'escape' => false)); ?>
  </li>
  </ul>
  </li>
  <!-- END USER LOGIN DROPDOWN -->
  </ul>
  <!-- END TOP NAVIGATION MENU -->
  </div>
  </div>
  <!-- END TOP NAVIGATION BAR -->
  </div>
 * 
 * */ ?>
 
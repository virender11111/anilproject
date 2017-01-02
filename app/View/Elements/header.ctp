<header class="Header"><span class="sticky-header-bg"></span>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-5">

                <?php echo $this->Html->link($this->Html->image('logo.png', array('alt' => 'Logo')), array('controller' => 'users', 'action' => 'dashboard', 'plugin' => false), array('escape' => false, 'class' => 'White-orange-logo')); ?> 
                <?php echo $this->Html->link($this->Html->image('logo2.png', array('alt' => 'Logo')), array('controller' => 'users', 'action' => 'dashboard', 'plugin' => false), array('escape' => false, 'class' => 'Black-orange-logo')); ?>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-7">
                <div class="Header-rt">
                    <ul class="Header-menu">
                        <li class="active"><a href="javascript:void(0)">Invite friends </a></li>
                    </ul>
                    <?php
                    if (!$logged_in) {
                        ?>
                        <ul class="Header-menu Header-menu2">
                            <li class="<?php echo ($action == 'register') ? 'active' : '' ?>"><a data-toggle="modal" data-target="#Signup-modal">Sign Up</a></li>
                            <li class="<?php echo ($action == 'login') ? 'active' : '' ?>"><a data-toggle="modal" data-target="#Login-modal">Log In</a></li>
                        </ul>
                    <?php } else { ?>
                        <div class="login-user"> <a><?php echo __('Welcome') . " " . $logged_in['fname']; ?></a>
                            <ul>
                                <li><a href="javascript:void?(0)">My Purchases</a></li>
                                <li><a href="javascript:void?(0)">Coaches Area</a></li>
                                <li><a href="javascript:void?(0)">profile</a></li>
                                <li><a href="javascript:void?(0)">Inbox</a></li>
                                <li><a href="javascript:void?(0)">invite friends</a></li>
                                <li><?php echo $this->html->link('log out', array('controller' => 'users', 'action' => 'logout')); ?></li>
                            </ul>
                        </div>
                        <?php
                    }
                    if (!$logged_in) {
                        ?>
                        <a data-toggle="modal" data-target="#Login-modal" class="orange-btn" href="javascript:void(0);">Post Lesson</a>;
                    <?php } else {
                        ?>
                        <a href="<?php echo $this->Html->url(array('controller' => 'lessons', 'action' => 'index')); ?>" class="orange-btn"> Post Lesson</a> </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</header>
<?php echo $this->Html->image('banner.jpg', array('alt' => 'Banner')); ?>

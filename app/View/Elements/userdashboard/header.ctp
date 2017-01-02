<header class="Header Inner-Header"><span class="sticky-header-bg"></span>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-3 Inner-Logo">
                <?php echo $this->html->link($this->html->Image('logo2.png'), array('controller' => 'users', 'action' => 'dashboard', 'plugin' => false), array('class' => 'Black-orange-logo', 'escape' => false)); ?>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-9 Inner-header-rt">
                <div class="Header-rt Inner-Header-rt">
                    <ul class="Header-menu">
                        <li class="active__" ><a href="javascript:void(0)">Invite friends </a></li>
                    </ul>

                    <div class="login-user"> 
                        <a>
                            <?php echo $this->html->Image('user1.jpg', array('class' => 'user-photo full-radius')); ?>
                            <span class="UserName"><?php echo __('Welcome') . " " . $logged_in['fname']; ?></span>
                        </a>
                        <ul>
                            <li><a href="javascript:void(0)">My Purchases</a></li>
                            <li><a href="javascript:void(0)">Coaches Area</a></li>
                            <li><a href="javascript:void(0)">profile</a></li>
                            <li><a href="javascript:void(0)">Inbox</a></li>
                            <li><a href="javascript:void(0)">invite friends</a></li>
                            <li><?php echo $this->html->link('log out', array('controller' => 'users', 'action' => 'logout')); ?></li>
                        </ul>
                    </div>
                    <?php
                    echo $this->Html->link("Post Lesson", array(
                        "controller" => "lessons",
                        "action" => "index"
                            ), array("class" => "orange-btn"));
                    ?>

                </div>
            </div>
        </div>
    </div>
</header>

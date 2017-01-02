<div class="container">
    <div class="layout-773px">
        <div class="Social-button-2">
            <ul class="form-ul">
                <li>
                    <?php
                    echo $this->Html->link($this->Form->button($this->Html->image('google-plus.png', array('alt' => 'Logo')), array('type' => 'button', 'class' => 'social-button Google-Plus')), array('controller' => 'users', 'action' => 'auth_login', 'google'), array('escape' => false));
                    ?>
                </li>
                <li>
                    <?php
                    echo $this->Html->link($this->Form->button($this->Html->image('facebook.png', array('alt' => 'Logo')), array('type' => 'button', 'class' => 'social-button Facebook')), array('controller' => 'users', 'action' => 'auth_login', 'facebook'), array('escape' => false));
                    ?>
                </li>
            </ul>
            <div class="horizontal-devider">
                <div class="or-inner">
                    <div><span>or</span></div>
                </div>
            </div>
        </div>
        <div class="site-form Sign-up-form"> <span class="site-form-title margin-bot-30">Registration</span>
            <?php
            echo $this->Session->flash();
            echo $this->Form->create('User', array('inputDefaults' =>
                $this->Layout->bootstrapformSetting(12),
                'type' => 'post',
                'noValidate' => true
            ));
            // echo $this->Form->hidden('referer', array('value' => $referer));
            ?>
            <ul class="site-form-ul margin-bot-25">
                <li>
                    <?php echo $this->Form->input('fname', array('div' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'First Name')); ?>
                </li>
                <li>
                    <?php echo $this->Form->input('lname', array('div' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'Last Name')); ?>
                </li>
                <li>
                    <?php echo $this->Form->input('email', array('div' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'Email Address')); ?>
                </li>
                <li>
                    <?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'type' => 'password', 'placeholder' => 'password')); ?>
                </li>
                <li>
                    <?php echo $this->Form->input('confirm_password', array('div' => false, 'label' => false, 'type' => 'password', 'placeholder' => 'Confirm Password')); ?>
                </li>
                <li>By signing up I approve my registration and that I've read, understood and agreed the <a href="javascript:void(0)">Terms &amp; conditions</a>.</li>
                <li>
                    <div class="custome-chkbox">
                        <?php echo $this->Form->checkbox('is_updates', array('id' => 'check1')); ?>
                        <label for="check1">Send me messages, updates and personal information</label>
                    </div>
                    <div class="custome-chkbox">
                        <?php echo $this->Form->checkbox('is_newsletter_subscribed', array('id' => 'check2')); ?>
                        <label for="check2">Send me newsletters &amp; promotional materials</label>
                    </div>
                </li>
            </ul>
            <?php echo $this->Form->submit('Sign Up', array('class' => "orange-btn")); ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>


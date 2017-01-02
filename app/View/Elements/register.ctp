<div class="modal fade" id="Signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog Form-modal-wrap" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="Close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="Page-Model-outer">
                    <div class="Page-Model">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 pop-Baner">
                                <?php
                                if (isset($check_ipaddress)) {
                                    echo $this->Html->image('pop-banner2.jpg', array("alt" => ""));
                                } else {
                                    echo $this->Html->image('pop-banner2.jpg', array("alt" => ""));
                                }
                                ?>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="popup-form">   <a data-toggle="modal" data-target="#Login-modal" data-dismiss="modal" class="popup-subtext1 other-modal-link"><?php echo __('HeaderForLoginPopup'); ?></a>
                                    <div class="Social-button-2">
                                        <ul class="form-ul">
                                            <li>
                                                <?php
                                                echo $this->Html->link(
                                                        $this->Form->button(
                                                                $this->Html->image('G-icon.png', array(
                                                                    "escape" => true
                                                                        )
                                                                ) . $this->Html->tag('span', 'Log-in', array(
                                                                    'class' => 'Btn-Text'
                                                                        )
                                                                ), array(
                                                            'type' => 'button',
                                                            'class' => 'social-button Google-Plus',
                                                                )
                                                        ), array(
                                                    'controller' => 'users',
                                                    'action' => 'auth_login',
                                                    'google'
                                                        ), array(
                                                    'escape' => false
                                                        )
                                                );
                                                ?>
                                            </li>
                                            <li>
                                                <?php
                                                echo $this->Html->link(
                                                        $this->Form->button(
                                                                $this->Html->tag('i', '', array(
                                                                    'class' => 'fa fa-facebook',
                                                                    'escape' => true
                                                                        )
                                                                ) .
                                                                $this->Html->tag('span', 'Log-in', array(
                                                                    'class' => 'Btn-Text',
                                                                    'escape' => true
                                                                        )
                                                                ), array(
                                                            'type' => 'button',
                                                            'class' => 'social-button Facebook',
                                                            'escape' => false
                                                                )
                                                        ), array(
                                                    'controller' => 'users',
                                                    'action' => 'auth_login',
                                                    'facebook'
                                                        ), array(
                                                    'escape' => false
                                                ));
                                                ?>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="horizontal-devider">
                                        <div class="or-inner">
                                            <div><span>or</span></div>
                                        </div>
                                    </div>
                                    <span class="popup-midtitle"><?php echo __('SignUp'); ?></span> <?php 
                                    echo $this->Element('ajax-message');
                                    echo $this->Form->create('User', array('inputDefaults' =>
                                        $this->Layout->bootstrapformSetting(12),
                                        'type' => 'post',
                                        'class' => '',
                                        'noValidate' => true,
                                        'id' => 'UserRegistrationForm',
                                        'action' => 'register'
                                    )); ?>
                                    <ul class="form-ul form-ul-02">
                                        <li>
                                            <?php echo $this->Form->input('fname', array('div' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'First Name')); ?>
                                            <span class="form-error error-message fname_error hide"></span>
                                        </li>


                                        <li>
                                            <?php echo $this->Form->input('email', array('div' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'Email Address')); ?>
                                            <span class="form-error error-message email_error hide"></span>
                                        </li>


                                        <li>
                                            <?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'type' => 'password', 'placeholder' => 'Password')); ?>
                                            <span class="form-error error-message password_error hide"></span>
                                        </li>


                                        <li>
                                            <?php echo $this->Form->input('confirm_password', array('div' => false, 'label' => false, 'type' => 'password', 'placeholder' => 'Confirm Password')); ?>
                                            <span class="form-error error-message confirm_password_error hide"></span>
                                        </li>
                                        <li>
                                            <span style="width: 100%; float: left;margin-bottom: 5px;" class="text-center loading-image hide"><i class="fa fa-refresh fa-spin"></i></span>
                                            <?php echo $this->Form->submit('Sign Up', array('class' => "orange-btn")); ?>
                                        </li>

                                        <li><?php echo __('TermAndCondTextRegistrationPopup'); ?> <a href="javascript:void(0)"><?php echo __('TermAndCondition'); ?></a>.</li>
                                        <li>
                                            <div class="custome-chkbox">
                                                <?php echo $this->Form->checkbox('is_updates', array('id' => 'check1')); ?>
                                                <label for="check1"><?php echo __('UpdateLabelRegistrationPopup'); ?></label>
                                            </div>
                                            <div class="custome-chkbox">
                                                <?php echo $this->Form->checkbox('is_newsletter_subscribed', array('id' => 'check2')); ?>
                                                <label for="check2"><?php echo __('NewsLattersLabelRegistrationPopup'); ?></label>
                                            </div>
                                        </li>
                                        <li> <span><?php echo __('HaveAnAccount'); ?><a data-toggle="modal" data-target="#Login-modal" data-dismiss="modal" class="other-modal-link" href="javascript:void(0)"> <?php echo __('Login'); ?></a></span> </li>
                                    </ul>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->start('footer_js') ?>
<?php echo $this->end(); ?>

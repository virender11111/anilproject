<div class="modal fade" id="Login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog Form-modal-wrap" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="Close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="Page-Model-outer">
                    <div class="Page-Model">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 pop-Baner dynamic-banner-login-01">
                                <?php
                                echo $this->Html->image('pop-banner2.jpg');
                                ?>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="popup-form">  <span class="popup-subtext1"><?php echo __('HeaderForLoginPopup'); ?></span>
                                    <div class="Social-button-2">
                                        <ul class="form-ul">
                                            <li>
                                                <?php
                                                echo $this->Html->link(
                                                        $this->Form->button(
                                                                $this->Html->image('G-icon.png', array(
                                                                    "escape" => true
                                                                        )
                                                                ) . $this->Html->tag('span', __('Login'), array(
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
                                                                $this->Html->tag('span', __('Login'), array(
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
                                    <?php echo $this->Session->flash(); ?>
                                    <span class="popup-midtitle"><?php echo __('Log-in'); ?></span>
                                    <span class="error_message_valid"></span>
                                    <?php
                                    echo $this->Form->create('User', array(
                                        'inputDefaults' => $this->Layout->bootstrapformSetting(12),
                                        'type' => 'post',
                                        'class' => 'page-form',
                                        'noValidate' => true
                                    )); ?>
                                    <ul class="form-ul form-ul-02">
                                        <li>
                                            <?php echo $this->Form->input('email', array('div' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'E-mail address')); ?>
                                            <span class="form-error error-message email_error hide"></span>
                                        </li>

                                        <li>
                                            <?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'placeholder' => 'Password', 'class' => "", 'type' => 'password')); ?>
                                            <span class="form-error error-message password_error hide"></span>
                                        </li>

                                        <li><div class="custome-chkbox remember-chkbox">
                                                <?php echo $this->Form->checkbox('remember_me', array('id' => 'check3')); ?>
                                                <label for="check3"><?php echo __('RememberMe'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <span style="width: 100%; float: left;" class="text-center loading-image hide"><i class="fa fa-refresh fa-spin"></i></span>
                                            <?php echo $this->Form->input("Log In", array('label' => false, 'id' => 'LoginButton', 'class' => "orange-btn", 'type' => 'submit', 'div' => false, 'escape' => false)); ?>
                                        </li>
                                        <li> <span class="forgot-Password"><a href="javascript:void(0)"><?php echo __('ForgotPassword'); ?></a></span> </li>
                                        <li> <span><?php echo __('DontHaveAnAccount'); ?> <a class="StaticLinksLogin" data-toggle="modal" data-target="#Signup-modal" data-dismiss="modal" class="other-modal-link" href="javascript:void(0)"><?php echo __('SignUp'); ?></a></span> </li>
                                    </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
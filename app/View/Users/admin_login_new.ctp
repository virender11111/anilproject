<!-- START LOGIN FORM -->
<?php
echo $this->Form->create('User', array(
	'inputDefaults' => array(
		'div' => false,
		'label' => false),
		'class' => 'form-vertical login-form'
	)
); ?>
	<h3 class="form-title">Login</h3>
	<div class="alert alert-danger display-hide">
		<button class="close" data-close="alert"></button>
		<span>
		Enter Email Address and password. </span>
	</div>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9">Email Address</label>
		<div class="input-icon">
			<i class="fa fa-user"></i>
			<!-- <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/> --> <?php
			echo $this->Form->input('email', array(
				'class' => 'form-control placeholder-no-fix',
				'placeholder' => 'Email Address',
				'autocomplete' => "off",
				'value' => (isset($cookie_user["User"]["email"]) ? $cookie_user["User"]["email"] : null)
			)); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9">Password</label>
		<div class="input-icon">
			<i class="fa fa-lock"></i>
			<!-- <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/> --> <?php
			echo $this->Form->input('password', array(
				'class' => 'form-control placeholder-no-fix',
				'placeholder' => 'Password',
				'autocomplete' => "off",
				'value' => (isset($cookie_user["User"]["password"]) ? $cookie_user["User"]["password"] : null)
			)); ?>
		</div>
	</div>
	<div class="form-actions">
		<label class="rememberme check">
        <input type="checkbox"  name="data[User][remember_me]" value="1" /> Remember Me </label>
		<button type="submit" class="btn blue pull-right">
		Login <i class="m-icon-swapright m-icon-white"></i>
		</button>
	</div>
	<div class="forget-password">
		<h4>Forgot your password ?</h4>
		<p>
			 no worries, click 
			 <?php echo $this->Html->link('here', array('controller' => 'users', 'action' => 'forgot_password_new'), array('class' => 'forget-password')); ?>
			to reset your password.
		</p>
	</div>
</form>
<!-- END LOGIN FORM -->
<!-- BEGIN FORGOT PASSWORD FORM -->
<form class="forget-form" action="index.html" method="post">
	<h3>Forget Password ?</h3>
	<p>
		 Enter your e-mail address below to reset your password.
	</p>
	<div class="form-group">
		<div class="input-icon">
			<i class="fa fa-envelope"></i>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
	</div>
	<div class="form-actions">
		<button type="button" id="back-btn" class="btn">
		<i class="m-icon-swapleft"></i> Back </button>
		<button type="submit" class="btn blue pull-right">
		Submit <i class="m-icon-swapright m-icon-white"></i>
		</button>
	</div>
</form>
<!-- END FORGOT PASSWORD FORM -->
<div class="create-account">
    <p>
        <a href="javascript:void(0);"  class="uppercase">
            <?php echo Configure::read('Site.copyright'); ?></a>
    </p>
</div>
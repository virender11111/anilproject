<style>
.error-message {
	color: red;
}
</style>
<?php    
    echo $this->Form->create('User', array(
    	'inputDefaults' => array(
    		'label' => false,
    		'div' => false, 
    		'fieldset' => false
    	),
    	'type'=>'post',
        'class' => 'Signinform',
        'novalidate'=>true
    )); ?>

<h3>Reset Password!</h3>
<?php echo $this->Session->flash('auth'); ?>
<p>
    Enter your new password.
</p>

<div class="form-group">
<?php echo $this->Form->input('password', array('class' => "form-control placeholder-no-fix", 'type' => 'password', 'placeholder' => 'Please enter your new password')); ?>
</div>

<div class="form-group">
<?php echo $this->Form->input('confirm_password', array('class' => "form-control placeholder-no-fix", 'type' => 'password', 'placeholder' => 'Repeat again your password')); ?>
</div>

<div class="form-actions">
<?php echo $this->Html->link('Back',array('controller'=>'users','action'=>'login'),array('class'=>'btn btn-default')); ?>
   
    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
</div>
<?php echo $this->Form->end(); ?>



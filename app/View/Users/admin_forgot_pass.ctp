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
<h3>Forgot Password ?</h3>
<?php echo $this->Session->flash('auth'); ?>
<p>
    Enter your e-mail address below to reset your password.
</p>

<div class="form-group">
<?php echo $this->Form->input('email', array('class' => "form-control placeholder-no-fix", 'type' => 'text', 'placeholder' => 'Your Email Address')); ?>
   
</div>
<div class="form-actions">
<?php echo $this->Html->link('Back',array('controller'=>'users','action'=>'login'),array('class'=>'btn btn-default')); ?>
   
    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
</div>
<?php echo $this->Form->end(); ?>



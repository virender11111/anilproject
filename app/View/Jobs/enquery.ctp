<?php
echo $this->Html->css(array(
		'captcha/style.css',
));
?>
<script src="https://www.google.com/recaptcha/api.js"></script>

<?php 
echo $this->Form->create($modelClass, array(
		'class' => 'form-horizontal',
		'type' => 'post',
		'novalidate' => true,
		'id' => 'basic_form_validation',
		'inputDefaults' => $this->Layout->inputDefaults
));
echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));
echo $this->Form->input('name', array('class' => 'form-control'));
echo $this->Form->input('email', array('class' => 'form-control'));
echo $this->Form->input('phone', array('class' => 'form-control'));

?>

<div class="g-recaptcha" data-sitekey="6LfHRBQTAAAAAINtUl0sdKz4aNY-vaBXVnSmpla_"></div>
<span><?php echo ($dataValidate['g-recaptcha-response'][0]) ? $dataValidate['g-recaptcha-response'][0]:'';?></span>
<?php 
echo $this->Form->end('submit');
?>
<?php echo $this->start('footer_js')?>
<script>

</script>
<?php echo $this->end();?>
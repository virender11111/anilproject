<?php
$this->Html->addCrumb(ucfirst('Tutors'), array('action' => 'index'));
$this->Html->addCrumb(ucfirst($title_for_layout), null);

$this->extend('/Common/admin_add');

$this->assign('title', $title_for_layout);

$this->append('form-start', $this->Form->create('User', array(
            'class' => 'form-horizontal',
            'type' => 'file',
            'novalidate' => true,
            'id' => 'basic_form_validation',
            'inputDefaults' => $this->Layout->inputDefaults
)));


$this->start('form');

echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));
?>

<?php
echo $this->Form->input('action', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Actions'), 'class' => 'form-control'));

$this->end();
 ?>

<?php echo $this->start('jsSection');?>

<?php echo $this->end();?>



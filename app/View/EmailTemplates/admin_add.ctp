<?php

$this->Html->addCrumb(ucfirst($controller), array('action' => 'index'));
$this->Html->addCrumb(ucfirst($title_for_layout), null);

$this->extend('/Common/admin_add');

$this->assign('title', $title_for_layout);

$this->append('form-start', $this->Form->create($modelClass, array(
            'class' => 'form-horizontal',
            'type' => 'post',
            'novalidate' => true,
            'id' => 'basic_form_validation',
            'inputDefaults' => $this->Layout->inputDefaults
)));


$this->start('form');
if($action == 'admin_add'){
	echo $this->Form->input('title', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Title'), 'class' => 'form-control'));
}
echo $this->Form->input('subject', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Subject'), 'class' => 'form-control'));
echo $this->Form->input('from', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'From'), 'class' => 'form-control'));
echo $this->Form->input('message', array('class' => 'text_editor form-control'));

$this->end();





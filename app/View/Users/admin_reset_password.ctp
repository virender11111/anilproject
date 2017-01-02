<?php

$this->Html->addCrumb(ucfirst($controller), array('action' => 'index'));
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

echo $this->Form->input('User.password', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Password'), 'class' => 'form-control'));
echo $this->Form->input('User.confirm_password', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Verify Password'), 'class' => 'form-control', 'type' => 'password'));

$this->end();


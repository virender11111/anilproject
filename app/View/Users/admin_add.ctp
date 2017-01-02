<?php
$this->Html->addCrumb(ucfirst('Users'), array('action' => 'index'));
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
echo $this->Form->input('role_id', array('class' => "bs-select form-control", 'type' => 'select', 'empty' => 'Please Select', 'options' => $roleList, 'data-fv-notempty-message' => __('pleaseSelect')));
echo $this->Form->input('User.fname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'First Name'), 'class' => 'form-control'));
echo $this->Form->input('User.mname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Middle Name'), 'class' => 'form-control'));
echo $this->Form->input('User.lname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Last Name'), 'class' => 'form-control'));
echo $this->Form->input('User.email', array('class' => 'chosen form-control'));
echo $this->Form->input('User.password', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Password'), 'class' => 'form-control'));
echo $this->Form->input('gender', array('class' => "bs-select form-control", 'type' => 'select', 'empty' => 'Please Select', 'options' => array(1 => 'Male', 2 => "Female"), 'data-fv-notempty-message' => __('pleaseSelect')));
echo $this->Form->input('status', array('class' => 'icheck', 'type' => 'checkbox'));

$this->end();





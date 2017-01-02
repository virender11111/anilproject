<?php
$this->Html->addCrumb(ucfirst('users'), array('action' => 'index'));
$this->Html->addCrumb(ucfirst($title), null);

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
$readOnly = ($action == 'admin_view') ? 'readonly' : '';
echo $this->Form->input('User.fname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'First Name'), 'class' => 'form-control',$readOnly ));
echo $this->Form->input('User.mname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Middle Name'), 'class' => 'form-control',$readOnly));
echo $this->Form->input('User.lname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Last Name'), 'class' => 'form-control',$readOnly));
echo $this->Form->input('User.email', array('class' => 'chosen form-control',$readOnly));

echo $this->Form->input('User.mname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Middle Name'), 'class' => 'form-control',$readOnly));
echo $this->Form->input('User.lname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Last Name'), 'class' => 'form-control',$readOnly));
echo $this->Form->input('User.gender', array('class' => "bs-select form-control", 'type' => 'select', 'empty' => 'Please Select', 'options' => array(0 => 'Male', 1 => "Female"), 'data-fv-notempty-message' => __('pleaseSelect'),$readOnly));

$portlet_array = array();
$this->append('portlet-title', 'Sub Accounts Emails');
$this->append("portlet-body", $this->Html->tableCells($portlet_array));

$this->end(); ?>


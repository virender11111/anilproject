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
echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));
echo $this->Form->input('faq_category_id', array('class' => 'bs-select form-control', 'empty' => "Please choose your category", "options" => $faqCategory));
echo $this->Form->input('question', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Title'), 'class' => 'form-control'));
echo $this->Form->input('description', array('class' => 'form-control'));
echo $this->Form->input('status', array('class' => 'icheck', 'label' => array('class' => 'col-md-3 control-label', 'text' => 'Status')));
$this->end();
?>
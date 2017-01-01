<?php
$this->Html->addCrumb(ucfirst("FAQ's"), array('action' => 'index'));
$this->Html->addCrumb(ucfirst($title_for_layout), null);

$this->extend('/Common/admin_add');

$this->assign('title', $title_for_layout);

$this->append('form-start', $this->Form->create($modelClass, array(
            'class' => 'form-horizontal',
            'type' => 'file',
            'novalidate' => true,
            'id' => 'basic_form_validation',
            'inputDefaults' => $this->Layout->inputDefaults
)));

$this->start('form');
echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));
echo $this->Form->input('question', array('class' => 'form-control', 'type' => 'textarea', 'rows' => 3));
echo $this->Form->input('description', array('class' => 'text_editor form-control'));
echo $this->Form->input('page_id', array('options' => $data, 'class' => 'form-control', 'empty' => 'Please select one'));
echo $this->Form->input('status', array('class' => 'icheck', 'type' => 'checkbox'));
$this->end();
?>

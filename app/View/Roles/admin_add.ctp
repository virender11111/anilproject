<?php
$this->Html->addCrumb(ucfirst($controller), array('action' => 'index'));
$this->Html->addCrumb(ucfirst($title_for_layout), null);

$this->extend('/Common/admin_add');
$this->assign('title', $title_for_layout);

//$addBtn1 = $this->Html->link('<i class="fa fa-edit"></i> <span class="hidden-480">Schedules </span>', array('action' => 'schedule',$this->request->data{$modelClass}['id']), array('class' => 'btn default green-haze-stripe', 'escape' => false));
//$addBtn2 = $this->Html->link('<i class="fa fa-edit"></i> <span class="hidden-480">Attachments </span>', array('action' => 'attachment',$this->request->data{$modelClass}['id']), array('class' => 'btn default green-haze-stripe', 'escape' => false));

if($title_for_layout != 'Add Role') {
    $this->assign('btn1', $addBtn1);
    $this->assign('btn2', $addBtn2);
}

$this->append('form-start', $this->Form->create($modelClass, array(
    'class' => 'form-horizontal',
    'type' => 'file',
    'novalidate' => true,
    'id' => 'basic_form_validation',
    'inputDefaults' => $this->Layout->inputDefaults
)));

$this->start('form');

echo $this->Form->input('Data.referer', array(
    'value' => $referer,
    'class' => 'form-control',
    'type' => 'hidden'
));
echo $this->Form->input('title', array(
    'label' => array(
        'class' => 'col-md-3 control-label',
        'text' => 'Title'),
    'class' => 'form-control',
    'placeholder' => "Add Title"
));
echo $this->Form->input('alias', array(
    'label' => array(
        'class' => 'col-md-3 control-label',
        'text' => 'Alias'),
    'class' => 'form-control',
    'placeholder' => "Add alias"
));
/*
echo $this->Form->input('is_disabled', array('class' => 'icheck', 'type' => 'checkbox'));
echo $this->Form->input('is_live', array('class' => 'icheck', 'type' => 'checkbox'));
echo $this->Form->input('is_free', array('class' => 'icheck', 'type' => 'checkbox'));
echo $this->Form->input('status', array('class' => 'icheck', 'type' => 'checkbox'));*/
$this->end();

?>

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
echo $this->Form->input($modelClass.'.id', array('class' => 'form-control', 'type' => 'hidden'));
//echo $this->Form->input($modelClass.'.state_id', array('class' => "bs-select form-control", 'type' => 'select', 'empty' => 'Please Select', 'options' => $stateList, 'data-fv-notempty-message' => __('pleaseSelect')));
echo $this->Form->input($modelClass.'.name', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Category'), 'class' => 'form-control'));
echo $this->Form->input($modelClass.'.status', array('class' => 'icheck', 'type' => 'checkbox'));
?>

<?php $this->end(); ?>





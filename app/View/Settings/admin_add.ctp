<?php
$this->Html->addCrumb(ucfirst(Inflector::humanize(Inflector::underscore($controller))), array('action' => 'index'));
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
$readOnly = ($action == 'admin_edit') ? 'readonly' : '';
echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));
echo $this->Form->input('key', array('class' => 'form-control',$readOnly));

$contactValueArray = array('FrontierSupportServicesAddress','BuzzzAddressHub','HeadOfficeDirections','BuzzzHubDorection');
if(in_array($this->request->data['Setting']['key'],$contactValueArray)){
    echo $this->Form->input('value', array('class' => 'text_editor form-control'));
} else {

echo $this->Form->input('value', array('class' => 'form-control'));
}
$this->end();
?>
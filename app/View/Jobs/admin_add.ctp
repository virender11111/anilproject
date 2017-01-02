<?php
$this->Html->addCrumb(ucfirst(Inflector::humanize(Inflector::underscore("Enquiries"))), array('action' => 'index'));
$this->Html->addCrumb(ucfirst($title_for_layout), null); 

$this->extend('/Common/admin_add');

$this->assign('title', 'Edit Enquiry');

$this->append('form-start', $this->Form->create($modelClass, array(
        'class' => 'form-horizontal',
        'type' => 'post',
		'enctype'=>'multipart/form-data',
        'novalidate' => true,
        'id' => 'basic_form_validation',
        'inputDefaults' => $this->Layout->inputDefaults
)));

$this->start('form');
$categoriesData = array('1' => 'General Enquiry', '2' => 'Clinical Enquiry', '3' => 'Buzzz Enquiry');
echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));
echo $this->Form->input('job_category_id', array('class' => "bs-select form-control",'label' => array(
                   'text'=> 'Category', 'class' => 'col-md-3 control-label'), 'type' => 'select', 'empty' => 'Please Select', 'options' => $categoriesData, 'data-fv-notempty-message' => __('pleaseSelect')));

echo $this->Form->input('name', array('class' => 'form-control'));
echo $this->Form->input('email', array('class' => 'form-control'));
echo $this->Form->input('phone', array('class' => 'form-control'));
echo $this->Form->input('comments', array('class' => 'form-control','type'=>'textarea'));
echo $this->Form->input('company', array('class' => 'form-control'));
echo $this->Form->input('cv_upload', array('type' => 'file', 'class' => 'form-control'));
echo $this->Form->input('request', array('class' => 'icheck'));
echo $this->Form->input('newsletter', array('class' => 'icheck'));

$this->end();
$this->start('footer_js');?>
<script>


</script>
<?php $this->end();
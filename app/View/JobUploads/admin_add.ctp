<?php
$this->Html->addCrumb(ucfirst(Inflector::humanize(Inflector::underscore("Jobs"))), array('action' => 'index'));
$this->Html->addCrumb(ucfirst($title_for_layout), null); 

$this->extend('/Common/admin_add');

$this->assign('title', $title_for_layout);

$this->append('form-start', $this->Form->create($modelClass, array(
        'class' => 'form-horizontal',
        'type' => 'post',
		'enctype'=>'multipart/form-data',
        'novalidate' => true,
        'id' => 'basic_form_validation',
        'inputDefaults' => $this->Layout->inputDefaults
)));

$this->start('form');
$categoriesData = array(
	'4' => 'Care & Support',
	'5' => 'Supported Employment',
	'6' => 'Other Positions',
	'7' => 'Graduate Opportunity'
);
echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));
echo $this->Form->input('job_category_id', array('class' => "bs-select form-control",'label' => array(
                   'text'=> 'Category', 'class' => 'col-md-3 control-label'), 'type' => 'select', 'options' => $categoriesData, 'data-fv-notempty-message' => __('pleaseSelect')));

//echo $this->Form->input('job', array('class' => 'form-control'));
//echo $this->Form->input('email', array('class' => 'form-control'));
//echo $this->Form->input('phone', array('class' => 'form-control'));
echo $this->Form->input('title', array('class' => 'form-control'));
echo $this->Form->input('description', array('class' => 'text_editor form-control'));
//echo $this->Form->input('company', array('class' => 'form-control'));
//echo $this->Form->input('cv_upload', array('type' => 'file', 'class' => 'form-control'));
echo $this->Form->input('status', array('class' => 'icheck'));
//echo $this->Form->input('newsletter', array('class' => 'icheck'));

$this->end();
$this->start('footer_js');?>
<script>


</script>
<?php $this->end();
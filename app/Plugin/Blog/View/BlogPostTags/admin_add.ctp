<?php $this->Html->addCrumb(ucfirst($controller), array('action' => 'index')); ?>
<?php $this->Html->addCrumb(str_replace("admin_", "", $action), '#'); 

$this->extend('/Common/admin_add');

$this->assign('title', $title_for_layout);

$this->append('form-start', $this->Form->create($modelClass, array(
        'class' => 'form-horizontal',
        'type' => 'post',
		//'enctype'=>'multipart/form-data',
        'novalidate' => true,
        'id' => 'basic_form_validation',
        'inputDefaults' => $this->Layout->inputDefaults
)));

$this->start('form');

echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));

echo $this->Form->input('name', array('class' => 'form-control'));
echo $this->Form->input('slug', array('class' => 'form-control'));

echo $this->Form->input('meta_title', array('class' => 'form-control'));
echo $this->Form->input('meta_description', array('class' => 'form-control'));
echo $this->Form->input('meta_keywords', array('class' => 'form-control'));
echo $this->Form->input('rss_channel_title', array('class' => 'form-control'));
echo $this->Form->input('rss_channel_description', array('class' => 'form-control'));

$this->end();

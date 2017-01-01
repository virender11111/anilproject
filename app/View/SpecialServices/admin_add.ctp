<?php $this->Html->addCrumb(ucfirst($controller), array('action' => 'index')); ?>
<?php $this->Html->addCrumb(str_replace("admin_", "", $action), '#'); 

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

echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));

echo $this->Form->input('title', array('class' => 'form-control'));
echo $this->Form->input('special_category_id', array('class' => "bs-select form-control", 'type' => 'select', 'empty' => 'Please Select', 'options' => $special_category, 'data-fv-notempty-message' => __('pleaseSelect')));
echo $this->Form->input('slug', array('class' => 'form-control'));
?>
<?php if(isset($service_id) && $service_id !=''){?>
<div class="form-group">
    <label class="control-label col-md-3"></label>
    <div class="col-md-9">

        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
                <?php
                $image = (!empty($this->request->data[$modelClass]['image'])) ? $this->request->data[$modelClass]['image'] : null;
                $id = (!empty($this->request->data[$modelClass]['id'])) ? $this->request->data[$modelClass]['id'] : null;
                echo $this->Image->img('special_service/image/' . $id . '/' . $image, 200, 150, array(), 'no-image.gif');
                ?>
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
            </div>
    
        </div>
      
    </div>
</div>
  <?php } ?>
<?php 
echo $this->Form->input('image', array('type' => 'file','class' => 'form-control'));
echo $this->Form->input('body', array('class' => 'text_editor form-control'));
echo $this->Form->input('status', array('class' => 'icheck'));
echo $this->Form->input('meta_title', array('class' => 'form-control'));
echo $this->Form->input('meta_description', array('class' => 'form-control'));
echo $this->Form->input('meta_keywords', array('class' => 'form-control'));

$this->end();

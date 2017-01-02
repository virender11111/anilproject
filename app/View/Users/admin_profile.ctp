<?php
$this->Html->addCrumb(ucfirst(Inflector::humanize(Inflector::underscore($controller))), array('action' => 'index'));
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
echo $this->Form->input('User.fname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'First Name'), 'class' => 'form-control'));
echo $this->Form->input('User.mname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Middle Name'), 'class' => 'form-control'));
echo $this->Form->input('User.lname', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Last Name'), 'class' => 'form-control'));
echo $this->Form->input('User.email', array('class' => 'chosen form-control'));

?>


<div class="form-group">
    <label class="control-label col-md-3">Image</label>
    <div class="col-md-9">

        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
                <?php
                $image = (!empty($this->request->data[$modelClass]['image'])) ? $this->request->data[$modelClass]['image'] : null;
                $id = (!empty($this->request->data[$modelClass]['id'])) ? $this->request->data[$modelClass]['id'] : null;
                echo $this->Image->img('user/image/' . $id . '/' . $image, 200, 150, array(), 'no-image.gif');
                echo $this->Form->hidden('old_image', array('value' => $image));
                ?>
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
            </div>
            <div>
                <span class="btn default btn-file">
                    <span class="fileinput-new">
                        Select image </span>
                    <span class="fileinput-exists">
                        Change </span>
                    <?php echo $this->Form->file('User.image', array('type' => 'file', 'class' => 'm-wrap large', 'label' => false)); ?>
                </span>
                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                    Remove </a>
            </div>
            <span class="help-inline">Allowed file type gif, jpg, jpeg and png.</span>
            <?php echo $this->Form->error('image'); ?>
        </div>
    </div>
</div>

<?php
$this->end();


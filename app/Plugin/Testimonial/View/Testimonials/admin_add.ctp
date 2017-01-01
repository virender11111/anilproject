<?php
$this->Html->addCrumb(ucfirst($controller), array('action' => 'index'));
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
echo $this->Form->input('name', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Name'), 'class' => 'form-control', 'placeholder' => "Add Name"));
//echo $this->Form->input('title', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Title'), 'class' => 'form-control', 'placeholder' => "Select title"));
echo $this->Form->input('description', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Description'), 'class' => 'form-control', 'placeholder' => "Enter Description"));
?>
<h2></h2>
<?php /*
echo $this->Form->input('meta_title', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Meta Title'), 'class' => 'form-control', 'placeholder' => "Enter meta title"));
echo $this->Form->input('meta_keyword', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Meta Keyword'), 'class' => 'form-control', 'placeholder' => "Enter meta title"));
echo $this->Form->input('meta_description', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Meta Description'), 'class' => 'form-control', 'placeholder' => "Enter Meta Description"));
*/
?>
<div class="form-group last">
    <label class="control-label col-md-3">Image</label>
    <div class="col-md-9">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
                <?php
                if (!empty($this->request->data[$modelClass]['image']) && !empty($this->request->data[$modelClass]['id'])) {
                    echo $this->Image->img('testimonial/image/' . $this->request->data[$modelClass]['id'] . '/' . $this->request->data[$modelClass]['image'], 100, 100, array(), 'no-image.gif');
                    echo $this->Form->hidden('old_image', array('value' => $this->request->data[$modelClass]['image']));
                } else {
                    echo $this->Image->img('testimonial/image/', 100, 100, array(), 'no-image.gif');
                }
                ?>
            </div>

            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 100px;">
            </div>
            <div>
                <span class="btn default green btn-file">
                    <span class="fileinput-new">
                        Select image </span>
                    <span class="fileinput-exists">
                        Change </span>
                    <?php echo $this->Form->file('image', array('type' => 'file', 'class' => 'm-wrap large', 'label' => false)); ?>
                </span>
                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                    Remove </a>
            </div>
        </div>
    </div>
</div>
<?php
echo $this->Form->input('status', array('class' => 'icheck', 'label' => array('class' => 'col-md-3 control-label', 'text' => 'Status')));
$this->end();
?>
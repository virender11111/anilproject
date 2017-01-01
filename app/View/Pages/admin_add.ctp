<?php 
$this->Html->addCrumb(ucfirst(Inflector::humanize(Inflector::underscore($controller))), array('action' => 'index'));
$this->Html->addCrumb(ucfirst($title_for_layout), null); 

$this->extend('/Common/admin_add');
$this->assign('title', $title_for_layout);

$this->append('form-start', $this->Form->create($modelClass, array(
    'class' => 'form-horizontal',
    'type' => 'post',
    'novalidate' => true,
	'enctype'=>'multipart/form-data',
    'id' => 'basic_form_validation',
    'inputDefaults' => $this->Layout->inputDefaults
)));

$this->start('form');
echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));
echo $this->Form->input('title', array('class' => 'form-control'));
$RouteStatus = (isset($page_id) && $page_id !='') ? true : false;
echo $this->Form->input('SiteRoute.slug', array('readonly' => $RouteStatus, 'label' => array('class' => 'col-md-3 control-label', 'text' => 'Slug <span class="badge badge-info tooltips" data-container = "body" data-original-title="Do not use space, replace space with - and make sure the keyword is globally unique">?</span>'), 'class' => 'form-control',
    ));
?>

<div class="form-group last <?php echo($this->Form->isFieldError("banner_image")) ? 'error' : ''; ?>">
    <label class="control-label col-md-3">Banner Image</label>
    <div class="col-md-9">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
                <?php
                if (!empty($this->request->data[$modelClass]['banner_image']) && !empty($this->request->data[$modelClass]['id'])) {
                    echo $this->Image->img('page/banner_image/' . $this->request->data[$modelClass]['id'] . '/' . $this->request->data[$modelClass]['banner_image'], 200, 200, array(), 'no-image.jpg');
                    echo $this->Form->hidden('old_image', array('value' => $this->request->data[$modelClass]['banner_image']));
                } else {
                    echo $this->Image->img('', 200, 200, array(), 'no-image.jpg');
                }
                ?>
            </div>

            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;">
            </div>
            <div>
                <span class="btn default green btn-file" style="width:100%">
                    <span class="fileinput-new">
                        Select image </span>
                    <span class="fileinput-exists">
                        Change </span>
                    <?php echo $this->Form->file('banner_image', array('type' => 'file', 'class' => 'm-wrap large', 'label' => false)); ?>
                </span>
                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style="width:100%; margin-top: 1px;">
                    Remove </a>
                <?php if ($this->Form->isFieldError("banner_image")) { ?>
                    <span class="help-block"><?php echo $this->Form->error('banner_image'); ?></span>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
echo $this->Form->input('short_description', array('class' => 'form-control','type'=>'textarea'));
echo $this->Form->input('description', array('class' => 'text_editor form-control'));
echo $this->Form->hidden('Meta.model', array('value' => $modelClass));
echo $this->Form->hidden('SiteRoute.model', array('value' => $modelClass));
echo $this->Form->input('Meta.title', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Meta Title'), 'class' => 'chosen form-control'));
echo $this->Form->input('Meta.id', array('class' => 'chosen form-control'));
echo $this->Form->input('SiteRoute.id', array('class' => 'chosen form-control'));
echo $this->Form->input('Meta.keywords', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Meta Keywords'), 'class' => 'chosen form-control'));
echo $this->Form->input('Meta.description', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Meta Description'), 'class' => 'chosen form-control'));

$this->end();
$this->start('footer_js');?>
<?php $this->end();

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
?>
<div id="city_list">
<?php 
//$cityList
echo $this->Form->input($modelClass.'.category_id', array('class' => "bs-select form-control", 'type' => 'select', 'empty' => 'Select Category', 'options' =>$cityList, 'data-fv-notempty-message' => __('pleaseSelect')));
?>
</div>
<?php 

echo $this->Form->input($modelClass.'.name', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Name'), 'class' => 'form-control'));
echo $this->Form->input($modelClass.'.url', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'URL'), 'class' => 'form-control'));
?>
<div class="form-group last <?php echo($this->Form->isFieldError("image")) ? 'error' : ''; ?>">
    <label class="control-label col-md-3">Image</label>
    <div class="col-md-9">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
                <?php
                if (!empty($this->request->data[$modelClass]['image']) && !empty($this->request->data[$modelClass]['id'])) {
                    echo $this->Image->img('sitelink/image/' . $this->request->data[$modelClass]['id'] . '/' . $this->request->data[$modelClass]['image'], 200, 200, array(), 'no-image.jpg');
                    echo $this->Form->hidden('old_image', array('value' => $this->request->data[$modelClass]['image']));
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
                    <?php echo $this->Form->file($modelClass.'.image', array('type' => 'file', 'class' => 'm-wrap large', 'label' => false)); ?>
                </span>
                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style="width:100%; margin-top: 1px;">
                    Remove </a>
                <?php if ($this->Form->isFieldError("image")) { ?>
                    <span class="help-block"><?php echo $this->Form->error('image'); ?></span>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
echo $this->Form->input($modelClass.'.description', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Description'), 'class' => 'form-control'));
echo $this->Form->input($modelClass.'.status', array('class' => 'icheck', 'type' => 'checkbox'));
?>

<?php $this->end(); ?>
<?php echo $this->start('footer_js');?>;?>
<script type="text/javascript">
//Get all cities 
/*$( document ).on("change","#AreaStateId",function() {
	var state_id = $(this).val();
			
	  $.ajax({
          url     : "<?php echo Router::url(array('controller' => 'areas', 'action' =>'cityList'), true); ?>",
          type    : "POST",
        //  cache   : false,
         data    : {state_id: state_id},
          dataType: "html",
          success : function(data){
          //alert(data);
             // console.log(data.html);
              $('#city_list').html(data);
              $('.bs-select').selectpicker({
                  iconBase: 'fa',
                  tickIcon: 'fa-check'
              });
          }
      });
});*/
</script>
<?php echo $this->end();?>




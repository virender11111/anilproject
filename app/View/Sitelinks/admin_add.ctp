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

echo $this->Form->input($modelClass.'.name', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'name'), 'class' => 'form-control'));
echo $this->Form->input($modelClass.'.url', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'URL'), 'class' => 'form-control'));
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




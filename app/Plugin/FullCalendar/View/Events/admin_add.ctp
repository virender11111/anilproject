<?php $this->Html->addCrumb(ucfirst(Inflector::humanize(Inflector::underscore($controller))), array('action' => 'index'));
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

echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden'));
//echo $this->Form->input('event_type_id', array('class' => "bs-select form-control", 'type' => 'select', 'empty' => 'Please Select', 'options' => $job_categories, 'data-fv-notempty-message' => __('pleaseSelect')));

echo $this->Form->input('title', array('class' => 'form-control'));
echo $this->Form->input('details', array('class' => 'form-control'));
//echo $this->Form->input('UserDetail.dob', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Date of Birth'), 'class' => 'form-control date birthday','readonly','type'=>'text'));
echo $this->Form->input('event_date', array('class' => 'form-control eventdatetime','type'=>'text','readonly'));
//echo $this->Form->input('end', array('class' => 'form-control eventdatetime','type'=>'text','readonly'));
//echo $this->Form->input('all_day', array('class' => 'icheck'));

$this->end();
$this->start('footer_js');?>
<script>
$(function() {
    $('.eventdatetime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 01,
        locale: {
            //format: 'MM/DD/YYYY H:mm'
        }
    });

    $('.eventdatetime').on('apply.daterangepicker', function(ev, picker) {
    	//  console.log(picker.startDate.format('YYYY-MM-DD h:mm:A'));
    	 // console.log(picker.endDate.format('YYYY-MM-DD h:mm A'));

    	  $(".eventdatetime").val(picker.startDate.format('YYYY-MM-DD HH:mm:ss') + ' to ' + picker.endDate.format('YYYY-MM-DD HH:mm:ss'));
    	});
});
</script>
<?php $this->end();

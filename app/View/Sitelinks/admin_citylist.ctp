
<?php 

echo $this->Form->input('Area.city_id', array(
		'type'=>'select',
		'label' => array('class' => 'col-md-3 control-label', 'text' => 'City'),
		 'class' => 'bs-select form-control',
		 'options' =>$cities,
		 'id' => 'city_id',
	     'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
	      'div' => array('class' => 'form-group', 'error' => 'has-error'),
	       // 'label' => array('class' => 'col-md-3 control-label'),
	     'between' => '<div class="col-md-8">',
	     'after' => '</div>',
	     'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block')),
		'empty' => 'Select City'
));

?>

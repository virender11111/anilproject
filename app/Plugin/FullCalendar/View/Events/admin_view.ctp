<?php
$this->Html->addCrumb(ucfirst('Events'), array('action' => 'index'));
$this->Html->addCrumb(ucfirst($title), null);

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
$readOnly = ($action == 'admin_view') ? 'readonly' : '';
echo $this->Form->input('Event.title', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Title'), 'class' => 'form-control',$readOnly ));
echo $this->Form->input('Event.details', array('label' => array('class' => 'col-md-3 control-label', 'text' => 'Details'), 'class' => 'form-control',$readOnly));
echo $this->Form->input('Event.start', array('type'=>'text','label' => array('class' => 'col-md-3 control-label', 'text' => 'Start Date'), 'class' => 'form-control',$readOnly));
echo $this->Form->input('Event.end', array('type'=>'text','label' => array('class' => 'col-md-3 control-label', 'text' => 'End Date'), 'class' => 'form-control',$readOnly));

?>
<?php
$portlet_array = array();
$this->append('portlet-title', 'Events');
/*foreach ($this->request->data['sub_seller'] as  $sub_seller) {     
  $portlet_array[] = $this->Form->input('', array('value' => $sub_seller["User"]["email"],'label' => array('class' => 'col-md-3 control-label', 'text' => ''), 'class' => 'form-control',$readOnly));
}
*/
$this->append("portlet-body", $this->Html->tableCells($portlet_array));

$this->end(); ?>


<?php 
$this->Html->addCrumb(ucfirst($title_for_layout), array('action' => 'index'));
//$this->extend('/Common/admin_index');

?>
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="<?php echo $this->Admin->icons($controller); ?>"></i>
                    <?php echo $this->fetch('title'); ?>
                </div>
                <div class="caption">
                    <i class=""></i>
                    Manage Calendar</div>
                <div class="actions">
               <?php echo $this->Html->link('<i class="fa fa-plus"></i> <span class="hidden-480">New Event</span>', array('controller'=>'events','action' => 'add'), array('class' => 'btn default green-haze-stripe', 'escape' => false));?>
                  

                </div>
               
            </div>
             
        </div>
        <div class="Calendar index">
					<div id="calendar"></div>
				</div>
        <!-- End: life time stats -->
    </div>
</div>
<?php /* ?>
<div class="actions">
	<ul>
	    <li><?php echo $this->Html->link(__('New Event', true), array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Events', true), array('plugin' => 'full_calendar', 'controller' => 'events')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Events Types', true), array('plugin' => 'full_calendar', 'controller' => 'event_types')); ?></li>
	</ul>
</div>
<?php */ ?>

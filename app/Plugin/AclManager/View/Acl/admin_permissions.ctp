<?php $this->Html->addCrumb(ucfirst('Permissions'), array('action' => 'permissions'));?>
<?php //pr($this->params->params['named']);?>
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="<?php echo $this->Admin->icons($controller); ?>"></i>
                    <?php //echo $this->fetch('title'); ?>
                    Permissions
                </div>
                <div class="actions">
                    <?php
                   /* if ($btn = trim($this->fetch('btn'))):
                        //echo $btn;
                    endif;*/
                    ?>

                </div>
            </div>
            <div class="portlet-body">
                <?php
                //echo $this->Form->create('Perms');
                ?>
                <div class="table-container ">
<!-- 
                    <div class="">
                        <label>
                            Page <?php
                           // $this->Form->create('Page');
                          /*  echo $this->Form->input('Page', array(
                                'options' => $this->Layout->pagesList($this->Paginator->counter('{:pages}')),
                                'class' => 'table-group-action-input form-control input-inline  input-sm jump_page_num',
                                'label' => false,
                                'value' => $this->Paginator->counter('{:page}'),
                                'empty' => false,
                                'div' => false
                                    )
                            );*/
                            ?>
                            of <?php echo $this->Paginator->counter('{:pages}'); ?>
                        </label>
                        <label>
                            <span class="seperator">|</span>
                            View <?php
                          /*  echo $this->Form->input('limit', array(
                                'options' => $this->Layout->limitOtions(),
                                'class' => 'table-group-action-input form-control input-inline jump_page_view  input-sm',
                                'label' => false,
                                'value' => (!empty($this->params->params['named']['limit'])) ? $this->params->params['named']['limit'] : '20',
                                'data-url' => $this->Html->url(array('action' => '/' . str_replace("admin_", "", $action))),
                                'empty' => false,
                                'div' => false
                                    )
                            );*/
                            ?>
                            records
                        </label>
                        <label class="pull-right">
                           
                        </label>
                    </div>
                      -->
                    <div class="table-scrollable">
                    <?php  echo $this->Form->create('Perms');?>
                        <table class="table table-striped table-bordered table-hover" id="psdata_table">
                            <thead>
                               <tr class="heading">
									<th>Actions <input type="checkbox" class="allcheck"></th>
									<?php foreach ($aros as $aro): ?>
									<?php $aro = array_shift($aro); ?>
									<th><?php echo h($aro[$aroDisplayField]); ?></th>
									<?php endforeach; ?>
								</tr>
                            </thead>
                            <tbody>
						 <?php
								$uglyIdent = Configure::read('AclManager.uglyIdent'); 
								$lastIdent = null;
								foreach ($acos as $id => $aco) {
									$action = $aco['Action'];
									$alias = $aco['Aco']['alias'];
									$ident = substr_count($action, '/');
									if ($ident <= $lastIdent && !is_null($lastIdent)) {
										for ($i = 0; $i <= ($lastIdent - $ident); $i++) {
											?></tr><?php
										}
									}
									if ($ident != $lastIdent) {
										?><tr class='aclmanager-ident-<?php echo $ident; ?>'><?php
									}
									if($alias == 'Jobs'){
										$alias = 'Enquiry';
									}
                                    if($alias == 'JobUploads'){
                                        $alias = 'Jobs';
                                    }
									?><td><?php echo ($ident == 0 ? "<strong>" : "" ) . ($uglyIdent ? str_repeat("&nbsp;&nbsp;", $ident) : "") . h($alias) . ($ident == 1 ? "</strong>" : "" ); ?></td>
									<?php foreach ($aros as $aro): 
										$inherit = $this->Form->value("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}-inherit");
										$allowed = $this->Form->value("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}"); 
										$value = $inherit ? 'inherit' : null; 
										$icon = $this->Html->image(($allowed ? 'test-pass-icon.png' : 'test-fail-icon.png')); ?>
										<td>
										
										<?php
										$admin_controllers = array(
												'Dashboard',
												'Pages',
												'Users',
												'BlogPosts',
												'BlogPostCategories',
                                                'BlogPostComments',
												//'FullCalendar',
												//'Faqs',
												'Events',
												'Services',
                                                'Team',
                                                'TeamMembers',
                                                'Testimonials',
												//'EmailTemplates',
												'Jobs',
												'Roles',
												'Settings',
                                                'JobUploads'
												//'SpecialCategories',
												//'SpecialServices'
										);
										if($alias == 'Dashboard' || $alias == 'Pages' || $alias == 'Users' || $alias == 'BlogPosts' || $alias == 'BlogPostCategories' || $alias == 'BlogPostCategories' || $alias == 'Events' || $alias == 'Services' || $alias == 'Enquiry' || $alias == 'Roles' || $alias == 'Settings' || $alias == 'Teams'  || $alias == 'TeamMembers' || $alias == 'Jobs' || $alias == 'Faqs' || $alias == 'Testimonials' || $alias == 'BlogPostComments'){

										}else{
											
										echo $this->Form->input("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}", array('class' => 'icheck', 'type' => 'checkbox','label'=>false,'div'=>''));
											//echo $icon . " " . $this->Form->select("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}", array(array('inherit' => __('Inherit'), 'allow' => __('Allow'), 'deny' => __('Deny'))), array('empty' => __('No change'), 'value' => $value));
											}

										?>
										
										</td>
									<?php endforeach; ?>
								<?php 
									$lastIdent = $ident;
								}
								for ($i = 0; $i <= $lastIdent; $i++) {
									?></tr><?php
								}
								?>
                            </tbody>
                        </table>
                        <div style="margin: -10px 0px 10px 14px;">
                        <?php echo $this->Form->submit('Save', array('class' => 'btn blue-hoki')); ?>
                        <?php $this->Form->end(); ?>
                        <!-- <button class="btn blue-hoki" type="submit">Submit</button> -->
                         <?php //echo $this->Form->end('Save'); ?></div>
                    </div>
<?php /* ?>
                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <div class="dataTables_info">Showing <?php echo $this->Paginator->counter('{:start}'); ?> to <?php echo $this->Paginator->counter('{:end}'); ?> of <?php echo $this->Paginator->counter('{:count}'); ?> entries</div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <?php if ($this->Paginator->counter('{:pages}') > 1) { ?>
                                <div class="dataTables_paginate paging_bootstrap_full_number">
                                    <ul class="pagination pull-right">
                                        <li class="prev">
                                            <?php echo $this->Paginator->prev('<i class="fa fa-angle-double-left"></i>', array('class' => 'prev', 'tag' => 'li', 'escape' => false), null, array('class' => 'left-arrow disabled', 'tag' => 'a', 'escape' => false)); ?>
                                        </li>
                                        <?php echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active', 'modulus' => 5)); ?>
                                        <li class="next">
                                            <?php echo $this->Paginator->next('<i class="fa fa-angle-double-right"></i>', array('class' => 'next', 'escape' => false), null, array('class' => 'next disabled', 'escape' => false)); ?>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php */ ?>
                </div>
               
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>
<?php echo $this->start('footer_js')?>
<script>
$(document).on('click','.allcheck',function(){
	
	 if($(this).prop('checked')){
		 
		 $('.icheck').attr('checked', true); 
		 $(".icheckbox_minimal-grey").addClass("checked");
	 }else{
		 $('.icheck').attr('checked', false); 
		 $(".icheckbox_minimal-grey").removeClass("checked");
	 }

	
});
</script>
<?php echo $this->end('footer_js')?>

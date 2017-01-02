<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <?php echo $title_for_layout; ?>
                </div>
                <div class="actions">
                    <i class=""></i>
                </div>
            </div>
            <div class="portlet-body form">
            <?php
                echo $this->Form->create('Aco', array(
                    'inputDefaults' => array(
                        'div' => false,
                        'label' => false
                    )
                )); ?>
                <div class="widget-body  table-responsive candi_search_outer" style="max-width: 100%;overflow-x: auto">
                    <table class="table table-bordered table-striped smart-form smart-form2 smart-table-form3  less-height permissionTable">
                        <tbody>
                            <tr>
                                <td class="align-left" style="padding-left: 2px"><label class="label" style="color:#000;"><strong>Role Name</strong></label></td>
                                <td colspan="<?php echo $maxChild; ?>"><div class="col-md-1" style="padding-left: 5px">
                                    <label><?php echo ucfirst($role['Role']['title']); ?></label>
                                    <div class="col-md-9"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-left" style="padding-left: 2px"><label class="label" style="color:#000;"><strong>Permissions</strong></label></td>
                                <td colspan="<?php echo $maxChild; ?>"><label class="checkbox1 arc_checks">
                                    <input type="checkbox" class="email_tick_all">Select All </label>
                                </td>
                            </tr> <?php
                            
                            $Groups = array('Candidates', 'Clients', 'BookingSheet', 'Dashboard', 'Permissions', 'Suppliers');
                            foreach ($acos AS $key => $alias) {
                                //set custom name for controllers 
                                if ($alias['Aco']['alias'] == 'Jobs') {
                                	$alias['Aco']['alias'] = 'Enquiries';
                                }
                                
                                $class = 'controller strong-tag ';
                                if (in_array($alias['Aco']['alias'], $Groups)) {
                                    $currentController = $this->Html->tag("strong", $alias['Aco']['alias']);
                                } else {
                                    $currentController = $alias['Aco']['alias'];
                                }

                                $row = array($this->Html->tag('label', $currentController, array('class' => '')));
									
                                if (!empty($alias['children'])) {
                                    foreach ($alias['children'] as $child) {
										if($child['Aco']['alias']=='_admin_index'){
											$child['Aco']['alias']='Lists';
										}
										if($child['Aco']['alias']=='_admin_add'){
											$child['Aco']['alias']='Add';
										}
										if($child['Aco']['alias']=='_admin_edit'){
											$child['Aco']['alias']='Edit';
										}
										if($child['Aco']['alias']=='_admin_delete'){
											$child['Aco']['alias']='Delete';
										}
										
                                        $checked = (!empty($child['Aco']['permission'])) ? "checked" : null;
                                        $checbox = $this->Form->input('aco.' . $child['Aco']['id'] . '.', array(
                                            'type' => 'checkbox',
                                            'label' => false,
											'class' => 'email_tick nowrap',
                                            $checked,
                                            'after' => '&nbsp;' . Inflector::humanize($child['Aco']['alias']),
                                        ));
                                        $row[] = $this->Html->tag('label', $checbox, array('class' => 'checkbox1 arc_checks'));
                                    }
                                    if (count($row) <= $maxChild) {
                                        for ($start = count($row); $start <= $maxChild; $start++) {
                                            $row[] = null;
                                        }
                                    }
                                }
                                echo $this->Html->tableCells(array($row), array('class' => 'nowrap'));
                            } ?>
                            <tr>
                                <td class="align-right"></td>
                                <td colspan="<?php echo $maxChild; ?>">
                                    <div class="col-md-1" style="margin-left: -10px">
                                        <button class="btn blue-hoki">Update</button>
                                    </div>
                                    <div class="col-md-10"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <?php
                echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div> <?php

$this->Html->addCrumb('Roles', array('plugin' => false, 'admin' => true, 'controller' => 'roles'));
$this->Html->addCrumb($title_for_layout, null); 
echo $this->start('footer_js');?>          

<script>

    var isSelected = [];

    $("input:checkbox.email_tick").each(function() {
        if ($(this).is(":checked")) {
            isSelected.push("true");
        } else {
            isSelected.push("false");
        }
    });

    if ($.inArray("false", isSelected) < 0) {
        $('.email_tick_all').attr('checked', true);
    }

    $('.email_tick').click(function() {
        if(!$(this).is(':checked')) {
            $('.email_tick_all').parent('span').removeClass("checked");
        }
            
    });

    $(document).on('click', '.email_tick_all', function() {

        if($(this).prop('checked')) {
            $('.email_tick').attr('checked', true); 
            $(".checker span").addClass("checked");
        }else {
            $('.icheck').attr('checked', false); 
            $(".checker span").removeClass("checked");
            $('input:checkbox').removeAttr('checked');
        }
    });
</script>
<?php echo $this->end();?>

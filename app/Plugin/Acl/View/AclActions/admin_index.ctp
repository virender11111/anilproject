<?php
$this->start('footer_js');
echo $this->Html->script('/acl/js/acl_permissions.js');
$this->Html->scriptBlock("$(document).ready(function(){ AclPermissions.documentReady(); });", array('inline' => false));
$this->end('footer_js');
?>



<section id="widget-grid" class="">
    <div class="row">
        <article class="col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget jarviswidget-color-greenLight" id="wid-id-3" data-widget-editbutton="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

                -->
                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Group Permissions </h2>

                </header>
                <div>
                    <div class="jarviswidget-editbox">

                    </div>
                    <div class="widget-body no-padding">

                        <table class="table large-table">

                            <?php
                            $tableHeaders = $this->Html->tableHeaders(array(
                                __('Id'),
                                __('Alias'),
                                __('Actions'),
                            ));
                            echo $tableHeaders;

                            $currentController = '';
                            foreach ($acos AS $id => $alias) {
                                $class = '';
                                if (substr($alias, 0, 1) == '_') {
                                    $level = 1;
                                    $class .= 'level-' . $level;
                                    $oddOptions = array('class' => 'softHiddencontroller-' . str_replace(" ", "-", $currentController));
                                    $evenOptions = array('class' => 'softHiddencontroller-' . str_replace(" ", "-", $currentController));
                                    $alias = Inflector::humanize(substr_replace($alias, '', 0, 1));
                                } else {
                                    $level = 0;
                                    $class .= ' controller expand strong-tag';
                                    $oddOptions = array('class'=>'success');
                                    $evenOptions = array('class'=>'success');
                                    $currentController = $alias;
                                }

                                $actions = $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $id),array('escape'=>false,'title'=>'Edit'));
                                $actions .= ' ' . $this->Form->postLink('<i class="fa fa-trash-o"></i>', array(
                                            'action' => 'delete',
                                            $id,
                                                ), array('class'=>'','escape'=>false,'title'=>'Delete'), __('Are you sure?'));
                                $actions .= ' ' . $this->Html->link(__('<i class="fa fa-arrow-up"></i>'), array('action' => 'move', $id, 'up'),array('escape'=>false,'title'=>'Move Up'));
                                $actions .= ' ' . $this->Html->link(__('<i class="fa fa-arrow-down"></i>'), array('action' => 'move', $id, 'down'),array('escape'=>false,'title'=>'Move Down'));

                                $row = array(
                                    $id,
                                    $this->Html->div($class, $alias),
                                    $actions,
                                );

                                echo $this->Html->tableCells(array($row), $oddOptions, $evenOptions);
                            }
                            echo $tableHeaders;
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>



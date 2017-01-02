<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="<?php //echo $this->Admin->icons($controller); ?>"></i>
                    <?php echo $this->fetch('title'); ?>
                </div>
                <div class="actions">
                    <?php
                    if ($btn = trim($this->fetch('btn'))):
                        echo $btn;
                    endif;
                    ?>

                </div>
            </div>
            <div class="portlet-body">
                <?php
                if ($formStart = trim($this->fetch('form-start'))):
                    echo $formStart;
                else:
                    echo $this->Form->create($modelClass);
                endif;
                ?>
                <div class="table-container ">

                    <div class="">
                        <label>
                            Page <?php
                            echo $this->Form->input('page', array(
                                'options' => $this->Layout->pagesList($this->Paginator->counter('{:pages}')),
                                'class' => 'table-group-action-input form-control input-inline  input-sm jump_page_num',
                                'label' => false,
                                'value' => $this->Paginator->counter('{:page}'),
                                'empty' => false,
                                'div' => false
                                    )
                            );
                            ?>
                            of <?php echo $this->Paginator->counter('{:pages}'); ?>
                        </label>
                        <label>
                            <span class="seperator">|</span>
                            View <?php
                            echo $this->Form->input('limit', array(
                                'options' => $this->Layout->limitOtions(),
                                'class' => 'table-group-action-input form-control input-inline jump_page_view  input-sm',
                                'label' => false,
                                'value' => (!empty($this->params->params['named']['limit'])) ? $this->params->params['named']['limit'] : '20',
                                'data-url' => $this->Html->url(array('action' => '/' . str_replace("admin_", "", $action))),
                                'empty' => false,
                                'div' => false
                                    )
                            );
                            ?>
                            records
                        </label>
                        <label class="pull-right">
                            <?php
                            if ($tableActions = trim($this->fetch('table_actions'))):
                                echo $tableActions;
                                echo " " . $this->Form->button('<i class="fa fa-check"></i> Submit', array('escape' => false, 'class' => 'btn btn-sm yellow table-group-action-submit', 'disabled' => 'disabled', 'id' => 'place_check', 'type' => 'button'));
                            endif;
                            ?>
                        </label>
                    </div>
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover" id="psdata_table">
                            <thead>
                                <?php echo $this->fetch('table_head'); ?>
                            </thead>
                            <tbody>
                                <?php echo $this->fetch('table_row'); ?>
                            </tbody>
                        </table>
                    </div>

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
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>

<!--                    <div class="btn-group">
                                            <a class="btn default yellow-stripe dropdown-toggle" href="#" data-toggle="dropdown">
                                                <i class="fa fa-share"></i> Tools <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="#">
                                                        Export to Excel </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Export to CSV </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Export to XML </a>
                                                </li>
                                                <li class="divider">
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Print Invoices </a>
                                                </li>
                                            </ul>
                                        </div>-->
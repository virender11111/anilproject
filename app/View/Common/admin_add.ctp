<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="<?php echo $this->Admin->icons($controller); ?>"></i>
                    <?php echo $this->fetch('title'); ?>
                </div>
                <div class="actions">
                    <?php
                    if ($btn = trim($this->fetch('btn'))):
                        echo $btn;
                    endif;
                    if ($btn1 = trim($this->fetch('btn1'))):
                        echo $btn1;
                    endif;
                    if ($btn2 = trim($this->fetch('btn2'))):
                        echo $btn2;
                    endif;
                    ?>

                </div>
            </div>

            <div class="portlet-body form">
                <br/>
                <!-- BEGIN FORM-->
                <?php
                if ($formStart = trim($this->fetch('form-start'))):
                    echo $formStart;
                else:
                    echo $this->Form->create($modelClass);
                    if (isset($this->request->data[$modelClass]['id'])):
                        echo $this->Form->input('id');
                    endif;
                endif;
                ?>
                <div class="form-body form">
                    <?php
                    echo $this->fetch('form');
                    if (!$submitBtn = trim($this->fetch('btn-submit'))):
                        $submitBtn = $this->Form->button('Submit', array('class' => 'btn blue-hoki'));
                    endif;

                    if (!$caneclBtn = trim($this->fetch('btn-cancel'))):
                        $caneclBtn = $this->Html->link('Cancel', array('action' => 'index'), array('class' => 'btn default margin-left10'));
                    endif;
                    ?>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9 new007">
                                <?php
                                if (!$this->fetch('btn-submit-disable')) {
                                    echo $submitBtn;
                                    echo $caneclBtn;
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>    
                <?php
                if ($formEnd = trim($this->fetch('form-end'))):
                    echo $formEnd;
                else:
                    echo $this->Form->end();
                endif;
                ?>
            </div>
        </div>
        <!-- END VALIDATION STATES-->

        <?php if ($ttt = trim($this->fetch('portlet-body'))) { ?>
            <div  class="form-horizontal" >
                <div class="form-body form">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <?php echo $this->fetch('portlet-title'); ?>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php echo $ttt; ?>
                        </div>
                    </div>  </div>
            </div>  

        <?php }
        ?>


        <?php
        if ($portlet_title = trim($this->fetch('portlet_title')))
            echo $portlet_title;
        ?>


    </div>
</div>

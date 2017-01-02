<section id="widget-grid" class="">
    <div class="row">
        <article class="col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2>Permission Add </h2>
                </header>
                <div>

                    <div class="widget-body no-padding">
                        <?php echo $this->Form->create('Aco', array('url' => array('controller' => 'acl_actions', 'action' => 'edit'), 'class' => 'disable_force_save smart-form','inputDefaults'=>array('label'=> false,'div'=>false))); ?>
                        <fieldset>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="label">Parent</label>
                                    <label class="select">
                                        <?php
                                        echo $this->Form->input('id');
                                        echo $this->Form->input('parent_id', array(
                                            'options' => $acos,
                                            'empty' => true,
                                            'rel' => __('Choose none if the Aco is a controller.'),
                                        ));
                                        
                                        ?>
                                        
                                    </label>
                                </section>
                            </div>
                            
                            <div class="row">
                                <section class="col col-3">
                                    <label class="label">Alias</label>
                                    <label class="input">
                                        <?php
                                        echo $this->Form->input('name', array());
                                        ?>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="label">Name</label>
                                    <label class="input">
                                        <?php
                                        echo $this->Form->input('name', array());
                                        ?>
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <footer>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </footer>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>

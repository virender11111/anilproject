<div class="filters">
    <div class="bs-example">Comparison Model</div>
    <div class="btn-group">    
        <button class="btn btn-default dropdown-toggle model_drop" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
            <?php echo (!empty($models[$model])) ? $models[$model] : 'Select a model'; ?>
            <span class="caret"></span>
        </button> <?php
            unset($models[$model]);
            $rows = array();
            foreach ($models as $key => $model) {
                $row = null;
                $row = $this->Html->link($model, array($key, Inflector::slug(strtolower($model))));

                $rows[] = $row;
            }
            echo $this->Html->nestedList($rows, array('class' => 'dropdown-menu', 'role' => "menu", 'aria-labelledby' => "dropdownMenu1"));
            ?>
    </div>
</div>
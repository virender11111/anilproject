<div class="container Main-row">
    <div class="common-panel margin-bot-40">
        <div class="common-panel-title"><span>Reset Password </span></div>
        <div class="common-panel-content">
            <?php echo $this->Form->create("User", array("novalidate")); ?>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ul class="row Panel-field form-page-field">
                        <?php
                        echo $this->Form->input("password", array(
                            "type" => "password",
                            "required",
                            'before' => '<li class="col-xs-12"><div class="Field-col">',
                            'after' => '</div></li>',
                            'legend' => false,
                            'fieldset' => false,
                            "div" => false,
                            "label" => false,
                            "placeholder" => "Password"
                        ));
                        echo $this->Form->input("confirm_password", array(
                            "type" => "password",
                            "required",
                            'before' => '<li class="col-xs-12"><div class="Field-col">',
                            'after' => '</div></li>',
                            'legend' => false,
                            'fieldset' => false,
                            "div" => false,
                            "label" => false,
                            "placeholder" => "Confirm Password"
                        ));
                        ?>
                    </ul>
                </div>
            </div>
            <div class="Bottom-button Bottom-one-button">
                <input  type="submit" value="Submit" class="orange-btn">
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>

<?php
echo $this->start('footer_js');
?>

<script>
    $(function () {
        Hopajim.hopajimResetPage();
    })
</script>
<?php
echo $this->end();
?>
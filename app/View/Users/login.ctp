<div class="home-heading1">
    <h2>START LIVING HEALTHY TODAY</h2>
    <span>Join the most effective fitness community in the world</span> </div>
<ul class="row banner-panel-row">
    <li class="col-md-8 col-sm-8 col-xs-12"> <a href="javascript:void(0)">
            <div class="banner-panel">
                <?php echo $this->Html->image('parkur.jpg'); ?>
                <div class="banner-panel-caption">Parkur</div>
            </div>
        </a> </li>
    <li class="col-md-4 col-sm-4 col-xs-12 col-xs-12"> <a href="javascript:void(0)">
            <div class="banner-panel">
                <?php echo $this->Html->image('run.jpg'); ?>
                <div class="banner-panel-caption">Run</div>
            </div>
        </a> </li>
</ul>

<?php echo $this->Form->create('User', array('inputDefaults' => array('div' => false, 'label' => false), 'class' => 'form-vertical login-form')); ?>
<h3 class="form-title">Sign In</h3>
<?php echo $this->Session->flash('auth'); ?>
<div class="alert alert-danger display-hide" style="display: none;">
    <button class="close" data-close="alert"></button>
    <span>
        Enter Email Address and password. </span>
</div>
<div class="form-group">
    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
    <label class="control-label visible-ie8 visible-ie9">Email Address</label>
    <?php echo $this->Form->input('email', array('class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Email Address', 'autocomplete' => "off", 'value' => (isset($cookie_user["User"]["email"]) ? $cookie_user["User"]["email"] : null))); ?>
</div>
<div class="form-group">
    <label class="control-label visible-ie8 visible-ie9">Password</label>
    <?php echo $this->Form->input('password', array('class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Password', 'autocomplete' => "off", 'value' => (isset($cookie_user["User"]["password"]) ? $cookie_user["User"]["password"] : null))); ?>
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-success uppercase">Login</button>
    <label class="rememberme check">
        <?php // echo $this->Form->input('remember_me', array('class' => "form-control", 'type' => 'checkbox', 'text' => 'Remember Me')); ?>
        <input type="checkbox"  name="data[User][remember_me]" value="1" /> Remember Me </label>
</div>

<div class="login-options">
    <label><?php echo $this->Html->link('Forgot Password?', array('controller' => 'users', 'action' => 'forgot_pass'), array('class' => 'forget-password')); ?></label>

</div>





<ul class="row banner-panel-row">
    <li class="col-md-4 col-sm-4 col-xs-12 col-xs-12"> <a href="javascript:void(0)">
            <div class="banner-panel">
                <?php echo $this->Html->image('cross-fit.jpg'); ?>
                <div class="banner-panel-caption">Cross fit</div>
            </div>
        </a> </li>
    <li class="col-md-4 col-sm-4 col-xs-12 col-xs-12"> <a href="javascript:void(0)">
            <div class="banner-panel">
                <?php echo $this->Html->image('aero.jpg'); ?>
                <div class="banner-panel-caption">Aero</div>
            </div>
        </a> </li>
    <li class="col-md-4 col-sm-4 col-xs-12 col-xs-12"> <a href="javascript:void(0)">
            <div class="banner-panel">
                <?php echo $this->Html->image('zumba.jpg'); ?>
                <div class="banner-panel-caption">Zumba</div>
            </div>
        </a> </li>
</ul>

<?php
$status = null;
if ($this->Session->check('accountActivate')) {
    $accountActivate = $this->Session->read('accountActivate');

    if ($accountActivate["status"]) {
        $status = "success";
        $message = $accountActivate["message"];
    } else {
        $status = "danger";
        $message = $accountActivate["message"];
    }
    $this->Session->delete('accountActivate');
}
echo $this->start("footer_js");
if (!is_null($status)) {
    ?>
    <script type="text/javascript">
        $(function () {
            Hopajim.notification('<?php echo $status; ?>', '<?php echo $message; ?>');
        });
    </script>
    <?php
}
echo $this->end();
?>   
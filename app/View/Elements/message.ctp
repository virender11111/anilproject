<div class="alert alert-<?php echo $class; ?> flash_notification" role="alert" >
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php
    if ($class == 'danger') {
        echo '<strong>Oops!</strong>';
    } elseif ($class == 'success') {
        echo '<strong>Success!</strong>';
    } elseif ($class == 'info') {
        echo '<strong>General!</strong>';
    } elseif ($class == 'warning') {
        echo '<strong>Notice!</strong>';
    }
    ?>
    <?php echo $message; ?>
</div>

<?php echo $this->start("footer_js"); ?>
<script>
    $(function () {
        setTimeout(function () {
            $(".flash_notification").slideUp("slow");
        }, 5000)
    })
</script>
<?php echo $this->end(); ?>
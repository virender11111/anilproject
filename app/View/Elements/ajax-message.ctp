<div id='flash_message' class="alert alert-dismissible alert-success hide" role="alert" >
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>

<?php echo $this->start('footer_js'); ?>
<script>
    $(document).ready(function () {
        $('#flash_message').fadeIn('fast').delay(5000).fadeOut('slow');
    })
</script>
<?php echo $this->end(); ?>
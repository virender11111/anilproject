<div class="container">
    <div class="row-fluid">
        <div class="col-md-12 clearfix">   
            &nbsp;
        </div> 
    </div>
</div>

<div class="container">

    <!-- COLUMN 2 -->
    <div class="col-md-12">   
        <div class="custom-container iframe-page">
            <iframe frameborder="0" onload='javascript:resizeIframe(this);' scrolling="no" src="<?php echo Router::url("/", true) . "blog"; ?>"></iframe>
        </div> <!-- custom-container -->

    </div>   <!-- COLUMN 2 -->

</div>

<!-- Javascript function to set height based on page content-->
<script language="javascript" type="text/javascript">
    function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }
</script>
<style>
    .iframe-page iframe{ border: none; overflow:hidden; width: 100%;}
</style>
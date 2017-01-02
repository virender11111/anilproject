<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
	<div class="buzz-right-page buzz-inner-page">
		<?php echo $page_details['Page']['description'];?>
    </div>
</div>
<?php echo $this->start("footer_js"); ?>
<script type="text/javascript">
	$(document).ready(function() { <?php
		if(isset($banner_alt_tag) && !empty($banner_alt_tag)) { ?>
			$("#buzz_banner_image").attr("alt", "<?php echo $banner_alt_tag; ?>"); <?php
		}
		?>
	});
</script>
<?php echo $this->end(); ?>
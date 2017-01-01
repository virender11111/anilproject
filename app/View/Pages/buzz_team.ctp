<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
	<div class="buzz-right-page buzz-inner-page">
		<div class="common-title buzz-common-title">
			<h3><?php echo $page_details['Page']['title']; ?></h3>
		</div>
		<p><?php echo $page_details['Page']['description']; ?></p>
		<div class="our-team-row buzz-team"> <?php
			foreach($buzz_teams as $single) { ?>
				<div class="team-panel margin-bot-30">
					<img class="img img-circle" src="<?php echo Router::url('/', true).'files/buzz_team/image/'.$single['BuzzTeam']['id'].'/'.$single['BuzzTeam']['image']; ?>" alt="<?php echo $single["BuzzTeam"]["name"].' - Disability support staff'; ?>" width="219" height="230" />
					<h3><?php echo $single["BuzzTeam"]["name"]; ?></h3>
					<p><?php echo $single["BuzzTeam"]["description"]; ?></p>
				</div> <?php
			} ?>
		</div>
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
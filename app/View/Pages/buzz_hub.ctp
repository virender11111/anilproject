<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
	<div class="buzz-right-page">
		<div class="buzz-panel"> <?php
			foreach($buzz_sessions as $single) { ?>
				<div class="buzz-panel-col radius-5px">
					<div class="buzz-img-col">
						<figure>
							<img src="<?php echo Router::url('/', true).'files/buzz_session/image/'.$single["BuzzSession"]["id"].'/'.$single["BuzzSession"]["image"]; ?>" alt="<?php echo $single["BuzzSession"]["title"].' - disability Support services'; ?>" width="282" height="149" />
						</figure>
					</div>
					<div class="buzz-content-col">
						<div class="buzz-content">
							<div class="buzz-content-inner">
								<h2><?php echo $single["BuzzSession"]["title"]; ?></h2>
								<p><?php echo $single["BuzzSession"]["description"]; ?></p>
							</div>
						</div>
					</div>
				</div> <?php
			} ?>
		</div>
	</div>
</div>
  
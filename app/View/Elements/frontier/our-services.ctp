<div class="sidebar-row2 margin-bot-20">
  	<div class="sidebar-title radius-3px">Our Services</div>
	<div class="sidebar-content">
		<ul class="sidebar-menu"> <?php
			foreach($service_list as $allservices){?>
					<li>
						<a href="<?php echo Router::url('/what-we-do/', true); ?>"><?php echo $allservices['Service']['title']; ?></a>
					</li> <?php
				} ?>
		</ul>
	</div>
</div>
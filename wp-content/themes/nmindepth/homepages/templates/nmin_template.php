<div id="homepage-top" class="row-fluid">
	<div class="span8">
		<?php echo $hp_top_story; ?>
	</div>
	<div id="sidebar" class="span4">
		<?php echo $hp_two_stories; ?>
	</div>
</div>

<div id="homepage-bottom-row">
	<div class="row-fluid">
		<div class="span8">
			<?php
				get_template_part( 'partials/home', 'bottom-widget-area' );
			?>
		</div>
		<div class="span4">
			<?php
				get_template_part( 'partials/sidebar' );
			?>
		</div>
	</div>
</div>

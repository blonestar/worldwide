<div class="cta-list-webpart">
	<div class="icon-logo-globe"></div>
	<?php if (get_sub_field('title')) { ?>
	<div class="cta-title">
		<?php the_sub_field('title') ?>
	</div>
	<?php } ?>
	<?php if (get_sub_field('documents')) { ?>
	<ul class="cta-items">
		<?php while(have_rows('documents')) { the_row() ?>
		<li class="cta-item">
			<a href='<?php the_sub_field('document__file') ?>' target="_blank">
				<span class='<?php the_sub_field('icon_class') ?>'></span> 
				<?php the_sub_field('name') ?>
			</a>
		</li>
		<?php } ?>
	</ul>
	<?php } ?>
</div>
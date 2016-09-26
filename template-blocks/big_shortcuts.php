<div class="container-wrapper light-container-wrapper no-padding footer-icons-wrapper">
    <div class="container">
		<div class="row">
			<div>
				<?php while (have_rows('shortcuts')) : the_row(); ?>
				<div class="col-sm-3 no-padding">
					<div class="home-cta click-first-link">
						<h3 style="text-align: center;"><?php the_sub_field('title') ?></h3>
						<p style="text-align: center;">
							<span class='<?php the_sub_field('icon') ?>'></span>
						</p>
						<p style="text-align: center;">
							<a href='<?php the_sub_field('link') ?>'><?php the_sub_field('link_text') ?> ›</a>
						</p>
					</div>
				</div>
				<?php endwhile; ?>

			  <div style="clear: both;"></div>
			</div>
		</div>
    </div>
</div>
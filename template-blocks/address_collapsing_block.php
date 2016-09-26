<div class="container-wrapper standard-container-wrapper ">
	<div class="container">
		<div class="collapsible-box-webpart">
			<div class="collapsible-heading active">
				<h2><?php the_sub_field('region') ?></h2>
			</div>
			<?php if (have_rows('country')) { ?>
			<div class="collapsible-content">
				<div class="location-section">
					<?php while(have_rows('country')) { the_row(); ?>
					<div class="row">
						<div>
							<div class="col-md-12 ">
								<div class="location-title">
									<h3><?php the_sub_field('name') ?></h3>
								</div>
							</div>
							<div class="col-md-4 ">
								<?php the_sub_field('column_1') ?>
							</div>
							<div class="col-md-4 ">
								<?php the_sub_field('column_2') ?>
							</div>
							<div class="col-md-4 ">
								<?php the_sub_field('column_3') ?>
							</div>
							<div style="clear: both;"></div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="container-wrapper light-container-wrapper ">
	<div class="container">
		<div class="row">
			<div>
        
				<?php while (have_rows('info_box')) : the_row(); ?>
					<?php $img = get_sub_field('image') ?>
				<div class="home-featured col-sm-4 ">
					<div>
						<div class="col-xs-5 ">
							<p>
								<img alt="<?php echo $img['alt'] ?>" src="<?php echo $img['url'] ?>" />
							</p>
						</div>
						<div class="col-xs-7 ">
							<strong><?php the_sub_field('title') ?></strong><br />
							<?php the_sub_field('description') ?>
							<a href='<?php the_sub_field('link_url') ?>' target="_blank"><?php the_sub_field('link_text') ?> ></a>
						</div>
						<div style="clear: both;"></div>
					</div>
				</div>
				<?php endwhile; ?>


        <div style="clear: both;"></div>
      </div>
    </div>
  </div>
</div>
<div class="row full-width equal-columns">
	<div class="container-wrapper standard-container-wrapper ">
		<div class="container">
			<div>
				<div class="col-sm-6<?php echo (get_sub_field('image_position') == 'left') ? ' col-sm-push-6' : '' ?>"><div class="about-content-box">
						<h2>
							<?php if (get_sub_field('link') != "") { ?><a href="http://www.worldwide.com/therapeutic-areas/"><?php } ?><?php echo get_sub_field('title') ?><?php if (get_sub_field('link') != "") { ?></a><?php } ?></h2>

						<?php the_sub_field("content") ?>

						<?php if (get_sub_field('button_label') != "") { ?>
						<p><?php if (get_sub_field('link') != "") { ?><a class="btn btn-md btn-default" href="/therapeutic-areas/"><?php } ?>Learn More<?php if (get_sub_field('link') != "") { ?></a><?php } ?></p>
						<?php } ?>

					</div>
				</div>
				<div class="col-sm-6<?php echo (get_sub_field('image_position') == 'left') ? ' col-sm-pull-6' : '' ?>">
					<?php $image = get_sub_field('image'); ?> 
					<img id="" class="img-center" src="<?php echo $image['url'] ?>" alt="" />
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>
</div>
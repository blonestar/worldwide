<?php get_header() ?>

<div class="container-wrapper standard-container-wrapper " style="background-color: <?php echo get_field('background_color') ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<?php while(have_posts()) { the_post(); ?>
				<div class="blog-post">
					<div class="title">
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</div>
					<a href="<?php the_permalink() ?>">
						<?php the_post_thumbnail() ?>
					</a>
					<div class="author"> By Dr. Michael Murphy, M.D., Ph.D., 9/21/2016</div>
					<div class="teaser">
						<p><?php the_excerpt() ?></p>
					</div>
					<a href="<?php the_permalink() ?>">Read More ></a>
						
				</div>
				<?php } ?>
			</div>
			<?php if (have_rows('widgets')) { ?>
			<div class="col-sm-4">
				<?php get_template_widgets(get_the_ID()) ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>


<?php get_footer() ?> 
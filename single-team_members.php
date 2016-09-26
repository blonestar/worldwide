<?php get_header() ?>
<?php the_post() ?>

<div class="container-wrapper standard-container-wrapper ">
	<div class="container">
		<div class="row leadership-member-detail">
			<div class="col-md-4">
				<div class="leadership-image">
					<?php the_post_thumbnail()?>
				</div>
			</div>
			<div class="col-md-8">
				<h1 class="leadership-name"><?php the_title() ?></h1>
				<div class="leadership-title"><?php the_field('position') ?></div>
				<?php the_content() ?>
			</div>
		</div>
	</div>
</div>

<div class="container-wrapper gradient-container-wrapper back-bar click-first-link">
	<div class="container">
		<a href="<?php echo site_url('about-us/meet-the-team') ?>">Back to Meet the Team<br />
			<span class="fa fa-angle-down"></span>
		</a>
	</div>
</div>

<?php get_footer() ?> 
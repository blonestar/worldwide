<?php get_header() ?>
<?php the_post() ?>

<?php
	$main_col_width = 10;

	if (have_rows('widgets')) {
		$main_col_width = 7;
	}

?>

<div class="container-wrapper standard-container-wrapper " style="background-color: <?php echo get_field('background_color') ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-<?php echo $main_col_width ?> col-sm-offset-1">2323232
				<?php the_content() ?>
			</div>
			<?php if (have_rows('widgets')) { ?>
			<div class="col-sm-3 col-sm-offset-1">
				<?php get_template_widgets(get_the_ID()) ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
	

<div class="container-wrapper gradient-container-wrapper back-bar click-first-link">
	<div class="container">
		<a href="<?php echo site_url('resources/resource-library') ?>">Back to Resources<br />
			<span class="fa fa-angle-down"></span>
		</a>
	</div>
</div>

<?php get_footer() ?> 
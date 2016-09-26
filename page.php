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
			<div class="col-sm-<?php echo $main_col_width ?> col-sm-offset-1">
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
	
<?php if( have_rows('template_blocks') ): ?>
	<?php get_template_blocks(get_the_ID()) ?>
<?php endif; ?>

<?php get_footer() ?> 
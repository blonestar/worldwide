<?php
/*
 * Template Name: Team Members
 */
?><?php get_header() ?>
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

<?php

$query = new WP_Query(array(
				'post_type' => 'team_members',
				'orderby'	=> 'menu_order',
				'order'		=> 'asc',
				'posts_per_page'	=> -1
			));
if ( $query->have_posts() ) {
?>
<div class="container-wrapper standard-container-wrapper ">
	<div class="container">
		<div class="row">
			<?php while ( $query->have_posts() ) { $query->the_post();	?>
    
			<div class="col-sm-4 leadership-member-summary">
				<a href="<?php the_permalink() ?>">
					<div class="leadership-image">
						<?php the_post_thumbnail() ?>
					</div>
					<div class="leadership-name">
						<h2><?php the_title() ?></h2>
					</div>
					<div class="leadership-title"><?php the_field('position') ?></div>
				</a>
			</div>
			
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>
	
<?php if( have_rows('template_blocks') ): ?>
	<?php get_template_blocks(get_the_ID()) ?>
<?php endif; ?>

<?php get_footer() ?> 
<?php 

// its actualy same as our template, so let include it
//include(get_template_directory().'/templates/resources.php');


?><?php get_header() ?>

<?php
	$main_col_width = 10;

	if (have_rows('widgets')) {
		$main_col_width = 7;
	}
	
	$current_term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
	
	$terms = get_terms( array(
		'taxonomy' => 'resources_tax',
		'hide_empty' => false,
	) );

	
	$all_selected = is_tax() ? "" : " selected";
?>

<div class="container-wrapper standard-container-wrapper ">
	<div class="container">
		<div class="tabs">
			<div class="row">
				<a class="tab<?php echo $all_selected ?>" href="<?php echo site_url('resources/resource-library') ?>">All</a>
				<?php
					$i = 0;
					foreach ($terms as $term) {
						$active = ($term->term_id == get_queried_object()->term_id) ? ' selected' : '';
						if (++$i==5) echo "<br>";
				?>
				<a class="tab<?php echo $active ?>" href="<?php echo site_url('resources/resource-library/' . $term->slug) ?>"><?php echo $term->name ?></a>
				<?php } ?>
			</div>
		</div>
		

		
		
		<div class="library-list">
			<h2 class="alt-heading"><?php echo $current_term->name ?></h2>
			<?php if ( have_posts() ) : ?>
			<div class="row">
				<div>
					<div class="col-sm-12">
					
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="library-item">
							<div class="library-title"><?php the_title() ?></div>
							<?php if (has_excerpt()) { ?>
							<div class="library-summary"><?php the_excerpt() ?></div>
							<?php } else { ?>
							<div class="library-summary"><?php echo wp_strip_all_tags(get_the_excerpt()) ?></div>
							<?php }  ?>
							<div class='read-more '>
								<?php if (($doctype = get_field('document_type')) == 'video') { ?>
								<div class="view-video featured-resource">
									<a href="<?php the_permalink() ?>" target="_blank" data-toggle="modal" data-target=".video-modal" data-title="<?php the_title() ?>"><?php echo get_post_read_label(get_the_ID()); ?> &rsaquo;</a>
								</div>

								<?php } else { ?>
									<a href="<?php the_permalink() ?>"<?php echo ($doctype != 'article') ? ' target="_blank"' : '' ?>><?php echo get_post_read_label(get_the_ID()); ?> &rsaquo;</a>
								<?php } ?>
							</div>
						</div>
						<?php endwhile; ?>

					</div>
				</div>
			</div>
			<?php endif; ?>

		</div>
	</div>
</div>
			
	
<?php if( have_rows('template_blocks') ): ?>
	<?php get_template_blocks(get_the_ID()) ?>
<?php endif; ?>

<?php get_footer() ?> 
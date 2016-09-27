<?php get_header() ?>
<?php the_post() ?>

<?php
	$main_col_width = 10;

	if (have_rows('widgets')) {
		$main_col_width = 7;
	}
	
	
	$terms = get_terms( array(
		'taxonomy' => 'resources_tax',
		'hide_empty' => false,
	) );

?>

<div class="container-wrapper standard-container-wrapper ">
	<div class="container">
		<div class="tabs">
			<div class="row">
				<a class="tab selected" href="<?php echo site_url('resources/resource-library/all') ?>">All</a>
				<?php
					$i = 0;
					foreach ($terms as $term) {
						if (++$i==5) echo "<br>";
				?>
				<a class="tab" href="<?php echo site_url('resources/resource-library/' . $term->slug) ?>"><?php echo $term->name ?></a>
				<?php } ?>
			</div>
		</div>
		<?php if ( have_posts() ) : ?>
		<div class="library-list">
			<h2 class="alt-heading"><?php echo get_query_var( 'term' ) ?></h2>
			<div class="row">
				<div>
					<div class="col-sm-12">
					
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="library-item">
							<div class="library-title"><?php the_title() ?></div>
							<div class="library-summary"><?php the_excerpt() ?></div>
							<div class='read-more '>
								<a href="<?php the_permalink() ?>" target="_blank"><?php echo get_post_read_label(get_the_ID()); ?> &rsaquo;</a>
							</div>
						</div>
						<?php endwhile; ?>

					</div>
				</div>
			</div>
		</div>
		
		<?php endif; ?>
	</div>
</div>
			
	
<?php if( have_rows('template_blocks') ): ?>
	<?php get_template_blocks(get_the_ID()) ?>
<?php endif; ?>

<?php get_footer() ?> 
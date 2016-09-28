<?php
/*
 * Template Name: Resources - Assays
 */
?><?php get_header() ?>
<?php the_post() ?>

<?php
	$main_col_width = 10;

	if (have_rows('widgets')) {
		$main_col_width = 7;
	}
	
?>

<div class="container-wrapper standard-container-wrapper ">
	<div class="container">
		<?php 
		
			$query = new WP_Query(array(
								'post_type'			=> 'assays',
								'posts_per_page'	=> -1,
								'orderby'			=> 'name',
								'order'				=> 'asc'
							));
		if ( $query->have_posts() ) : ?>
		<div class="library-list">
			<div class="row">
				<div>
					<div class="col-sm-12">
					
						<table>
							<tr>
								<th>Analyte Name</th>
								<th>LLOQ</th>
								<th>ULOQ</th>
								<th>Units</th>
								<th>Species</th>
								<th>Matrix</th>
								
							</tr>
					
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<tr>
								<td><?php the_title() ?></td>
								<td><?php the_field('assay_lloq') ?></td>
								<td><?php the_field('assay_uloq') ?></td>
								<td><?php the_field('assay_units') ?></td>
								<td><?php the_field('assay_species') ?></td>
								<td><?php the_field('assay_matrix') ?></td>
							</tr>
						<?php endwhile; ?>

						</table>
						
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
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
					
						<table id="assays" class="display">
							<thead>
								<tr>
									<th>Analyte Name</th>
									<th>LLOQ</th>
									<th>ULOQ</th>
									<th>Units</th>
									<th>Species</th>
									<th>Matrix</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Analyte Name</th>
									<th>LLOQ</th>
									<th>ULOQ</th>
									<th>Units</th>
									<th>Species</th>
									<th>Matrix</th>
								</tr>
							</tfoot>

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


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css"> 
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

<script>
	jQuery(document).ready(function($){
		$('#assays').DataTable({
			//"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			ajax: {
				url: BASE+'/wp-admin/admin-ajax.php?action=assays_ajax_search',
				dataSrc: '',
			},
				columns: [
					{ data: 'name' },
					{ data: 'lloq' },
					{ data: 'uloq' },
					{ data: 'units' },
					{ data: 'species' },
					{ data: 'matrix' }
				]
		});
	});
</script>

<?php get_footer() ?> 
<div class="container-wrapper standard-container-wrapper home-solutions">
	<div class="container">
		<div class="row">
		
<div class="collapsible-box-webpart">
	<div class="collapsible-heading active">
		<h2><?php the_sub_field('title') ?></h2>
	</div>
	<div class="collapsible-content" >
		<div class="row">
			<?php 
				$posts = get_sub_field('links');
				foreach($posts as $post) : 
					
					//$img = get_field('feature_image_negativ', $post->ID);
					
					//$featured_img_id = get_post_thumbnail_id( $post->ID );
					$featured_img_id = get_the_post_thumbnail( $post->ID, 'thumbnail' );
					//print_r( wp_get_attachment_image_src($featured_img_id, 'large') );
					//print_r( $featured_img_id );
					
					//echo $img['url'];
					//the_post_thumbnail
					
					//print_r($post);

			?>	
	
			<div class="col-sm-4">
				<div class="content-icon-webpart">
					<div class="ca-icon">
						<a href='<?php the_permalink($post->ID) ?>'>
							<?php echo $featured_img_id ?>
						</a>
					</div>
					<div class="ca-content">
						<div class="ca-heading">
							<a href='<?php the_permalink($post->ID) ?>'><?php echo $post->post_title ?></a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>


		</div>
	</div>
</div>

</div>
</div>
</div>

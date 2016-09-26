<div class="container-wrapper blue-container-wrapper home-solutions">
	<div class="container">
		<div class="row">
			<h2 style="text-align: center;"><?php the_sub_field('title') ?></h2>
		</div>
		<div class="row is-flex">
		<?php 
			$posts = get_sub_field('links');
			foreach($posts as $post) : 
				
				$img = get_field('feature_image_negativ', $post->ID);

		?>
		
			<div class="col-sm-4">
				<div class="content-icon-webpart">
					<div class="ca-icon">
						<a href='<?php the_permalink($post->ID) ?>'>
							<img alt="" src="<?php echo $img['url'] ?>" />
						</a>
					</div>
					<div class="ca-content">
						<div class="ca-heading">
							<a href='<?php the_permalink($post->ID) ?>'><?php echo $post->post_title ?></a>
						</div>
						<div class="ca-copy"></div>
						<div class="ca-link">
							<a href='<?php the_permalink($post->ID) ?>'>Learn More ›</a>
						</div>
					</div>
				</div>
			</div>


		<?php endforeach; ?>
		</div>

		<?php if (get_sub_field('button_text')) { ?>
		<div class="row">
			<p style="text-align: center;"><a class="btn btn-sm btn-hollow _gt" data-action="Learn More" data-category="Home POP" data-label="Solutions" href="<?php echo get_sub_field('button_url') ?>"><?php echo get_sub_field('button_text') ?></a></p>
		</div>
		<?php } ?>
		
		<div class="row">
			<div>
				<div style="clear: both;"></div>
			</div>
		</div>

	</div>
</div>
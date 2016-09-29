<?php
/*
 * Template Name: In The News Articles
 */
?><?php get_header() ?>
<?php the_post() ?>

<?php get_template_blocks(get_the_ID()) ?>


<div class="container-wrapper standard-container-wrapper ">
	<div class="container">
		<div class="news-list">
		
			<?php
				$args = array( 'post_type' => 'in_the_news', 'posts_per_page' => -1 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();

			?>
			<div class="news-item">
				<div class="news-title">
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				</div>
				<div class="news-summary-date">
					<span class="news-date"><strong><?php the_date() ?></strong></span>
					<span class="news-summary"><?php the_excerpt() ?></span>
				</div>
				<div class='read-more '>
					<?php if (get_field('document_type') == 'video') { ?>
					<div class="view-video featured-resource">
						<a href="<?php the_permalink() ?>" target="_blank" data-toggle="modal" data-target=".video-modal" data-title="<?php the_title() ?>"><?php echo get_post_read_label(get_the_ID()); ?> &rsaquo;</a>
					</div>

					<?php } else { ?>
						<a href="<?php the_permalink() ?>" target="_blank"><?php echo get_post_read_label(get_the_ID()); ?> &rsaquo;</a>
					<?php } ?>
				</div>
			</div>
			<?php
				endwhile;
			?>
		</div>
	</div>
</div>

  


<?php get_footer() ?> 
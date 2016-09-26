<div class="image-slider-webpart">
	<?php while (have_rows('slides')) : the_row(); ?>
		<?php $img = get_sub_field('image') ?>
		<div class="image-slide">
			<img id="" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>" />
		</div>
    <?php endwhile; ?>
    <span class="prev-slide"></span>
    <span class="next-slide"></span>
</div>
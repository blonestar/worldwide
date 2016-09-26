<?php get_header() ?>
<?php the_post() ?>

<div class="container-wrapper standard-container-wrapper ">
	<div class="container">
		<div class="row">
			<div>
				<div class="col-sm-10 col-sm-offset-1">
					<?php the_content() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer() ?> 
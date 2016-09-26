<div class="hero-video-webpart hero-xl  dark-image  mobile-scaled ">
    <div class="img-bg" style="background-image: url(<?php echo get_sub_field('video_poster_background_image_file') ?>); background-repeat: no-repeat;"></div>
      <video src="<?php echo get_sub_field('video_file') ?>" loop poster="<?php echo get_sub_field('video_poster_background_image_file') ?>" autoplay="" muted=""></video>
    <div class="container">
        <div class="row hero-content textInMiddle heroContentBanner ">
            <div class="col-sm-10 col-sm-push-1">
                <div class="hero-container centerText" style="width: 95%;">
					<?php the_sub_field('text') ?>

					 <div class="col-sm-12 ">
						<p style="text-align: center;">
							<a class="btn btn-hollow btn-lg _gt" data-action="Learn More" href="<?php echo get_sub_field('button_link') ?>"<?php echo (get_sub_field('open_in_new_tab')) ? ' target="_blank"' : ''; ?>><?php echo get_sub_field('button_text') ?></a>
						</p>
					</div>
                </div>
            </div>
        </div>
    </div>
  <div class="down-arrow"><span class="scroll-text">Scroll Down</span><span class="icon-down-arrow"></span></div>
</div>
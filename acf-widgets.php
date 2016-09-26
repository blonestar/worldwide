<div class="cta-list-webpart">
	<div class="icon-logo-globe"></div>
	<?php if (get_sub_field('title')) { ?>
	<div class="cta-title">
		<?php the_sub_field('title') ?>
	</div
	<?php } ?>
	<?php if (get_sub_field('documents')) { ?>
	<ul class="cta-items">
		<?php while(have_rows('documents')) { the_row() ?>
		<li class="cta-item">
			<a href='https://www.worldwide.com/getattachment/19da653e-0eaa-4bcd-a521-e1848a795298/Minimising-Placebo-Response-in-Chronic-Pain-Trials/' target="_blank">
				<span class='icon icon-neuron'></span> 
				Pain Trials
			</a>
		</li>
		<?php } ?>
	</ul>
	<?php } ?>
</div>
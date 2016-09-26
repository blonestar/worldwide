<?php

function get_template_blocks($page_id) {
	
	if( have_rows('template_blocks', $page_id) ):

		while ( have_rows('template_blocks', $page_id) ) : the_row();

			if (get_row_layout() == "template_block") {
				
				//echo get_row_layout() . ".php";

				$templ = get_sub_field('template_block' );
				if (get_sub_field('hide')  !== true) {
				//var_dump(get_sub_field('hide'));
					get_template_blocks($templ->ID);
					
				}
				
			} else {
				//echo get_row_layout() . ".php";
				if (get_sub_field('hide')  !== true){
					include(get_row_layout() . ".php");
				//var_dump(get_sub_field('hide'));
					
				}

			}
			
		endwhile;

	endif;

}

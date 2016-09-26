<?php

/*
 * dependencies (ACF,...)
 */
if( !is_admin() && !class_exists('Acf') ) {
    //die( 'ACF plugin is required by the theme, please inform administrator.<br>Install it for free <a href="https://wordpress.org/plugins/advanced-custom-fields/">here</a>.' );
    die( 'ACF plugin is required by the theme, please inform administrator.' );
}
function worldwide_admin_notice__error() {
	if( ! class_exists('Acf') ) {
		$class = 'notice notice-error';
		$message = 'Theme error! <a href="' . get_admin_url(null, 'plugin-install.php?tab=plugin-information&plugin=advanced-custom-fields&TB_iframe=true&width=600&height=550') . '">ACF plugin</a> is required in order to run the theme.';
		printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message ); 
	}
}
add_action( 'admin_notices', 'worldwide_admin_notice__error' );


/*
 * hide ACF from ordinary users
 */
function worldwide_acf_show_admin( $show ) {
    return current_user_can('manage_options');
}
add_filter('acf/settings/show_admin', 'worldwide_acf_show_admin');


/*
 * ACF options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'Wordwide Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'general-settings',
	));
	
}


/*
 * Adding Content to Tab (ACF)
 */
function my_acf_admin_head() {
    ?>
    <script type="text/javascript">
    (function($) {
        
        $(document).ready(function(){
            
            $('.acf-field-57e76cc1b1ec1 .acf-input').append( $('#postdivrich') );
            
        });
        
    })(jQuery);    
    </script>
    <style type="text/css">
        .acf-field #wp-content-editor-tools {
            background: transparent;
            padding-top: 0;
        }
    </style>
    <?php    
    
}
add_action('acf/input/admin_head', 'my_acf_admin_head');

/*
 * Combining ACF Tabs
 */
add_action('admin_footer', function() {

	$screen = get_current_screen();
	if ( $screen->base == 'post' ) {
		echo '
		<!-- ACF Merge Tabs -->
		<script>		

			var $boxes = jQuery(".postbox .acf-field-tab").parent(".inside");

			if ( $boxes.length > 1 ) {

			    var $firstBox = $boxes.first();

			    $boxes.not($firstBox).each(function(){
				    jQuery(this).children().appendTo($firstBox);
				    jQuery(this).parent(".postbox").remove();				    
			    });
				
			}
			
		</script>';
	}
	
});


/*
 * ACF - get template block from ./template-blocks folder
 */
function get_template_blocks($page_id) {
	
	if( have_rows('template_blocks', $page_id) ):

		while ( have_rows('template_blocks', $page_id) ) : the_row();

			if (get_row_layout() == "template_block") {

				$templ = get_sub_field('template_block' );
				if (get_sub_field('hide')  !== true)
					get_template_blocks($templ->ID);
				
			} else {
				
				if (get_sub_field('hide')  !== true) {
					if (file_exists(get_template_directory() . "/template-blocks/" . get_row_layout() . ".php")) {
						include(get_template_directory() . "/template-blocks/" . get_row_layout() . ".php");
					} else {
						echo "<h4>Template block file missing!<br>/template-blocks/" . get_row_layout() . ".php</h4>";
					}
				}
			}
			
		endwhile;

	endif;
	
}

function get_template_block_by_id($block_id) {
	
	
}
/*
function get_template_widgets($page_id) {
	
if( have_rows('widgets', $page_id) ):

		while ( have_rows('widgets', $page_id) ) : the_row();

			if (get_row_layout() == "widgets") {

				$templ = get_sub_field('documents' );
				if (get_sub_field('hide')  !== true)
					get_template_widgets($templ->ID);
				
			} else {
				
				if (get_sub_field('hide')  !== true)
					include(get_template_directory() . "/template-blocks/" . get_row_layout() . ".php");
				
			}
			
		endwhile;

	endif;
	
}


*/

function get_template_widgets($page_id) {
	
	
	if( have_rows('widgets', $page_id) ):

		while ( have_rows('widgets', $page_id) ) : the_row();
		
			get_template_blocks(get_sub_field('widget'));
	
		endwhile;
		
	endif;
	
}





/*
 * --------------- theme setup ------------------
 */
function worldwide_setup() {

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'main-menu' 	=> __( 'Main Menu' ),
			'top-menu' 		=> __( 'Top Menu' ),
			'mobile-menu' 	=> __( 'Mobile Menu' )
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		//'search-form',
		//'comment-form',
		//'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'worldwide_setup' );


/**
 * enqueue scripts and styles.
 */
function worldwide_theme_name_scripts() {
	
    wp_enqueue_style( 'font', '//cloud.typography.com/6357712/764768/css/fonts.css');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style( 'favicon', get_template_directory_uri() . '/img/favicon.ico');
	
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'iscroll', get_template_directory_uri() . '/js/iscroll.js', array('jquery'), '', true );
    wp_enqueue_script( 'jquery.scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'tracking', get_template_directory_uri() . '/js/tracking.js', array('jquery'), '', true );
    wp_enqueue_script( 'wwctrials', get_template_directory_uri() . '/js/wwctrials.js', array('jquery'), '', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'worldwide_theme_name_scripts' );








/*
 * --------------- custom post types ------------------
 */
 
// Register Custom Post Type
function template_blocks_post_type() {

	$labels = array(
		'name'                  => _x( 'Template blocks', 'Post Type General Name', 'worldwide' ),
		'singular_name'         => _x( 'Template blocks', 'Post Type Singular Name', 'worldwide' ),
		'menu_name'             => __( 'Template blocks', 'worldwide' ),
		'name_admin_bar'        => __( 'Template blocks', 'worldwide' ),
		'archives'              => __( 'Item Archives', 'worldwide' ),
		'parent_item_colon'     => __( 'Parent Item:', 'worldwide' ),
		'all_items'             => __( 'All Template Blocks', 'worldwide' ),
		'add_new_item'          => __( 'Add New Template Block', 'worldwide' ),
		'add_new'               => __( 'Add New', 'worldwide' ),
		'new_item'              => __( 'New Block', 'worldwide' ),
		'edit_item'             => __( 'Edit Block', 'worldwide' ),
		'update_item'           => __( 'Update Block', 'worldwide' ),
		'view_item'             => __( 'View Block', 'worldwide' ),
		'search_items'          => __( 'Search', 'worldwide' ),
		'not_found'             => __( 'Not found', 'worldwide' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'worldwide' ),
		'featured_image'        => __( 'Featured Image', 'worldwide' ),
		'set_featured_image'    => __( 'Set featured image', 'worldwide' ),
		'remove_featured_image' => __( 'Remove featured image', 'worldwide' ),
		'use_featured_image'    => __( 'Use as featured image', 'worldwide' ),
		'insert_into_item'      => __( 'Insert into item', 'worldwide' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'worldwide' ),
		'items_list'            => __( 'Items list', 'worldwide' ),
		'items_list_navigation' => __( 'Items list navigation', 'worldwide' ),
		'filter_items_list'     => __( 'Filter items list', 'worldwide' ),
	);
	$args = array(
		'label'                 => __( 'Template Blocks', 'worldwide' ),
		'description'           => __( 'Predefined Template Blocks', 'worldwide' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-exerpt-view',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'template_blocks', $args );

}
add_action( 'init', 'template_blocks_post_type', 0 );


// Register Custom Post Type
function in_the_news_post_type() {

	$labels = array(
		'name'                  => _x( 'Articles', 'Post Type General Name', 'worldwide' ),
		'singular_name'         => _x( 'Article', 'Post Type Singular Name', 'worldwide' ),
		'menu_name'             => __( 'In The News', 'worldwide' ),
		'name_admin_bar'        => __( 'In The News', 'worldwide' ),
		'archives'              => __( 'Item Archives', 'worldwide' ),
		'parent_item_colon'     => __( 'Parent Item:', 'worldwide' ),
		'all_items'             => __( 'All Articles', 'worldwide' ),
		'add_new_item'          => __( 'Add New Article', 'worldwide' ),
		'add_new'               => __( 'Add Article', 'worldwide' ),
		'new_item'              => __( 'New Article', 'worldwide' ),
		'edit_item'             => __( 'Edit Article', 'worldwide' ),
		'update_item'           => __( 'Update Article', 'worldwide' ),
		'view_item'             => __( 'View Article', 'worldwide' ),
		'search_items'          => __( 'Search Article', 'worldwide' ),
		'not_found'             => __( 'Not found', 'worldwide' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'worldwide' ),
		'featured_image'        => __( 'Featured Image', 'worldwide' ),
		'set_featured_image'    => __( 'Set featured image', 'worldwide' ),
		'remove_featured_image' => __( 'Remove featured image', 'worldwide' ),
		'use_featured_image'    => __( 'Use as featured image', 'worldwide' ),
		'insert_into_item'      => __( 'Insert into article', 'worldwide' ),
		'uploaded_to_this_item' => __( 'Uploaded to this article', 'worldwide' ),
		'items_list'            => __( 'Articles list', 'worldwide' ),
		'items_list_navigation' => __( 'Items list navigation', 'worldwide' ),
		'filter_items_list'     => __( 'Filter items list', 'worldwide' ),
	);
	$rewrite = array(
		'slug'                  => 'about-us/in-the-news',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Article', 'worldwide' ),
		'description'           => __( 'In The News', 'worldwide' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-list-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'in_the_news', $args );

}
add_action( 'init', 'in_the_news_post_type', 0 );

// Register Custom Post Type
function team_members_post_type() {

	$labels = array(
		'name'                  => _x( 'Team', 'Post Type General Name', 'worldwide' ),
		'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'worldwide' ),
		'menu_name'             => __( 'Team', 'worldwide' ),
		'name_admin_bar'        => __( 'Team', 'worldwide' ),
		'archives'              => __( 'Item Archives', 'worldwide' ),
		'parent_item_colon'     => __( 'Parent Item:', 'worldwide' ),
		'all_items'             => __( 'All Team Members', 'worldwide' ),
		'add_new_item'          => __( 'Add New Team Member', 'worldwide' ),
		'add_new'               => __( 'Add New', 'worldwide' ),
		'new_item'              => __( 'New Team Member', 'worldwide' ),
		'edit_item'             => __( 'Edit', 'worldwide' ),
		'update_item'           => __( 'Update', 'worldwide' ),
		'view_item'             => __( 'View', 'worldwide' ),
		'search_items'          => __( 'Search Team Member', 'worldwide' ),
		'not_found'             => __( 'Not found', 'worldwide' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'worldwide' ),
		'featured_image'        => __( 'Team Member Image', 'worldwide' ),
		'set_featured_image'    => __( 'Set member image', 'worldwide' ),
		'remove_featured_image' => __( 'Remove member image', 'worldwide' ),
		'use_featured_image'    => __( 'Use as member image', 'worldwide' ),
		'insert_into_item'      => __( 'Insert into article', 'worldwide' ),
		'uploaded_to_this_item' => __( 'Uploaded to this article', 'worldwide' ),
		'items_list'            => __( 'Articles list', 'worldwide' ),
		'items_list_navigation' => __( 'Items list navigation', 'worldwide' ),
		'filter_items_list'     => __( 'Filter items list', 'worldwide' ),
	);
	$rewrite = array(
		'slug'                  => 'about-us/meet-the-team',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Team', 'worldwide' ),
		'description'           => __( 'Main Team Members', 'worldwide' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'team_members', $args );

}
add_action( 'init', 'team_members_post_type', 0 );



/*
 * --------------- tweeking and utilities ------------------
 */
 
/*
 * menu fix - aligning to existing css
 */
class Walker_Worldwide_Menu extends Walker_Nav_Menu  {

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n\t{$indent}<span class=\"sub-nav\"><ul class=\"children level-{$depth}\">\n";
	}
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n\t{$indent}</ul></span>\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

<?php

include_once( get_template_directory() . '/inc/acf-blocks.php' );
include_once( get_template_directory() . '/inc/navigation.php' );
include_once( get_template_directory() . '/inc/cpt.php' );
include_once( get_template_directory() . '/inc/tha-hooks.php' );
include_once( get_template_directory() . '/inc/wordpress-cleanup.php' );
/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );



/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap', false );


	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), filemtime(get_template_directory().'/css/app.css' ) );

	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array());

	wp_enqueue_script( 'scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array());
	//wp_enqueue_script( 'pins', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array());
	wp_enqueue_script( 'gsap-animation', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js', array());
	wp_enqueue_script( 'magnific', tailpress_asset( 'js/jquery.magnific-popup.min.js' ), array(), filemtime( get_template_directory( ). '/js/app.js'));

	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), filemtime( get_template_directory( ). '/js/app.js'));

	wp_enqueue_script( 'slick', tailpress_asset( 'vendors/slick/slick.min.js' ), array(), $theme->get( 'Version' ) );

	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/ajax-pagination.js?V=2', array('jquery') );

	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
			'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages
		) );

	wp_enqueue_script( 'my_loadmore' );

	wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/3c56974003.js', array());
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

//////////////////////////////////////////////
///// ajax posts
/////////////////////////////////////////////
function misha_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1;; // we need next page to be loaded
	$args['post_status'] = 'publish';
	$args['posts_per_page']=6;
	$args['post_type'] = $_POST['type'] ;

	if(!empty($_POST['term_id'])){
		$args[ 'tax_query'] = array(
					
					array(
					
						'taxonomy' => $_POST['taxonomy'],
						
						'field' => 'term_id',
						
						'terms' => array($_POST['term_id']),
						
						'operator' => 'IN',
						
					)
				);
	}



	$query = new WP_Query( $args );


	if( $query->have_posts() ) :

		// run the loop
		while( $query->have_posts()) {
			$query->the_post();
			
			get_template_part( 'template-parts//archive-excerpt-post',null,['post'=>get_post()]);
		}
	endif;

	echo"<input type='hidden' value='".ceil($query->found_posts/6)."' name='updated_pages_count' class='updated_pages_count'>";

	die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}


add_action('wp_ajax_termsearch', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_termsearch', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

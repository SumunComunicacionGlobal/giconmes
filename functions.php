<?php
/**
 * Giconmes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Giconmes
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$my_theme = wp_get_theme()->get('Version');
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function giconmes_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Giconmes, use a find and replace
		* to change 'giconmes' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'giconmes', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'giconmes' ),
			'menu-footer' => esc_html__( 'Footer', 'giconmes' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'giconmes_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_image_size( 'card', 590, 360, array( 'center', 'center' ) ); // Hard crop left top
	add_image_size( 'card-horizontal', 200, 160, array( 'center', 'center' ) ); // Hard crop left top


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'giconmes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function giconmes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'giconmes_content_width', 640 );
}
add_action( 'after_setup_theme', 'giconmes_content_width', 0 );


// Add excerpt to pages
add_post_type_support( 'page', 'excerpt' );


/**
 * Halt the main query in the case of an empty search 
 */
add_filter( 'posts_search', function( $search, \WP_Query $q )
{
    if( ! is_admin() && empty( $search ) && $q->is_search() && $q->is_main_query() )
        $search .=" AND 0=1 ";

    return $search;
}, 10, 2 );


/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets-areas.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Gutenberg Support.
 */
require get_template_directory() . '/inc/gutenberg-support.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/cpt.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';



function product_loop_facetWP_filter( $atts, $content = null ){
	$tp_atts = shortcode_atts(array( 
	   'order' =>  null,
	), $atts);         
	ob_start();  
	get_template_part('template-parts/filter', 'productos');  
	$ret = ob_get_contents();  
	ob_end_clean();  
	return $ret;    
 }
 add_shortcode('productos-filtro', 'product_loop_facetWP_filter'); 

 function product_loop( $atts, $content = null ){
	$tp_atts = shortcode_atts(array( 
	   'order' =>  null,
	), $atts);         
	ob_start();  
	get_template_part('template-parts/loop', 'productos');  
	$ret = ob_get_contents();  
	ob_end_clean();  
	return $ret;    
 }
 add_shortcode('productos-loop', 'product_loop'); 

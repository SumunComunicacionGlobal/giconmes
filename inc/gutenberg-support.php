<?php

/**
 * Adds support for editor color palette.
 */
add_action('after_setup_theme', function () 
{  
    /**
     * Read our compiled theme CSS and extract the WP colour palette so we can register
     * it with Gutenberg.
     */
     
    // Update the css path to your plugin's css file.
    $compiled_css_path = get_template_directory() . '/style-editor.css';
    
    $cache_key = md5_file( $compiled_css_path );
    $cached = get_option( '__theme_cached_color_palette_version', false );
    if ( $cached == $cache_key )
    {
        $colour_palette = get_option( '__theme_cached_color_palette', [] );
    }
    else
    {
        $theme_css = file_get_contents( $compiled_css_path );
        preg_match_all( '/\.has-([^}]*)-background-color\s*{\s*background-color[^\S\r\n]*:[^\S\r\n]*([^};]*);?\s*}/', $theme_css, $matches );
        $colour_palette = [];
        $assigned = [];
        if ( is_array($matches) && isset($matches[0]) && isset($matches[1]) && isset($matches[2]) )
        {
            // $full_match = $matches[0]; // The full matched string
            $colour_slugs = $matches[1]; // The colour slug pulled from .has-(\S+)-background-color
            $colour_values = $matches[2]; // The colour value
            if ( is_array($colour_slugs) && is_array($colour_slugs) )
            {
                foreach( $colour_slugs as $index => $slug )
                {
                    if ( !isset($colour_values[$index]) ) continue;
                    $colour_val = trim( $colour_values[$index] ); // Important to trim whitespace from regex extraction.
                    if ( in_array($colour_val, $assigned) ) continue;
                    $assigned[] = $colour_val;
                    $colour_palette[] = [
                        'name' => ucwords(str_replace( ['-', '_'], ' ', $slug )),
                        'slug' => $slug,
                        'color' => $colour_val,
                    ];
                }
            }
            update_option( '__theme_cached_color_palette_version', $cache_key );
            update_option( '__theme_cached_color_palette', $colour_palette );
        }
    }
    if ( $colour_palette )
    {
        add_theme_support( 'disable-custom-colors' );
        add_theme_support( 'editor-color-palette', $colour_palette );    
    }

}, 20);

/**
 * theme_custom_gradients.
 *
 * Add custom gradients to the Gutenberg editor.
 *
 */
function theme_custom_gradients()
{
    add_theme_support('editor-gradient-presets', array(
        array(
            'name' => __('Up', 'giconmes'),
            'gradient' => 'linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 40%, #EEF2F6 40%, #EEF2F6 100%)',
            'slug' => 'gradient-up'
        ),
        array(
            'name' => __('Left', 'giconmes'),
            'gradient' => 'linear-gradient(90deg, #EEF2F6 0%, #EEF2F6 75%, rgba(255,255,255,1) 75%, rgba(255,255,255,1) 100%)',
            'slug' => 'gradient-left'
        ),
        
    ));
}
add_action('after_setup_theme', 'theme_custom_gradients');

// Disables custom colors in block color palette.
add_theme_support( 'disable-custom-gradients' );

// Add support for Block Styles.
add_theme_support( 'wp-block-styles' );

add_theme_support( 'align-wide' );
add_theme_support( 'align-full' );
add_theme_support( 'responsive-embeds' );

// Add support for editor styles.
add_theme_support( 'editor-styles' );

// Enqueue editor styles.
add_editor_style( 'style-editor.css' );


// Add custom block Faqs ACF
function faqs_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'faqs',
			'title' => __('Faqs'),
			'description' => __('Preguntas frecuentes', 'giconmes'),
			'render_callback' => 'acf_block_callback',
			'category' => 'theme',
			'icon' => 'editor-help',
			'mode' => 'auto',
			'keywords' => array('faqs', 'giconmes'),
		));
	}
}
add_action('acf/init', 'faqs_acf_init');

// Add custom block Tabs ACF
function tabs_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'tabs',
			'title' => __('Vertical Tabs'),
			'description' => __('Vertical tabs responsive', 'giconmes'),
			'render_callback' => 'acf_block_callback',
			'category' => 'theme',
			'icon' => 'list-view',
			'mode' => 'auto',
			'keywords' => array('Tabs', 'giconmes'),
		));
	}
}
add_action('acf/init', 'tabs_acf_init');

// Add custom block Grid Pages
function pages_grid_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'pages-grid',
			'title' => __('Grid Páginas'),
			'description' => __('Mostrar páginas en un grid', 'giconmes'),
			'render_callback' => 'acf_block_callback',
			'category' => 'design',
			'icon' => 'grid-view',
			'mode' => 'auto',
			'keywords' => array('Grid', 'Páginas', 'giconmes'),
		));
	}
}
add_action('acf/init', 'pages_grid_acf_init');

// Add custom block Card
function card_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'card',
			'title' => __('Card'),
			'description' => __('Mostrar un card o ficha', 'giconmes'),
			'render_callback' => 'acf_block_callback',
			'category' => 'design',
			'icon' => 'excerpt-view',
			'mode' => 'auto',
			'keywords' => array('Card', 'Ficha', 'giconmes'),
		));
	}
}
add_action('acf/init', 'card_acf_init');

// Add custom block Slider
function slider_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'slider',
			'title' => __('Slider'),
			'description' => __('Añade un slider con imagen a tu entrada', 'giconmes'),
			'render_callback' => 'acf_block_callback',
			'category' => 'theme',
			'icon' => 'slides',
			'mode' => 'auto',
			'keywords' => array('slider', 'slide', 'paginas', 'card', 'giconmes'),
		));
	}
}
add_action('acf/init', 'slider_acf_init');

// Add custom block Slider Image
function slider_img_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'slider-img',
			'title' => __('Slider Imagen'),
			'description' => __('Añade un slider con imagen a tu entrada', 'giconmes'),
			'render_callback' => 'acf_block_callback',
			'category' => 'theme',
			'icon' => 'slides',
			'mode' => 'auto',
			'keywords' => array('slider', 'Imagen', 'Carrusel', 'giconmes'),
		));
	}
}
add_action('acf/init', 'slider_img_acf_init');


function acf_block_callback($block) {
	$slug = str_replace('acf/', '', $block['name']);
	if( file_exists(STYLESHEETPATH . "/template-parts/blocks/{$slug}.php") ) {
		include( STYLESHEETPATH . "/template-parts/blocks/{$slug}.php" );
	}
}

function header_cover_breadcrumb( $block_content, $block ) {
    if ( $block['blockName'] === 'core/cover' && isset( $block['attrs']['className'] ) && str_contains( $block['attrs']['className'], 'is-style-hero-cover' ) ) {
        if ( is_front_page() ) {	
        }
        else {
            ob_start();
            echo '<div id="breadcrumbs" class="alignfull">';
            rank_math_the_breadcrumbs();
            echo '</div>';
            $block_content .= ob_get_clean(); 
        }
        
    }

    return $block_content;
}
add_filter( 'render_block', 'header_cover_breadcrumb', 10, 2 );

function smn_change_content_list_title_tag( $block_content, $block ) {

    if ( $block['blockName'] === 'core/post-title' ) {
    
        $block_content = str_replace( 
            array( '<h4', '<h5'), 
            '<p', 
            $block_content 
        );
    
    }

    return $block_content;
}
add_filter( 'render_block', 'smn_change_content_list_title_tag', 10, 2 );


function facet_add_argument_query_loop( $block_content, $block ) {

    if ( $block['blockName'] === 'core/post-template' ) {
    
        $query_args['facetwp'] = true;
    
    }

    return $block_content;
}
add_filter( 'render_block_data', 'facet_add_argument_query_loop', 10, 2 );



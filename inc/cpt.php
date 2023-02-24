<?php

// let's create the function for the custom type - PRODUCTS
function custom_post_products() { 
    // creating (registering) the custom type 
    register_post_type( 'productos', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Productos', 'giconmes'), /* This is the Title of the Group */
            'singular_name' => __('Producto', 'giconmes'), /* This is the individual type */
            'all_items' => __('Todos los productos', 'giconmes'), /* the all items menu item */
            'add_new' => __('Añadir nuevo', 'giconmes'), /* The add new menu item */
            'add_new_item' => __('Añadir nuevo producto', 'giconmes'), /* Add New Display Title */
            'edit' => __( 'Editar', 'giconmes' ), /* Edit Dialog */
            'edit_item' => __('Editar producto', 'giconmes'), /* Edit Display Title */
            'new_item' => __('Nuevo producto', 'giconmes'), /* New Display Title */
            'view_item' => __('Ver producto', 'giconmes'), /* View Display Title */
            'search_items' => __('Buscar producto', 'giconmes'), /* Search Custom Type Title */ 
            'not_found' =>  __('Nada encontrado en base de datos.', 'giconmes'), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __('Nada econtrado en papelera', 'giconmes'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 11, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-clipboard', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            'has_archive' => false, /* you can rename the slug here */
            'rewrite'   => array( 'slug' => __('generadores-vapor', 'giconmes') , 'with_front' => false ), /* you can specify its url slug */
            'capability_type' => 'page',
            'hierarchical' => true,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' )
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_products');



// let's create the function for the custom type - INDUSTRIAS
function custom_post_industries() { 
    // creating (registering) the custom type 
    register_post_type( 'industries', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Industrias', 'giconmes'), /* This is the Title of the Group */
            'singular_name' => __('Industria', 'giconmes'), /* This is the individual type */
            'all_items' => __('Todos los industrias', 'giconmes'), /* the all items menu item */
            'add_new' => __('Añadir nuevo', 'giconmes'), /* The add new menu item */
            'add_new_item' => __('Añadir nuevo industria', 'giconmes'), /* Add New Display Title */
            'edit' => __( 'Editar', 'giconmes' ), /* Edit Dialog */
            'edit_item' => __('Editar industria', 'giconmes'), /* Edit Display Title */
            'new_item' => __('Nuevo industria', 'giconmes'), /* New Display Title */
            'view_item' => __('Ver industria', 'giconmes'), /* View Display Title */
            'search_items' => __('Buscar industria', 'giconmes'), /* Search Custom Type Title */ 
            'not_found' =>  __('Nada encontrado en base de datos.', 'giconmes'), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __('Nada econtrado en papelera', 'giconmes'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 12, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-beer', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            'has_archive' => false, /* you can rename the slug here */
            'rewrite'   => array( 'slug' => __('industrias', 'giconmes') , 'with_front' => false ), /* you can specify its url slug */
            'capability_type' => 'page',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' )
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_industries');


// let's create the function for the custom type - CASOS DE ÉXITO
function custom_post_success_stories() { 
    // creating (registering) the custom type 
    register_post_type( 'stories', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Casos de éxito', 'giconmes'), /* This is the Title of the Group */
            'singular_name' => __('Caso de éxito', 'giconmes'), /* This is the individual type */
            'all_items' => __('Todos los Casos de éxito', 'giconmes'), /* the all items menu item */
            'add_new' => __('Añadir nuevo', 'giconmes'), /* The add new menu item */
            'add_new_item' => __('Añadir nuevo Caso de éxito', 'giconmes'), /* Add New Display Title */
            'edit' => __( 'Editar', 'giconmes' ), /* Edit Dialog */
            'edit_item' => __('Editar Caso de éxito', 'giconmes'), /* Edit Display Title */
            'new_item' => __('Nuevo Caso de éxito', 'giconmes'), /* New Display Title */
            'view_item' => __('Ver Caso de éxito', 'giconmes'), /* View Display Title */
            'search_items' => __('Buscar Caso de éxito', 'giconmes'), /* Search Custom Type Title */ 
            'not_found' =>  __('Nada encontrado en base de datos.', 'giconmes'), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __('Nada econtrado en papelera', 'giconmes'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 13, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-awards', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            'has_archive' => false, /* you can rename the slug here */
            'rewrite'   => array( 'slug' => __('casos-exito', 'giconmes') , 'with_front' => false ), /* you can specify its url slug */
            'capability_type' => 'page',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' )
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_success_stories');




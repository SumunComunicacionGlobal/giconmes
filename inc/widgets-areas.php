<?php /**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function giconmes_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'giconmes' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'giconmes' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'giconmes' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'giconmes' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Filter Blog', 'giconmes' ),
			'id'            => 'filter-blog',
			'description'   => esc_html__( 'Añadir widget aquí.', 'giconmes' ),
			'before_widget' => '<section id="%1$s" class="mt-3 %2$s">',
			'after_widget'  => '</section>',
		)
    );
}
add_action( 'widgets_init', 'giconmes_widgets_init' );
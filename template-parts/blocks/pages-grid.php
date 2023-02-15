<?php
/**
 * Block Name: Programs
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

global $post;
$posts = get_field('pages_grid');
$grid_columns = get_field('pages_grid_columns');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-container--grid-pages';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

if($posts) :

?>
<div class="<?php echo esc_attr( $class_name ); ?>">
	<div class="grid-columns-<?php echo $grid_columns; ?>">
		<?php
        
        foreach($posts as $post) : setup_postdata($post);
            
            if( get_field('pages_grid_card_type') ){
                get_template_part( 'template-parts/card-product-horizontal' );
            }
            else {
                get_template_part( 'template-parts/card-product' );
            }
        
        endforeach;
        
        wp_reset_postdata(); ?>
    </div>
</div>
<?php endif; ?>


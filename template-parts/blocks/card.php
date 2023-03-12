<?php
/**
 * Block Name: Card
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

global $post;
$posts = get_field('card_block');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'card-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
} 


if ( get_field('card_block_custom') ){ 

    $customCard = get_field('card_block_custom_group');

    if( $customCard ): ?>

    <div class="<?php echo esc_attr( $class_name ); ?>">

        <div class="card-img">
            <img src="<?php echo esc_url( $customCard ['card_block_custom_image']['url'] ); ?>" alt="<?php echo esc_attr ($customCard ['card_block_custom_image']['alt'] ); ?>" />
        </div>

        <div class="card-title">
            <h2 class="text-h4"><a href="<?php echo esc_url( $customCard ['card_block_custom_link']['url'] ); ?>"><?php echo esc_html( $customCard ['card_block_custom_title'] );?></a></h2>
        </div>

        <div class="card-exceprt">
            <p><?php echo esc_html( $customCard ['card_block_custom_excerpt'] );?></p>
        </div>

        <div class="card-icon">
            <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/arrow-card.svg' ); ?>
        </div>	

    </div>
        
    <?php endif; }

else {
    
    if($posts) : ?>
        <div class="<?php echo esc_attr( $class_name ); ?>">
            
            <div class="card-img">
                <?php echo get_the_post_thumbnail( $posts );?>
            </div>
            
            <div class="card-title">
                <h2 class="text-h4"><a href="<?php echo get_permalink( $posts );?>"><?php echo esc_html( $posts->post_title );?></a></h2>
            </div>
    
            <div class="card-exceprt">
                <p><?php echo get_the_excerpt( $posts );?></p>
            </div>
    
            <div class="card-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-card.svg" width="56" height="40" alt="Flecha">
            </div>	
            
        </div>
    <?php endif; } ?>


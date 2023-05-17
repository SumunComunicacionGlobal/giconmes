<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'swiper-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

global $post;
$posts = get_field('block_slide');

if($posts) : ?>

    <div id="<?php echo esc_attr($id); ?>" class="swiper swiper-container-block alignfull">
        <div class="swiper-wrapper">
            <?php foreach($posts as $post) : setup_postdata($post); ?>
            <div class="swiper-slide">
                <div class="card-block">
                    <div class="card-img">
                        <?php the_post_thumbnail('card'); ?>
                    </div>

                    <div class="card-title">
                        <h2 class="text-h5 mb-2"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    </div> 
                    <div class="card-exceprt">
                        <p><?php echo get_the_excerpt();?></p>
                    </div>
                    <div class="card-icon">
                        <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/arrow-card.svg' ); ?>
                    </div>	
                </div>
            </div>
            <?php endforeach;
            
            wp_reset_postdata(); ?>
        </div>
            
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
<?php endif; ?>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper('#<?php echo esc_attr($id); ?>', {
    autoHeight: true,
	navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        768: {
          slidesPerView: 1,
        },
        1024: {
          slidesPerView: 2,
        },
      },
	});
</script>
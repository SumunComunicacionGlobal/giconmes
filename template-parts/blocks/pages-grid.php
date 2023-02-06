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

if($posts) :

?>
<div class="alignfull custom-block--grid-pages">
	<div class="grid-columns-<?php echo $grid_columns; ?> container pb-6">
		<?php foreach($posts as $post) : setup_postdata($post);?>
        
        <div id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>  
            
            <div class="card-img">
                <a href="<?php the_permalink(); ?>"><?php giconmes_post_thumbnail(); ?></a>
            </div>
        
            <div class="card-title">
                <h2 class="text-h5 mb-0"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" width="32" height="24" alt="Flecha">
            </div> 
            <div class="card-exceprt">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/rectangle-blue.svg" width="72" height="4">
                <p><?php echo get_the_excerpt();?></p>
            </div>
            
        </div>

        <?php endforeach; wp_reset_postdata(); ?>
    </div>
</div>
<?php endif; ?>


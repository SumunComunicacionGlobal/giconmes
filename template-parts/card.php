<div id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>  
    <div class="card-img">
        <?php the_post_thumbnail('card'); ?>
    </div>

    <div class="card-title">
        <h2 class="text-h5 mb-0"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/arrow-card.svg' ); ?>
    </div> 
    <div class="card-exceprt">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/rectangle-blue.svg" width="72" height="4">
        <p><?php echo get_the_excerpt();?></p>
    </div>
</div>
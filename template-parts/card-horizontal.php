<div id="post-<?php the_ID(); ?>" <?php post_class('card-horizontal'); ?>>  
    <div class="card-img">
        <?php the_post_thumbnail('card-horizontal'); ?>
    </div>
    
    <div class="card-title">  
        <?php
            $client = get_field( "client_name", $post->ID);
            if( $client ) {
                echo '<span class="text-h6">'.$client.'</span>';
            }
        ?>      
        <h2 class="text-h5"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="card-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-card.svg" width="44" height="32" alt="Flecha" /></div>
    </div> 
</div>
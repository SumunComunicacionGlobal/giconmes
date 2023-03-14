<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
    <figure class="wp-block-post-featured-image">
        <?php the_post_thumbnail(); ?>
    </figure>

    <div class="is-content-justification-space-between is-layout-flex wp-container-19 wp-block-group alignfull">
        <h2 class="text-h5 mb-0 wp-block-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <figure class="wp-block-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" width="32" height="24" alt="Flecha"></figure>
    </div> 

    <div class="wp-block-post-excerpt">
        <p><?php echo get_the_excerpt();?></p>
    </div>
    <div class="is-layout-flex wp-block-group">
        <?php if( get_field('capacity_product') ): ?>
            <p class="is-style-title-has-image has-body-medium-color has-text-color">
                <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/box.svg' ); ?>
                <?php esc_html_e( 'Caldera', 'giconmes' ); ?>
                <?php the_field ('capacity_product'); ?>
            </p>
        <?php endif; ?>

        <?php if( get_field('power_product') ): ?>
            <p class="is-style-title-has-image has-body-medium-color has-text-color">
                <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/zap.svg' ); ?>
                <?php esc_html_e( 'Potencia', 'giconmes' ); ?>
                <?php
                
                    while( have_rows('power_product') ) : the_row();
                    $rows = count(get_field('power_product'));
                    $kW = get_sub_field('kw_product');

                    if(get_row_index() == '1' ):
                        echo $kW;
                    endif;

                    if(get_row_index() == $rows ):
                        echo '-';
                        the_sub_field('kw_product');
                        echo ' kW';
                    endif;

                    endwhile;
                ?>
            </p>
        <?php endif; ?>

        <?php if( get_field('output_product') ): ?>
            <p class="is-style-title-has-image has-body-medium-color has-text-color">
                <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/air-vent.svg' ); ?>
                <?php esc_html_e( 'Producción', 'giconmes' ); ?>
                <?php
                    while( have_rows('output_product') ) : the_row();
                    $rows = count(get_field('output_product'));
                    $kW = get_sub_field('kgh_product');

                    if(get_row_index() == '1' ):
                        echo $kW;
                    endif;

                    if(get_row_index() == $rows ):
                        echo '-';
                        the_sub_field('kgh_product');
                        echo ' kg/h';
                    endif;

                    endwhile;
                ?>
            </p>
        <?php endif; ?>
    </div>
</li>
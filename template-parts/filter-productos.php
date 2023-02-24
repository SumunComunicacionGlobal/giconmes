<div id="filter-productos">

    <div class="facet-filter--items grid-columns-2">
        <div>
            <div class="title-filter mb-1">
                <p class="is-style-title-has-image text-h6">
                    <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/zap.svg' ); ?>
                    <?php esc_html_e( 'Potencia total', 'giconmes' ); ?>
                </p>
            </div>
            <?php echo facetwp_display( 'facet', 'power' ); ?>
        </div>

        <div>
            <div class="title-filter mb-1">
                <p class="is-style-title-has-image text-h6">
                    <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/air-vent.svg' ); ?>
                    <?php esc_html_e( 'Producción vapor', 'giconmes' ); ?>
                </p>
            </div>
            <?php echo facetwp_display( 'facet', 'output' ); ?>
        </div>

    </div>  
        <?php  
        $args = array(
            'post_type'      => 'productos',
            'posts_per_page' => -1,
            'post_parent'    => $post->ID,
            'order'          => 'ASC',
            'orderby'        => 'menu_order',
            'facetwp' => true, // to activate facetWP for $parent WP_Query
        );


        $parent = new WP_Query( $args );

        if ( $parent->have_posts() ) : 
        
        echo '<div class="is-layout-flow wp-block-query container">';
        echo '<ul class="is-layout-flow is-flex-container columns-2 productos wp-block-post-template">';

        while ( $parent->have_posts() ) : $parent->the_post(); 
            
            get_template_part( 'template-parts/loop', 'product' );
        
        endwhile; 

        echo'</div>';
        echo'</ul>';
        
        endif; wp_reset_postdata();
        
        
        ?>

</div>	
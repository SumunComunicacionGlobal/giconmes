<div id="#loop-productos">
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

        echo '<div class="is-layout-flow wp-block-query">';
        echo '<ul class="is-layout-flow is-flex-container columns-2 productos wp-block-post-template">';

        while ( $parent->have_posts() ) : $parent->the_post(); 
            
            get_template_part( 'template-parts/loop', 'product' );

        endwhile; 

        echo'</div>';
        echo'</ul>';

        endif; wp_reset_postdata();
    ?>

<div>
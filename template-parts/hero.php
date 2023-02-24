<section id="hero" class="hero-page is-style-hero-cover">
    <div class="container">
        <div class="row middle-xs">
            <div class="col-xs-12 col-md-6 border--right_start">
                <p class="text-h6 mb-2">GICONMES</p>

                <?php
                if (is_search ()) {
                    /* translators: %s: search query. */
                    echo '<h1 class="page-title pb-6">';
                    printf( esc_html__( 'Resultados de búsqueda por: %s', 'giconmes' ), '<span>' . get_search_query() . '</span></h1>' );
                }
                else {
                    the_archive_title( '<h1 class="page-title pb-6">', '</h1>' );
                };
                
                echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/arrow-down.svg' );
                ?>
            </div> 
            <div class="col-xs-12 col-md-5 col-md-offset-1">
                <?php the_archive_description( '<div class="archive-description">', '</div>' );?>
            </div>
        </div>
    </div>
</section>

<div id="breadcrumbs" class="alignfull">
    <?php rank_math_the_breadcrumbs();?>
</div>

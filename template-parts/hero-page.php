<section id="hero" class="hero-page is-style-hero-cover">
    <div class="container">
        <div class="row middle-xs">
            <div class="col-xs-12 col-md-6 border--right_start">
                <p class="text-h6 mb-2">
                    <?php
                        $parent_title = get_the_title($post->post_parent);
                        if ( $parent_title ) {
                            echo $parent_title;
                        }
                        else {
                            echo 'Giconmes';
                        }
                    ?>
                </p>

                <h1 class="pb-6"><?php single_post_title(); ?></h1>
                <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/arrow-down.svg' ); ?>
            </div> 
            <div class="col-xs-12 col-md-5 col-md-offset-1">
                <p class="big"><?php echo get_the_excerpt (); ?></p>
            </div>
        </div>
    </div>
</section>

<div id="breadcrumbs" class="alignfull">
    <?php rank_math_the_breadcrumbs();?>
</div>
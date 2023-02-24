<section id="hero" class="is-style-hero-cover">
    <div class="container">
        <div class="row middle-xs">
            <div class="col-xs-12 col-md-6 border--right_start">
                <p class="text-h6 mb-2">BLOG</p>
                <h1 class="text-h2 pb-2"><?php single_post_title(); ?></h1>
                <div class="wp-block-post-date pb-6">
                    <?php
                        giconmes_posted_on();
                        giconmes_posted_by();
                    ?>
                </div><!-- .entry-meta -->
                <div class="row between-xs start-xs">
                    <div class="col-xs-2 last-xs first-md pb-6">
                        <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/arrow-down.svg' ); ?>
                    </div>
                    <p class="col-xs-12 col-sm-10"><?php echo get_the_excerpt (); ?></p>
                </div>
            </div> 
            <div class="col-xs-12 col-md-5 col-md-offset-1">
                <?php giconmes_post_thumbnail(); ?>
            </div>
        </div>
    </div>
</section>

<div id="breadcrumbs" class="alignfull">
    <?php rank_math_the_breadcrumbs();?>
</div>
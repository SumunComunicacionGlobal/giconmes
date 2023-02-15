<section id="hero" class="is-style-hero-cover">
    <div class="container">
        <div class="row middle-xs">
            <div class="col-xs-12 col-md-6 border--right_start">
                <p class="text-h6 mb-2">
                    <?php
                        $parent_title = get_the_title($post->post_parent);
                        echo $parent_title;
                    ?>
                </p>
                <?php echo the_title( '<h1 class="pb-6">', '</h1>' );?>
                <div class="row between-xs start-xs">
                    <div class="col-xs-2 last-xs first-md pb-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-down.svg" width="40" height="56" alt="Flecha">
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
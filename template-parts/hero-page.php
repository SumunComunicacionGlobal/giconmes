<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <?php
                    echo the_title( '<span class="text-h6">', '</span>' );
                    if (get_field('hero_title') ) {
                        $hero_title  = get_field('hero_title');
                        echo '<h1>' .$hero_title. '</h1>';
                    }
                    else
                        echo the_title( '<h1>', '</h1>' );
                ?>
            </div>
            <div class="col-xs-12 col-md-5 col-md-offset-1">
                <p><?php the_field('hero_tagline'); ?></p>
                <p><?php the_field('hero_excerpt'); ?></p>
                <a class="button__arrow" href=""><strong>Contacta con nosotros</strong></a>
            </div>
        </div>
        <div class="row">
            <a class="button__arrow" href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" width="32" height="24" alt="Contactar"><strong>Contacta con nosotros</strong></a>
        </div>
    </div>
</section>
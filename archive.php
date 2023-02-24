<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Giconmes
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : 

			get_template_part( 'template-parts/hero' );
			get_template_part( 'template-parts/filter-blog', get_post_type() );

			/* Start the Loop */
			echo '<div class="container grid-columns-3 mt-3">';

			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/loop', get_post_type() );

			endwhile;

			echo '</div>';

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();

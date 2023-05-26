<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Giconmes
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				
				get_template_part( 'template-parts/hero', 'page' );
				get_template_part( 'template-parts/filter-blog', get_post_type() );

			endif;

			echo '<div class="container grid-columns-3 mt-3 mb-10">';

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called loop-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/loop', get_post_type() );

			endwhile;

			echo '</div>';

			the_posts_pagination ();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();

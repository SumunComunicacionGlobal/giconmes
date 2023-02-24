<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Giconmes
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) :

			get_template_part( 'template-parts/hero' );
			
			/* Start the Loop */
			echo '<div class="container grid-columns-3 mt-9">';

			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/loop' );

			endwhile;
			echo '</div>';

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();

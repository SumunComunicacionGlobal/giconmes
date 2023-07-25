<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Giconmes
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-contact middle-xs">
			<div class="row middle-xs">
				<div class="col-xs-12 col-md-offset-2">
				
					<?php 
						$menu_id = apply_filters( 'wpml_object_id', 2, 'nav_menu', true ); //the number must be the menu ID
						$contact = get_field('footer_contact', 'term_' . $menu_id);
						if( $contact ): 
                            $link_url = $contact['url'];
                            $link_title = $contact['title'];
                            $link_target = $contact['target'] ? $contact['target'] : '_self';
                            ?>
                            <a class="button__arrow" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" width="32" height="24"> <?php echo esc_html( $link_title ); ?></a>
                        <?php endif;
					?>
					
				</div>
			</div>
		</div><!-- .footer-contact -->
		
		<div class="site-info container">
			<div class="row center-xs start-sm">
				<div class="col-xs-12 col-md-6 border--right pb-2 pt-1">
					<?php the_custom_logo();?>
					<p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>	
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6 border--right_start pb-3">
					<?php wp_nav_menu( array( 'theme_location' => 'menu-footer' )) ;?>
				</div>
				<div class="col-xs-12 col-md-5 col-md-offset-1 grid-columns-2 mb-8">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')) : ?>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- .site-info container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

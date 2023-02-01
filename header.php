<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Giconmes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'giconmes' ); ?></a>

	<header id="masthead">
		
		<div id="topbar">
			<div class="container">
				<div class="row middle-xs">
					<div class="col-xs-5 col-sm-6">
						<p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>	
					</div>
					<div class="col-xs-6 col-sm-6">
						<div class="dflex btns-group">
							<button class="btn-open-nav menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/align-right.svg" width="32" height="32" alt="<?php esc_html_e( 'Menu', 'giconmes' ); ?>">
								<div class="screen-reader-text"><?php esc_html_e( 'Menu', 'giconmes' ); ?></div>
							</button>
							<button class="btn-search search-toggle">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/search.svg" width="32" height="32" alt="<?php esc_html_e( 'Search', 'giconmes' ); ?>">
								<div class="screen-reader-text"><?php esc_html_e( 'Search', 'giconmes' ); ?></div>
							</button>
						</div>
						<div id="search-bar" class="center-xs end-xs"> 
							<?php get_search_form( true ) ;?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="site-header" class="container">

			<div class="site-branding">
				<?php the_custom_logo(); ?>
			</div><!-- .site-branding -->

			<div class="site-contact">
				<?php 
					$menu_id = '3'; //the number must be the menu ID
					$telf = get_field('menu_link', 'term_' . $menu_id);
					$email = get_field('menu_email', 'term_' . $menu_id);
					?>
				<a href="tel:<?php echo $telf ;?>"><?php echo $telf ;?></a>
				<small><a href="mailto:<?php echo $email ;?>"><?php echo $email ;?></a></small>
			</div><!-- .site-contact -->

			<div id="menu-container">
				<div id="site-header-menu" class="site-header-menu">
					<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'giconmes'); ?>">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'depth'          => 3,
								)
							);
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div><!-- .menu-containern -->

		</div><!-- #site-header -->

	</header><!-- #masthead -->

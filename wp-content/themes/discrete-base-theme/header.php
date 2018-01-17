<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package discrete-base-theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<div class="container">
		<header class="site-header rainbow-header rainbow-header__thick">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'discrete-base-theme' ); ?></a>
				<div class="site-header__religious-symbols">
					<img class="site-header__religious-symbols--rotate site-header__religious-symbols--change-color" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/catholicism.svg" alt="">
					<img class="site-header__religious-symbols--rotate site-header__religious-symbols--change-color" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/star-of-david.svg" alt="">
					<img class="site-header__religious-symbols--rotate site-header__religious-symbols--change-color" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/om.svg" alt="">
					<img class="site-header__religious-symbols--rotate site-header__religious-symbols--change-color" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/buddhism.svg" alt="">
					<img class="site-header__religious-symbols--rotate site-header__religious-symbols--change-color" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/sikhism.svg" alt="">
					<img class="site-header__religious-symbols--rotate site-header__religious-symbols--change-color" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/yin-yang.svg" alt="">
				</div><!-- .site-header__religious-symbols -->
				<div class="site-header__content">
					<div class="site-header__titles">
						<?php
						if ( is_front_page() || is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>
						<?php
						endif; ?>
					</div><!-- .site-header__titles -->
					<div class="site-header__links">
						<div class="site-header__links--social">
							<a href=""><i class="fab fa-twitter"></i></a>
							<a href=""><i class="fab fa-facebook-f"></i></a>
							<a href=""><i class="fab fa-instagram"></i></a>
						</div>
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'discrete-base-theme' ); ?></button>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_class'	 => 'primary-menu d-flex justify-content-between',
								) );
							?>
						</nav><!-- #site-navigation -->
					</div><!-- .site-header__links -->
				</div><!-- .site-header__content -->
			</header>
			<div id="content" class="site-content">

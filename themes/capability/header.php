<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Capablity
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site axt <?php echo get_theme_mod( 'layout_setting', 'sidebar-right') ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'capability' ); ?></a>
            <header id="masthead" class="site-header" role="banner">
                <div class="site-branding">
		
			
                                <?php
                                if ( get_theme_mod( 'title-box' ) ) : ?>
                                    <div class="site-logo">
                                        <a href="<?php echo esc_url( home_url( '/' ) ) ; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' )); ?>" rel="home">
                                            <?php echo wp_get_attachment_image( get_theme_mod('title-box'), 'site-header-logo-large'); ?>
                                        </a>
                                    </div>
                                <?php else : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php endif; ?>
			

			<?php $description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<!-- p class="site-description"><!-- ?php echo $description; /* WPCS: xss ok. */ ?></p -->
			<?php
			endif; ?>
                </div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'capability' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu', ) ); ?>
		</nav><!-- #site-navigation -->
            </header><!-- #masthead -->

	<div id="content" class="site-content">

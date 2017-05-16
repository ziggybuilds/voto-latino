<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package je-starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<style type="text/css">
	<?php if( get_field('header_color', 'options') ): ?>
		header::after { background-color: <?php echo the_field('header_color', 'options'); ?> } 
		.overlay-dblue { background-color: <?php echo the_field('header_color', 'options'); ?> }
	<?php endif; ?>
</style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php if( get_field('header_image', 'options') ): ?>
	<header id="masthead" class="site-header" role="banner" style="background-image: url(<?php echo the_field('header_image', 'options'); ?>)">
		<?php endif; ?>
		<div class="overlay-header-gradient"></div>
		<div class="container bring-forward flex">
			<div class="header-push-right flex reveal">
				<?php if( get_field('menu_logo_link', 'options') && get_field('menu_logo', 'options') ): ?>
					<a target="_blank" href="<?php echo the_field('menu_logo_link', 'options'); ?>"><img src="<?php echo the_field('menu_logo', 'options'); ?>" alt="logo" class="menu-logo"></a>
				<?php endif; ?>
				<nav class="action-nav">
					<?php wp_nav_menu( array( 'menu' => 'Primary' ) ); ?>
				</nav>
			</div>
			<div class="inner-wrapper header-title wow zoomIn" data-wow-delay="2s">
				<?php
				// Custom theme options header text field
				if( get_field('header_text', 'options') ): ?>
				 	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1><?php the_field('header_text', 'options'); ?></h1></a>
				 <?php endif; ?>
				 <div class="accent-red wow fadeInLeft" data-wow-delay="3s"></div>
			</div>
			<div class="header-push-right flex">
				<div class="share-widget">
					<p class="reveal">Share  
						<?php get_template_part('inc/share-fb-tw'); ?>
					</p>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

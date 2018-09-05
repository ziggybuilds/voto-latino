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

</head>

<body <?php body_class(); ?>>
<?php

//check page context
if ( is_home() || is_front_page() ) {
	$pageStyle = "home-header";
} elseif ( !is_home() || !is_front_page()) {
	$pageStyle = "page-header";
}

// Grab homepage id
$pageID = get_option('page_on_front');
?>
<div id="page" class="site">
	<header id="masthead" class="header container <?php echo $pageStyle; ?>" role="banner">
		<div class="banner">
			<div class="banner__innerWrapper">
				<div class="banner__innerWrapper__logo">
					<?php
						if ( get_field('logo', 'options') ) :
						?>
						<img src="<?php the_field('logo', 'options'); ?>" alt="logo" />
					<?php
						endif;
					?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
<div id="content" class="site-content">

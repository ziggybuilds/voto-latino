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

// check page header value
if( get_field('hero_photo', $pageID ) ) {
	$headerImage = 'style="background-image: url(' . get_field('hero_photo', $pageID ) . ')"';
} else {
	$headerImage = 'style=""';
}

?>
<div id="page" class="site">
	<header id="masthead" <?php echo $headerImage ?> class="header container <?php echo $pageStyle; ?>" role="banner">
		<?php get_template_part('inc/header-menu'); ?>
		<div class="header__titleWrapper">
			<?php
				if ( is_home() || is_front_page() ) {
					if ( get_field('header_title', $pageID) ) {
						echo '<h1 class="header__titleWrapper__title">' . get_field('header_title', $pageID) . '</h1>';
					}
					if ( get_field('header_subtitle', $pageID) ) {
						echo '<h3 class="header__titleWrapper__subtitle">' . get_field('header_subtitle', $pageID) . '</h3>';
					}
				} else {
					echo '<h1 class="header__titleWrapper__pageTitle">' . get_the_title() . '</h1>';
				}
			?>
		</div>
		<div class="header__overlay"></div>
	</header><!-- #masthead -->
<div id="content" class="site-content">

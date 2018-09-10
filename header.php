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
				<div class="banner__innerWrapper__location">
					<?php
						// function to check if home or organizer
						if ( is_home() || is_front_page() ) :
							echo '';
						elseif ( is_page('organizer-mode') ) :
							echo '<p>Organizer Mode</p>';
						endif;
					?>
				</div>
				<div class="banner__innerWrapper__link">
					<?php
						// function to check if home or organizer
						if ( is_home() || is_front_page() ) :
							echo '<a href="' . get_permalink( get_page_by_title( 'Organizer Mode' ) ) .  '"><p>View Organizer Mode <i class="fas fa-caret-right"></i></p></a>';
						elseif ( is_page('organizer-mode') ) :
							echo '<a href="' . get_home_url() .  '"><p>View Main Mode <i class="fas fa-caret-right"></i></p></a>';
						endif;
					?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
<div id="content" class="site-content">

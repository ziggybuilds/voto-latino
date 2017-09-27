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
if( is_home() || is_front_page() ) {
		 $pageStyle = "home-header";
	 } elseif( !is_home() || !is_front_page()) {
	 	 $pageStyle = "page-header";
	 }

// Grab homepage id
$pageID = get_option('page_on_front');

//check page header value
if( get_field('topper_image', $pageID ) ) {
	$headerImage = 'style="background-image: url(' . get_field('topper_image', $pageID ) . ')"';
} else {
	$headerImage = 'style=""';
}
?>

<div id="page" class="site">
	<header id="masthead" class="site-header container <?php echo $pageStyle; ?>" role="banner" <?php echo $headerImage; ?>>
		<div class="inner-wrapper header-branding">
				<?php
					get_template_part('inc/share-fb-tw');
				?>
			<div class="logo">
				<?php
					if( get_field('display_logo', $pageID ) === true && get_field('logo', 'options') ) {
						echo '<img src="' . get_field('logo', 'options') . '" alt="logo" />';
					}
				?>
			</div>
			<div class="header-content">
				<div class="header-text">
					<?php 
					if( get_field( 'title', $pageID ) ) {
						echo '<h1><span>' . get_field( 'title', $pageID ) . '</span></h1>';
					}
					if( get_field( 'subtitle', $pageID ) ) {
						echo '<h3><span>' . get_field( 'subtitle', $pageID ) . '</span></h3>';
					}
					?>
				</div>
			</div>
		</div>

		<div class="container header-menu">
					<?php
					// echoing the additional nav menu
						wp_nav_menu( array(
							'menu' => 'Primary',
							'menu_class' => 'menu',
						) );
					?>
					<div id="mobileBtn">Menu <i class="fa fa-bars" aria-hidden="true"></i></div>
		</div>

	</header><!-- #masthead -->
<div id="content" class="site-content">

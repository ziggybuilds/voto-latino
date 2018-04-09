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
	<header id="masthead" <?php echo $headerImage ?> class="site-header container <?php echo $pageStyle; ?>" role="banner">
		<div class="header-menu">
			<div class="dga-link">
				<a href="https://democraticgovernors.org/">DGA</a>
			</div>
			<div class="header-menu-control">
				<button id="menuBtn" class="link">Menu</button>
			</div>
			<div class="header-view-map">
				<a href="<?php echo get_home_url() . '/#map'; ?>">View Map</a>
			</div>
		</div>
		<div class="header-navigation hide">
			<?php
				$args = array(
					'menu' => 'menu-1',
				);

				wp_nav_menu($args);
			?>
		</div>
		<div class="header-wrapper inner-wrapper header-wrapper-<?php echo $pageStyle; ?>">
			<div class="header-content">
				<div class="header-text">
					<?php 
						if( get_field( 'title', $pageID ) ) {
							echo '<a href="' . get_home_url() . '"><h1 class="title"><span>' . get_field( 'title', $pageID ) . '</span></h1></a>';
						}
						if( get_field( 'subtitle', $pageID ) && $pageStyle == "home-header" ) {
							echo '<div class="header-intro">' . get_field( 'subtitle', $pageID ) . '</div>';
						}
					?>
				</div>
			</div>
	<?php
		if( is_home() || is_front_page() ) :
	?>
			<div class="header-card">
				<div class="header-card-inner">
					<div class="header-card-image">
						<?php
							if ( get_field('card_image', $pageID) ) {
								echo '<img class="card-image" src="' . get_field('card_image', $pageID) . '" alt="card" />';
							}
						?>
					</div>
					<div class="header-card-details">
						<?php
							if ( get_field('card_title', $pageID) ) {
								echo '<h4>' . get_field('card_title', $pageID) . '</h4>';
							}
						?>
						<?php
							// start wp query and loop
								// declare global posts variable
								global $post;
								// query arguments
								$args = array(
									'numberposts' => 1
								);

								// query posts
								$posts = get_posts( $args );

							if( $posts ) {
								foreach( $posts as $post ) {
									if( get_field('date_picker') ) {
										$datePick = get_field('date_picker', false, false);
										$datePick = new DateTime($datePick);
										$datePick = $datePick->format('F j, Y');
									}

									echo '<a href="' . get_permalink() . '"><p><strong>' . get_the_title() . '</strong></p>';
									echo '<p>' . $datePick . '</p></a>';
								}
								// reset wp loop
								wp_reset_postdata();
							}
						?>
						<div class="card-view-map"><a href="<?php echo get_home_url() . '/#map'; ?>">View Map</a></div>
					</div>
				</div>
			</div>
	<?php
		elseif( !is_home() || !is_front_page()) :
	?>	


	<?php
		endif;
	?>
		</div>
		<div class="header-social">
			<?php
				get_template_part('inc/share-fb-tw');
			?>
		</div>
	</header><!-- #masthead -->
<div id="content" class="site-content">

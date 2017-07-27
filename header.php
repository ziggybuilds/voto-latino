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
<?php if( is_home() || is_front_page() ) {
		 $pageStyle = "home-header";
	 } elseif( !is_home() || !is_front_page()) {
	 	 $pageStyle = "page-header";
	 }
?>
<div id="page" class="site">
	<header id="masthead" class="site-header container  anim-push <?php echo $pageStyle; ?>" role="banner"
	<?php if(get_field('header_image1', $id) ): ?>
		style="background-image: url(<?php the_field('header_image1', $id); ?>"
	<?php endif; ?>
	>

	<?php 
		get_template_part('inc/menu-overlay');
	?>

	<?php // Insert menu control
		get_template_part('inc/main-menu');
	?>

		<div class="inner-wrapper">
			<div class="header-text sm-col-12 md-col-8 lg-col-8 anim-target">
					<div class="hero-text">
						<?php if( is_home() || is_front_page() ):
							// Conditional header text based on page
							if( get_field('hero_text', $id) ): 
								$title = get_field('hero_text', $id);
								echo '<a href="' . get_home_url() . '"><h1>' . $title . '</h1>' . '</a>';
							endif;
						endif; ?>
						<?php if(!is_home() && !is_front_page() && !is_404() && !is_archive()): 
							// Conditional header text based on page
							echo '<h2>' . get_the_title() . '</h2>';
						endif; ?>
						<?php if(!is_home() && !is_front_page() && is_404()): 
							// Conditional header text based on page
							echo '<h2>Error: This page has no results</h2>';
						endif; ?>
						<?php if(!is_home() && !is_front_page() && !is_404() && is_archive()): 
							// Conditional header text based on page
							post_type_archive_title( '<h2 class="archive-title">', '</h2>' );
						endif; ?>
						<div class="greenbar"></div>
					</div>
					<?php if( is_home() || is_front_page() ):
						if( get_field('display_home_page_video', $id) ):
							if( get_field('display_video_link', $id) === true ): ?>
								<div class="video-link">
									<a href="#">
										<?php 
										if( get_field('video_link_text', $id) ): ?>
											<p><?php the_field('video_link_text', $id); ?></p>
										<?php endif;
										?>
									<i class="fa fa-play-circle" aria-hidden="true"></i>
									</a>
								</div>						
							<?php endif;
							endif;
					endif; ?>
			</div>
		</div>

		<div id="socialCorner">
			<?php get_template_part('inc/social-profiles'); ?>
		</div>

		<?php if( get_field('ticker_tape_display', 'options') ): 
			get_template_part('inc/ticker-tape');
		endif;
		?>

		<div class="header-overlay"></div>
	</header><!-- #masthead -->
<div id="content" class="site-content">

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package je-starter
 */

get_header(); ?>
 <?php $id = get_the_id(); ?>
	<div id="primary" class="content-area home-page fadeIn">
		<main id="main" class="site-main" role="main">
			<section class="map-section">
				<div class="map-section-top-bar"></div>
				<div class="inner-wrapper">
					<div id="map" data-id="<?php echo $id ?>"></div>
					<div class="map-description">
						<?php 
						if (get_field('map_title', $id)) {
							echo '<h2 class="title">' . get_field('map_title', $id) . '</h2>';
						}
						if (get_field('map_description', $id)) {
							echo '<div class="map-description">' . get_field('map_description', $id) . '</div>';
						}
						?>
					</div>
				</div>
			</section>

			<?php
			// start wp query and loop
				// declare global posts variable
				global $post;
				// query arguments
				$args = array(
					'meta_key'	=> 'date_picker',
					'orderby'	=> 'meta_value_num',
					'order'		=> 'ASC',
					'numberposts' => 4
				);

				// query posts
				$posts = get_posts( $args );

			if( $posts ) : ?>
			<section id="latest-events">
				<div class="inner-wrapper">
					<h2 class="title">Walker's Latest Events</h2>
					<div class="events-list">
						<?php
							foreach( $posts as $post ) {
								get_template_part( 'template-parts/frontpage-loop');
							}
						// reset wp loop
						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
		<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

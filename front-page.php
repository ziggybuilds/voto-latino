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
<?php
if ( get_field('topper_video_preview', $id) ) :
	$video_style = 'background-image: url(' . get_field('topper_video_preview', $id) . ')';
endif;
?>
	<div id="primary" class="content-area home-page fadeIn">
		<main id="main" class="site-main" role="main">
		<section class="frontTopper container">
			<div class="frontTopper__innerWrapper inner-wrapper">
				<div class="frontTopper__innerWrapper__text">
					<?php
						if ( get_field('topper_title', $id) ) {
							echo '<h2>' . get_field('topper_title', $id) . '</h2>';
						}
						if ( get_field('topper_text', $id) ) {
							echo '<div>' . get_field('topper_text', $id) . '</div>';
						}
					?>
				</div>
				<?php if ( get_field('topper_video', $id) ) : ?>
				<div class="frontTopper__innerWrapper__video">
					<div id="popUpTrigger" style="<?php echo $video_style; ?>" class="frontTopper__innerWrapper__video__innerVideo" tabindex="1">
						<svg viewBox="0 0 106 106" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<circle id="Oval-2" stroke="#FFFFFF" stroke-width="4" cx="50" cy="50" r="50" fill="none"></circle>
							<polygon id="Triangle-2" fill="#FFFFFF" transform="translate(55.839844, 50.202972) rotate(90.000000) translate(-55.839844, -50.202972) " points="55.8398438 25.3631281 88.0428156 75.0428156 23.6368719 75.0428156"></polygon>
						</svg>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="frontTopper__whiteBox"></div>
			<div class="frontTopper__bottomBar"></div>
		</section>
		<section class="feed container">
			<div class="inner-wrapper feed__innerWrapper">
				<div class="feed__innerWrapper__title">
					<p>DeSantisCare.com</p>
					<?php if ( get_field('featured_title', $id) ) : ?>
						<h1><?php the_field('featured_title', $id); ?></h1>
					<?php endif; ?>
				</div>
				<div class="feed__innerWrapper__articles">
					<?php
						if ( have_rows('post_selection') ) :
							while ( have_rows('post_selection') ) : the_row();
								$post_object = get_sub_field('feature_post');

								if ( $post_object ) :
									$post = $post_object;
									setup_postdata( $post );
									get_template_part('template-parts/frontpage-loop');
									wp_reset_postdata();
								endif;
							endwhile;
						endif;
					?>
				</div>
			</div>
		</section>
		<section class="location container">
			<div class="location__innerWrapper inner-wrapper">
				<div class="location__innerWrapper__marker">
					<svg viewBox="0 0 94 150" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					        <g id="Desktop-HD" transform="translate(-673.000000, -3996.000000)" fill="#192A56" fill-rule="nonzero">
					            <g id="Group-7" transform="translate(0.000000, 3942.000000)">
					                <g id="Group-5" transform="translate(365.000000, 54.000000)">
					                    <path d="M354.919431,0 C329.008469,0 308,20.9838867 308,46.875 C308,54.1259766 309.649511,61.0016602 312.595758,67.1264648 C312.760563,67.4745117 354.919431,150 354.919431,150 L396.734615,68.1518555 C399.996982,61.7707031 401.838863,54.5378906 401.838863,46.875 C401.838863,20.9838867 380.835086,0 354.919431,0 Z M354.563981,74.6445498 C339.056487,74.6445498 326.483412,62.066795 326.483412,46.563981 C326.483412,31.0611671 339.056487,18.4834123 354.563981,18.4834123 C370.066795,18.4834123 382.64455,31.0611671 382.64455,46.563981 C382.64455,62.066795 370.066795,74.6445498 354.563981,74.6445498 Z" id="Shape"></path>
					                </g>
					            </g>
					        </g>
					    </g>
					</svg>
				</div>
				<div class="location__innerWrapper__content">
					<?php if ( get_field('location_title', $id ) ) : ?>
						<h1 class="location__innerWrapper__content__title"><?php the_field('location_title', $id); ?></h1>
					<?php endif; ?>
					<?php if ( get_field('location_text', $id) ) : ?>
						<div class="location__innerWrapper__content__text"><?php the_field('location_text', $id); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<section class="team">
			<div class="team__innerWrapper inner-wrapper">
				<div class="team__innerWrapper__content">
					<?php if ( get_field('location_title', $id ) ) : ?>
						<h2 class="team__innerWrapper__content__title"><?php the_field('team_title', $id); ?></h2>
					<?php endif; ?>
					<?php if ( get_field('team_text', $id) ) : ?>
						<div class="team__innerWrapper__content__text"><?php the_field('team_text', $id); ?></div>
					<?php endif; ?>
				</div>
				<div class="team__innerWrapper__grid">
					<?php
						if ( have_rows('team_grid', $id ) ) :
							while ( have_rows('team_grid', $id ) ) : the_row();
					?>
					<div class="team__innerWrapper__grid__image">
						<img src="<?php the_sub_field('grid_image'); ?>" alt="teammate" />
					</div>
					<?php 
							endwhile; 
						endif;
					?>
				</div>
			</div>
		</section>
		</main><!-- #main -->
		<?php if ( get_field('topper_video', $id) ) : 
				$video_src = get_field('topper_video', $id);
		?>
		<div class="popUp">
			<div class="popUp__innerWrapper">
				<button id="popUpClose" tabindex="1"><i class="fas fa-times"></i></button>
				<div class="popUp__innerWrapper__videoWrapper responsive-video">
					<iframe src="<?php echo $video_src; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>				
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div><!-- #primary -->
<?php
get_footer();

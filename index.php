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
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="tweet-wrapper container back-lblue" id="tweeter">
				<div class="inner-wrapper">
					<button class="exit" id="tweeterCloser"><i class="fa fa-times" aria-hidden="true"></i></button>
					<h4>Latest Tweet from #DemGovFirewall</h4>
					<?php echo do_shortcode( '[custom-twitter-feeds]' ); ?>
				</div>
			</div>
			<div class="container">
				<div class="inner-wrapper timeline-titles">
					<div>
						<?php if( get_field('timeline_headline', $id) ): ?>
							<h1><?php echo the_field('timeline_headline', $id); ?></h1>
						<?php endif; ?>
						<?php if( get_field('timeline_subfield', $id) ): ?>
							<p><?php echo the_field('timeline_subfield', $id); ?></p>
						<?php endif; ?>
						<div class="accent-red wow slideInLeft"></div>
					</div>
				</div>
			</div>
			<div class="container timeline-container" id="timeline-container">
				<div class="inner-wrapper">
					<div class="slider-holder timeline-wrapper reveal">
						<div class="backslider"></div>
						<div class="backslider-progress"></div>
					</div>
				</div>
				<div class="inner-wrapper timeline-wrapper" id="firewall-timeline">
					<?php query_posts( 'cat=2' ); ?>
					<?php if( have_posts() ) :
						while( have_posts() ) : the_post();
							get_template_part( 'template-parts/firewall', get_post_format() );
						endwhile;
					endif;
					wp_reset_query();
					?>
				</div>
			</div>
			<?php if( get_field('footer_image', 'options') ) : ?>
			<div class="container expander vertical-flex" role="contentinfo" style="background-image: url(<?php echo the_field('footer_image', 'options'); ?>)">
			<?php endif; ?>
				<div class="inner-wrapper flex horizontal-flex">
					<h3 class="timeline-expander" id="timelineExp">Read More</br><i class="fa fa-caret-down" aria-hidden="true"></i></h3>
				</div>	
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

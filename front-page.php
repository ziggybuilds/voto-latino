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
		
		<?php if( get_field('display_home_page_topper', $id) === true ): 
			get_template_part('inc/homepage-topper');
			endif;
		?>

		<?php if( get_field('display_section_sm', $id) === true ): 
			get_template_part('inc/right-vertical'); 
			endif;
		?>

		<?php 
			function buttonCall($field, $pageID) {
				if( get_field($field, $pageID) === true ):
					$title = get_field($field . '_title', $pageID);
					$button = get_field($field . '_button', $pageID);
					$link = get_field($field . '_link', $pageID);
					include(locate_template('inc/large-button.php') );
				endif;
			}
			buttonCall('display_donate', $id);
		?>

		<?php if( get_field('display_latest_news') ):
			get_template_part('inc/latest-news');
		endif; 
		?>

		<?php buttonCall('display_calendar', $id); ?>

		<?php if( get_field('display_issues_section', $id) === true ):
			get_template_part('inc/left-vertical'); 
			endif;
		?>

		<?php if( get_field('display_sign_up', $id) === true ):
			get_template_part('inc/sign-up');
			endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

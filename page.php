<?php
/**
 *  Single.php
 *
 * @package je-starter
 */

get_header(); ?>
 <?php $id = get_the_id(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">
			<div class="inner-wrapper">
				<?php get_template_part('inc/module-loop'); ?>
			</div>

			<?php if( get_field('display_sign_up', $id) === true ):
				get_template_part('inc/sign-up');
				endif;
			?>

			<?php 
			function buttonCall($field, $pageID) {
				if( get_field($field, $pageID) === true ):
					$frontpage_id = get_option( 'page_on_front' );
					$title = get_field($field . '_title', $frontpage_id);
					$button = get_field($field . '_button', $frontpage_id);
					$link = get_field($field . '_link', $frontpage_id);
					include(locate_template('inc/large-button.php') );
				endif;
			}
			buttonCall('display_donate', $id);
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
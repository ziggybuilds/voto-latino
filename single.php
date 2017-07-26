<?php 
/**
* This is the single paeg post template
*
* @package je-starter
*
*/ 
get_header(); ?>

<?php $id = get_the_id(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						echo '<div class="inner-wrapper">';
						echo '<div class="full-width">';
							if( 'latest' == get_post_type() ) {
								echo '<div class="posted-on"><p>Posted on</p><p class="post-date">' . get_the_date() . '</p></div>';
							}
							the_content();
						echo '</div>';

						get_template_part('inc/module-loop');


						echo '</div>';  // closes out the inner wrapper class

						the_post_navigation( array(
							'prev_text' => '<span class="screen-reader-text nav">' . __( 'Previous Post', 'je-starter' ) . '</span><span class="nav-title">   %title</span>',
							'next_text' => '<span class="screen-reader-text nav">' . __( 'Next Post', 'je-starter' ) . '</span><span class="nav-title">%title   </span>',
						) );

					endwhile; // End of the loop.
				?>

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

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
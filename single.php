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
				<section class="container single-post">
				<div class="inner-wrapper single-post-display">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						
						get_template_part( 'template-parts/single-loop');

						the_post_navigation( array(
							'prev_text' => '<span class="screen-reader-text nav">' . __( 'Previous Post', 'je-starter' ) . '</span>',
							'next_text' => '<span class="screen-reader-text nav">' . __( 'Next Post', 'je-starter' ) . '</span>',
						) );

					endwhile; // End of the loop.
				?>
				</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
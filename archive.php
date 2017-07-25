<?php 
/**
*
* @package je-starter
* archive.php
*/
?>

<?php get_header(); ?>

<?php $id = get_the_id(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="inner-wrapper">
			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					
					get_template_part( 'template-parts/archive-loop');


				endwhile; // End of the loop.

				the_posts_navigation();
			?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
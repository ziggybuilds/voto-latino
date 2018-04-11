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
		<section class="container posts-container">
			<div class="inner-wrapper archive">
				<?php 
					// echo the category title before loop
					echo '<div class="category-name"><h1>' . get_the_archive_title() . '</h1></div>';

					echo '<div class="display-posts">';
					
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					
					get_template_part( 'template-parts/archive-loop');


				endwhile; // End of the loop.
				?>
			</div>
		</section>
		<?php the_posts_navigation(); ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
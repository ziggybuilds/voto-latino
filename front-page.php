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

		<section class="container posts-container">
			<div class="inner-wrapper">
				<?php 
				if( get_field('first_category', $id) ) {
					$catId = get_field('first_category', $id);


					// echo the category title before loop
					echo '<div class="category-name"><h1>' . get_cat_name( $catId ) . '</h1></div>';

					echo '<div class="display-posts">';
					// start wp query and loop
					$query = new WP_Query( array( 'cat' => $catId ));
					while( $query->have_posts() ):
						$query->the_post(); 
					
						get_template_part( 'template-parts/archive-loop');
						
					endwhile;
					echo '</div>';

					// reset wp loop
					wp_reset_postdata();

				echo '<div class="all-posts">' .
						'<a href="' . get_category_link( $catId ) . '">' . 
						'<p>View All ' . get_cat_name( $catId ) . '</p>' . 
						'</a>' .
					'</div>';

				}
				?>
			</div>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

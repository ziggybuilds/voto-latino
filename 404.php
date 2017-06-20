<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package je-starter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found flex horizontal-flex back-white">
				<div class="error-main">
					<?php if(get_field('error_text', 'options') ): ?>
						<h1><?php the_field('error_text', 'options'); ?></h1>
					<?php endif; ?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Return home</a>
					
					<?php if( get_field('error_image', 'options') ): ?>
						<div class="error-image-div">
							<img src="<?php the_field('error_image', 'options'); ?>" alt="error-image" />
						</div>
					<?php endif; ?>
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

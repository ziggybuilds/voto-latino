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
				<div>
					<h1>This page does not exist. Please return home!</h1>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Return home</a>
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

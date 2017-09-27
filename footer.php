<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package je-starter
 */

?>
	</div><!-- #content -->
</div><!-- #page -->
<footer class="container">
	<div class="inner-wrapper">
		<?php 
		// get social profiles
		get_template_part('inc/social-profiles');

		// display logo
		if( get_field('logo', 'options') ) {
			echo '<div class="footer-logo"><img src="' . get_field('logo', 'options') . '" alt="logo" /></div>';
		}

		?>
		<div class="disclaimer">
			<?php
				// display disclaimer
				if( get_field('disclaimer', 'options') ) {
					echo get_field('disclaimer', 'options');
				}
				if( get_field('copyright_holder', 'options') ) {
					echo get_field('copyright_holder', 'options') . ' &copy ' . date("Y");
				}
				if( get_field('privacy_policy', 'options') ) {
					echo ', <a href="' . get_field('privacy_policy', 'options') . '">Privacy Policy</a>';
				}
			?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>

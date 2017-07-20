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
		<div class="social-footer">
			<div class="social-footer-text">
				<h3>Follow Us</h3>
			</div>
			<?php 
				get_template_part('inc/social-profiles');
			?>
		</div>
		<div class="site-info">
			<div class="footer-menu">
				<?php
					// echoing the nav menu
					wp_nav_menu( array(
						'menu' => 'Secondary',
						'menu_class' => 'secondary-menu',
					) );
				?>
			</div>
			<div class="footer-logo">
				<?php 
					$home = get_home_url();
					// echo the optional header menu logo
					if( get_field('header_logo', 'options') ): 
						echo '<a href="' . $home . '"><img id="headerLogo" src="' . get_field('header_logo', 'options') . '" alt="logo"></a>';
					endif;
				?>
			</div>
			<div class="disclaimer">
				<p>
				<?php if( get_field('disclaimer', 'options') ):
					the_field('disclaimer', 'options');
					endif;
				?>
				</p>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>



</body>
</html>

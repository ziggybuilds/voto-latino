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

	<?php // this includes the share-module
	if( get_field('share_module_include') ): ?> 
		<?php get_template_part( 'inc/share-module'); ?>
	<?php endif; ?>


	<?php //This includes the donate button if the ACF field is clicked
	if( get_field('donate_include') ): ?>
		<?php get_template_part( 'inc/donate'); ?>
	<?php endif; ?>

	</div><!-- #content -->
<?php if( get_field('footer_image', 'options') ) : ?>
	<footer id="colophon" class="site-footer container" role="contentinfo" style="background-image: url(<?php echo the_field('footer_image', 'options'); ?>)">
<?php endif; ?>
		<div class="site-info inner-wrapper horizontal-flex">
			<div class="vertical-flex footer-inner">
				<div class="disclaimer">
					<?php if( get_field('disclaimer', 'options') ) : ?>
						<p><span><?php echo the_field('disclaimer', 'options'); ?></span></p>
					<?php endif; ?>
				</div>

				<div class="footer-menu">
					<?php wp_nav_menu( array( 'menu' => 'Secondary' ) ); ?>
				</div>
			</div>
			<div class="dga-logo footer-inner">
				<?php if( get_field('logo', 'options') ) : ?>
					<img src="<?php echo the_field('logo', 'options'); ?>" alt="logo" />
				<?php endif; ?>
			</div>
			<div class="footer-share-text footer-inner">
				<?php if( get_field('footer_share_text', 'options') ) : ?>
					<h3><?php echo the_field('footer_share_text', 'options'); ?></h3>
				<?php endif; ?>
				<p>
				<?php if( have_rows('social_profiles', 'options') ): ?>
					<?php while( have_rows('social_profiles', 'options') ): the_row(); ?>
						<?php if( get_row_layout() == 'twitter' ): 
							$link = get_sub_field('url');

							?>
							<a href="<?php echo $link; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if( get_row_layout() == 'facebook' ): 
							$link = get_sub_field('url');

							?>
							<a href="<?php echo $link; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if( get_row_layout() == 'youtube' ): 
							$link = get_sub_field('url');

							?>
							<a href="<?php echo $link; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
						<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
			</p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

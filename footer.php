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
	
			<footer class="footer container section">
				<div class="footer__innerWrapper inner-wrapper">
					<?php if ( get_field('footer_topper', 'options') ) : ?>
						<div class="footer__innerWrapper__topper">
							<p><?php the_field('footer_topper', 'options'); ?></p>
						</div>
					<?php endif; ?>
					<div class="footer__innerWrapper__buttons">
						<?php if ( get_field('sign_up_topper', 'options') ) : ?>
							<p class="footer__innerWrapper__buttons__text"><?php the_field('sign_up_topper', 'options'); ?></p>
						<?php endif; ?>
						<?php get_template_part('inc/download-buttons'); ?>
						<?php get_template_part('inc/sign-up-button'); ?>
					</div>
					<div class="footer__innerWrapper__disclaimer">
					<?php if ( get_field('disclaimer', 'options') ) : ?>
							<p><?php the_field('disclaimer', 'options'); ?></p>
					<?php endif; ?>
					<?php if ( get_field('copyright', 'options') ) : ?>
							<p><?php the_field('copyright', 'options'); ?> &copy; <?php echo date('Y'); ?></p>
					<?php endif; ?>
					<?php if ( get_field('privacy_policy', 'options') ) : ?>
							<a class="invert" href="<?php the_field('privacy_policy', 'options'); ?>"><p>Privacy Policy</p></a>
					<?php endif; ?>
					</div>
				</div>
			</footer>
			</main><?php // closing tags for fullpage.js ?>
		</div><!-- #primary -->
	</div><!-- #content -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>

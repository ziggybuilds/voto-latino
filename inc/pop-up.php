<?php
/**
 * This is the pop up  modulepop-up
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package je-starter
 */

?>
<?php 
	if( get_field('activate_pop_up', 'options') === true) {
		$active = "active";
	} else {
		$active = "none";
	}
?>
<div class="pop-up" style="display: none;" data-control="<?php echo $active; ?>" id="popUp" data-delay="3">
	<div class="inner-wrapper">
		<div class="sign-up-form">
		<div class="close-form">
			<button class="" type="button" id="formClose" aria-label="Form" aria-controls="form">
				<i class="fa fa-times" aria-hidden="true"></i>
			</button>
		</div>
			<?php 
			if( get_field('pop_up_headline', 'options') ): ?>
				<h3><?php the_field('pop_up_headline', 'options'); ?></h3>
			<?php endif; ?>
			<div class="greenbar"></div>
			<div class="embed-form">
				<?php
				// Render Form
				$form = get_field('pop_up_form_shortcode', 'options');
				echo do_shortcode($form);
				?>
			</div>
		</div>
	</div>
</div>
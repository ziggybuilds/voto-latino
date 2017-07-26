<?php
/*
*
*
*
*/
?>

<section class="container signup-section"
<?php if( get_field('sign_up_photo', 'options') ):
	echo 'style="background-image: url(' . get_field('sign_up_photo', 'options') . ');"';
	endif;
?>
>
	<div class="inner-wrapper">
		<div class="sign-up-form">
			<?php 
			if( get_field('sign_up_headline', 'options') ): ?>
				<h3><?php the_field('sign_up_headline', 'options'); ?></h3>
			<?php endif; ?>
			<div class="greenbar"></div>

			<div class="embed-form">
				<?php
				// Render Form
				$form = get_field('form_shortcode', 'options');
				echo do_shortcode($form);
				?>
			</div>
		</div>
	</div>
	<div class="overlay-sign-up"></div>
</section>
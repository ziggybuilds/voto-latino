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

			<?php
			// Render Form
			echo do_shortcode("[ninja_form id=2]");
			?>
		</div>
	</div>
	<div class="overlay-sign-up"></div>
</section>
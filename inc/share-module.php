<?php
/*
* This is the share module to display on teh index page
*
*/
?>

<?php $id = get_the_id(); ?>

<div class="container back-white">
	<div class="inner-wrapper flex vertical-flex share-module-inner">
		<div class="share-titles flex vertical-flex">
			<?php if( get_field('share_title', 'options') ): ?>
				<h2><?php echo the_field('share_title', 'options'); ?></h2>
			<?php endif; ?>
			<?php if( get_field('share_subtitle', 'options') ): ?>
				<p><?php echo the_field('share_subtitle', 'options'); ?></p>
			<?php endif; ?>
			<div class="accent-red"></div>
		</div>
		<div class="share-boxes flex">
			<?php if( get_field('image_one', 'options') ): ?>
				<div class="share-box shadow wow fadeInUp back-dblue box-1" data-wow-delay="1s" style="background-image: url(<?php echo the_field('image_one', 'options'); ?>)">
			<?php else: ?>
				<div class="share-box shadow wow fadeInUp back-dblue box-1" data-wow-delay="1s">
			<?php endif; ?>
				<div class="overlay-dark"></div>
				<div class="share-options">
					<h1>Resist</h1>
				</div>
			</div>
			<?php if( get_field('image_two', 'options') ): ?>
				<div class="share-box shadow wow fadeInUp back-dblue box-2" data-wow-delay="1s" style="background-image: url(<?php echo the_field('image_two', 'options'); ?>)">
			<?php else: ?>
				<div class="share-box shadow wow fadeInUp back-dblue box-2" data-wow-delay="1s">
			<?php endif; ?>
				<div class="overlay-dark"></div>
				<div class="share-options">
					<h1>Donate</h1>
				</div>
			</div>
			<?php if( get_field('image_three', 'options') ): ?>
				<div class="share-box shadow wow fadeInUp back-dblue box-3" data-wow-delay="1s" style="background-image: url(<?php echo the_field('image_three', 'options'); ?>)">
			<?php else: ?>
				<div class="share-box shadow wow fadeInUp back-dblue box-3" data-wow-delay="1s">
			<?php endif; ?>
				<div class="overlay-dark"></div>
				<div class="share-options">
					<h1>Take Action</h1>
				</div>
			</div>
		</div>
	</div>
</div>
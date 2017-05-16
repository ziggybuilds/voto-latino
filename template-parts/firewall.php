<?php
/* This si the loop template to dispaly content on the frontpage timeline
*/
?>
<?php $post_id = get_the_id(); ?>
<?php $display = get_field('left_display', $post_id);
	 if( $display == '1'):  
?>
<?php $media = get_field('display_media', $post_id); ?>
	<div class="inner-item wow flex horizontal-flex <?php echo 'positive fadeInRight' ?>">
	<div class="content flex <?php echo 'horizontal-flex-start' ?><?php echo $post_id ?>">
<?php else : ?>
	<div class="inner-item wow flex horizontal-flex <?php echo 'negative fadeInLeft' ?>">
	<div class="content flex <?php echo 'horizontal-flex-end' ?> <?php echo $post_id ?>">
<?php endif; ?>
		<div class="text">
		<?php the_title('<h5>', '</h5>'); ?>
		<p>
		<?php if( get_field('date_of_article', $post_id) ): ?>
			<?php echo the_field('date_of_article', $post_id); ?>
		<?php endif; ?>
		<?php if( get_field('read_more_link', $post_id) ): ?>
			<a href="<?php echo the_field('read_more_link', $post_id); ?>" class="read-more">Read More</a>
		<?php endif; ?>
		</p>
		<?php the_content(); ?>

		</div>
		<?php if ( $media == '1' ): ?>
			<?php if( get_field('featured_image', $post_id) ): ?>
				<div class="post-media">
				<img src="<?php echo the_field('featured_image', $post_id); ?>" alt="post-image">
				</div>
			<?php elseif( get_field('video_upload', $post_id) ): ?>
				<div class="post-media">
				<iframe src="<?php echo the_field('video_upload', $post_id); ?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
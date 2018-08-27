<?php
/*
* Frontpage-loop template
*
* @package je-starter
*
*/

$id = get_the_ID();
?>
<div class="feed__articles__article">
				<div class="feed__articles__article__image">
					<h3 class="feed__articles__article__title">
						<?php the_title(); ?>
					</h3>
					<?php if ( get_field( 'post_image', $id ) ) : ?>
						<img src="<?php the_field( 'post_image', $id ) ?>" alt="article" />
					<?php endif; ?>
				</div>
			<div class="feed__articles__article__content">
				<?php the_content(); ?>
			</div>
</div>
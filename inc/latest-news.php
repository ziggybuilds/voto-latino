<?php
/*
*
* This is thelatest news display module
*
*
*/
?>

<section class="container latest-news" tabindex="1">
	<div class="inner-wrapper">
		<div class="topper">
			<p>Latest News</p>
		</div>
		<div class="content">
			<?php 
			$query = new WP_Query('post_type=latest&posts_per_page=1');
			while( $query->have_posts() ):
				$query->the_post(); 
				$link = get_the_permalink(); 
			?>
			<a href="<?php echo $link; ?>">
				<div class="article">
					<h2><?php the_title(); ?></h2>
					<div class="greenbar"></div>
					<div class="excerpt"><?php the_excerpt(); ?></div>
				</div>
			</a>
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<div class="more-link">
			<a href="<?php echo get_post_type_archive_link('latest'); ?>">More News</a>
		</div>
	</div>
</section>
<?php
/*
*
* The homepage topper module
*
*
*/
?>

<section class="homepage-topper container">
	<div class="inner-wrapper">
		<div class="topper-text">
 			<?php if( get_field('headline_ht', $id) ): 
 				echo '<h2>' . get_field('headline_ht', $id) . '</h2>';
 			endif;

 			if( get_field('introduction', $id) ): 
 				echo '<div class="introduction">' . get_field('introduction', $id) . '</div>';
 			endif;
 			?>
		</div>
		
		<?php if( get_field('display_home_page_video', $id) ):
		$videoLink = get_field('home_page_video_link', $id);
		echo '<div class="video-wrapper lg-col-10 md-col-10 sm-col-10" id="home-page-video"><div class="video-embed"><iframe src="' . $videoLink . '" frameborder="0" allowfullscreen></iframe></div></div>';
		endif; 
		?>

		<?php if( get_field('more_link_topper', $id) ): ?>
				<div class="more-link"><a href="<?php the_field('more_link_topper', $id); ?>"><?php the_field('more_text_topper', $id); ?> </a></div>
		<?php endif; ?>
	</div>
</section>
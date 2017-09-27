<?php
/*
* Single loop template part
*
* @package je-starter
*
*/
?>
<article class="article">
			<h3><?php the_title(); ?></h3>
			<p class="post-date"><?php the_date(); ?></p>
			<div class="content"><?php the_content(); ?></div>

			<?php
			// check if the flexible content field has rows of data
			if( have_rows('featured_media') ):

			     // loop through the rows of data
			    while ( have_rows('featured_media') ) : the_row();

			        if( get_row_layout() == 'video' ):

			        	$video = get_sub_field('video');

			        	echo '<div class="post-video responsive-video"><iframe src="' . $video . '" frameborder="0" allowfullscreen></iframe></div>';

			        elseif( get_row_layout() == 'image' ): 

			        	$image = get_sub_field('image');

			        	echo '<div class="post-image responsive-image"><img src="' . $image . '" alt="post-image" /></div>';

			        endif;

			    endwhile;

			else :

			    // no layouts found

			endif;
		?>

		<?php 
		//Begin Social Profile Loop this while render as <a></a>
		$twitter = "https://twitter.com/intent/tweet?url=";
		$fb = "https://www.facebook.com/sharer/sharer.php?u="; 
		$postLink = urlencode( get_permalink() );
		?>

		<div class="post-share-wrapper">
				<p>Share: </p>
				<a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php $postLink ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		</div>
</article>
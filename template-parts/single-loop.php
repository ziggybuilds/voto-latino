<?php
/*
* Single loop template part
*
* @package je-starter
*
*/
?>
<article class="article">
			<p class="post-date"><?php the_date(); ?></p>
			<h1 class=""><?php the_title(); ?></h1>
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
</article>
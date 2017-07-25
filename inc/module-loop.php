<?php 
/**
* Module loop template
* @package je-starter
*
*/
?>

<div class="main-page-content">
		<?php if(get_field('sub_header', $id) ): ?>
			<div class="sub-header"><?php the_field('sub_header', $id); ?></div>
		<?php endif; ?>

		<?php
		// check if the flexible content field has rows of data
		if( have_rows('module') ):

		 	// loop through the rows of data
		    while ( have_rows('module') ) : the_row();

				// check current row layout
		        if( get_row_layout() == 'cards' ):

		        	// check if the nested repeater field has rows of data
		        	if( have_rows('individual_card') ):
		        			echo '<div class="cards">';
					    while ( have_rows('individual_card') ) : the_row();

							$name = get_sub_field('name');
							$picture = get_sub_field('picture');
							$text = get_sub_field('content');
							$link = get_sub_field('link');

							if( $picture ):
								$cardImage =	'<div class="card-image"><img src="' . $picture . '" alt="' . $name . '"></div>';
							endif;
							
							echo '<div class="single-card">' .
									'<div class="card-title">' . 
										$cardImage .
										'<h3>' . $name . '</h3>' .
									'</div>' .
									'<div class="card-content">' . $text .
									'</div><div class="card-more"><a href="' . $link . '">More</a></div>' . 
								'</div>';

						endwhile;

						echo '</div>';

					endif;

		        endif;

		          if( get_row_layout() == 'long_list' ):

		        	$list  = get_sub_field('long_list_content');

		        	echo '<div class="long-list">' . $list . '</div>';

		        endif;

		            if( get_row_layout() == 'sub_header' ):

		        	$sub = get_sub_field('sub_header_text');

		        	echo '<div class="sub-header-module">' . $sub . '</div>';

		        endif;

		         if( get_row_layout() == 'embed_video' ):

		        	$vid = get_sub_field('embed_iframe');

		        	echo '<div class="video-wrapper"><div class="video-module video-embed">' . $vid . '</div></div>';

		        endif;

		            if( get_row_layout() == 'full_width_content'):

		        	$content = get_sub_field('content');

		        	echo '<div class="full-width">' . $content . '</div>';

		        endif;

		    endwhile;

		else :

		    // no layouts found

		endif;
		?>
</div>
<?php 
/*
* This is the single paeg post template
*
*
*
*/ 
get_header(); ?>

<?php $id = get_the_id(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<div class="inner-wrapper">
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
									$content = get_sub_field('content');
									$link = get_sub_field('link');

									if( $picture ):
										$cardImage =	'<div class="card-image"><img src="' . $picture . '" alt="' . $name . '"></div>';
									endif;
									
									echo '<div class="single-card">' .
											'<div class="card-title">' . 
												$cardImage .
												'<h3>' . $name . '</h3>' .
											'</div>' .
											'<div class="card-content">' . $content .
											'</div><div class="card-more"><a href="' . $link . '">More</a></div>' . 
										'</div>';

								endwhile;

								echo '</div>';

							endif;

				        endif;

				          if( get_row_layout() == 'long_list' ):

				        	$content  = get_sub_field('long_list_content');

				        	echo '<div class="long-list">' . $content . '</div>';

				        endif;

				            if( get_row_layout() == 'sub_header' ):

				        	$content = get_sub_field('sub_header_text');

				        	echo '<div class="sub-header-module">' . $content . '</div>';

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
			</div>

			<?php if( get_field('display_sign_up', $id) === true ):
				get_template_part('inc/sign-up');
				endif;
			?>

			<?php 
			function buttonCall($field, $pageID) {
				if( get_field($field, $pageID) === true ):
					$frontpage_id = get_option( 'page_on_front' );
					$title = get_field($field . '_title', $frontpage_id);
					$button = get_field($field . '_button', $frontpage_id);
					$link = get_field($field . '_link', $frontpage_id);
					include(locate_template('inc/large-button.php') );
				endif;
			}
			buttonCall('display_donate', $id);
			?>

		</main><!-- #main -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
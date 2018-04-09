<?php 
/**
* This is the single paeg post template
*
* @package je-starter
*
*/ 
get_header(); ?>

<?php $id = get_the_id(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
			<section class="container single-post">
				<div class="inner-wrapper single-post-display">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						
						get_template_part( 'template-parts/single-loop');
				?>
				</div>
				<?php
					the_post_navigation( array(
							'prev_text' => '<span class="screen-reader-text nav">' . __( 'Previous Post', 'je-starter' ) . '</span>',
							'next_text' => '<span class="screen-reader-text nav">' . __( 'Next Post', 'je-starter' ) . '</span>',
						) );

					endwhile; // End of the loop.
				?>
				<?php 
				//Begin Social Profile Loop this while render as <a></a>
				$twitter = "https://twitter.com/intent/tweet?url=";
				$fb = "https://www.facebook.com/sharer/sharer.php?u="; 
				$postLink = urlencode( get_permalink() );
				?>

				<div class="post-share-wrapper">
						<a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php $postLink ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
<?php
/*
* Archive-loop template
*
* @package je-starter
*
*/
?>
<article class="article">
			<?php
				if( get_field('date_picker') ) {
					$datePick = get_field('date_picker', false, false);
					$datePick = new DateTime($datePick);

					// allows user to select year display only
					if ( get_field('display_year_only') === true ) {
						$datePick = $datePick->format('Y');
					} else {
						$datePick = $datePick->format('F Y');
					}

				}
			?>
			<a href="<?php echo get_permalink(); ?>">
				<p><span class="post-date"><?php echo $datePick; ?></span></p>
				<h3><?php the_title(); ?></h3>
				<div class="article-inner">
					<div class="article-content"><?php the_excerpt(); ?></div>
				</div>
			</a>
</article>
<?php
/*
* Frontpage-loop template
*
* @package je-starter
*
*/
?>
<div class="event">
			<?php
				if( get_field('date_picker') ) {
					$datePick = get_field('date_picker', false, false);
					$datePick = new DateTime($datePick);
					$datePick = $datePick->format('F j, Y');
				}
			?>
			<p><span class="post-date"><?php echo $datePick; ?></span></p>
			<h4><?php the_title(); ?></h4>
			<a href="<?php echo get_permalink(); ?>">View More</a>
</div>
<?php
/*
* This is the left aligned split vertical
*
*
*/
?>

<?php 
$issue = get_field('issue_photo', $id);
$record = get_field('record_photo', $id);
?>

<section class="container vertical-split-boxes" id="policy-section">
		<div class="lg-col-6 md-col-6 sm-col-12 first" id="policy-flip-small">
			<div class="content">
				<div class="text">
				<?php if( get_field('topper_text_issues', $id) ):
					echo '<h3>' . get_field('topper_text_issues', $id) .  '</h3>';
				endif;
					if( get_field('topper_subtitle_issues', $id) ):
						echo '<p>' . get_field('topper_subtitle_issues', $id) .  '</p>';
				endif;
				?>
					<div class="greenbar"></div>
				</div>
				<div class="more-link"><a href="<?php the_field('more_link_issues', $id); ?>"><?php the_field('more_text_issues', $id); ?> </a></div>
			</div>
		</div>
		<div class="lg-col-6 md-col-6 sm-col-12 second">
			<div class="split-vertical" style="background-image: url(<?php echo $issue; ?>);">
					<?php
					function getIssue($area) {
						$type = $area . '_box';
						if( have_rows($type, $id) ):
							while( have_rows($type, $id) ): the_row();
									$link = get_sub_field('url');
									$headline = get_sub_field('headline');
									$excerpt = get_sub_field('excerpt');
								
								echo '<a href="'. $link . '"/><div class="content">';

								echo '<div><p class="social-type">' . 
									$headline . '</p>' . $excerpt . '</div></div>';

								echo '</a>';
							endwhile;
						endif;
					}
					getIssue('issue');
					?>
				<div class="overlay-green overlay"></div>
			</div>
			<div class="split-vertical" style="background-image: url(<?php echo $record; ?>);">
					<?php 

					getIssue('record');

					?>
				<div class="overlay-lightblue overlay"></div>
			</div>
		</div>
		<div class="lg-col-6 md-col-6 sm-col-12 first" id="policy-flip-large">
			<div class="content">
				<div class="text">
				<?php if( get_field('topper_text_issues', $id) ):
					echo '<h3>' . get_field('topper_text_issues', $id) .  '</h3>';
				endif;
					if( get_field('topper_subtitle_issues', $id) ):
						echo '<p>' . get_field('topper_subtitle_issues', $id) .  '</p>';
				endif;
				?>
					<div class="greenbar"></div>
				</div>
				<div class="more-link"><a href="<?php the_field('more_link_issues', $id); ?>"><?php the_field('more_text_issues', $id); ?> </a></div>
			</div>
		</div>
</section>
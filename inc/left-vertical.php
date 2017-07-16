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
				<div class="more-link"><a href="">Learn More  <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
			</div>
		</div>
		<div class="lg-col-6 md-col-6 sm-col-12 second">
			<div class="split-vertical" style="background-image: url(<?php echo $issue; ?>);">
				<div class="content">
					<div>
						<p class="social-type">This is a title</p class="social-type">
						<p>Aged espresso strong skinny, java caramelization breve cup chicory body frappuccino. Frappuccino mazagran latte arabica, aromatic, caramelization espresso</p>
					</div>
				</div>
				<div class="overlay-green overlay"></div>
			</div>
			<div class="split-vertical" style="background-image: url(<?php echo $record; ?>);">
				<div class="content">
					<div>
						<p class="social-type">This is a title</p class="social-type">
						<p>Aged espresso strong skinny, java caramelization breve cup chicory body frappuccino. Frappuccino mazagran latte arabica, aromatic, caramelization espresso</p>
					</div>
				</div>
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
				<div class="more-link"><a href="">Learn More<i class="fa fa-caret-right" aria-hidden="true"></i></a></div>
			</div>
		</div>
</section>
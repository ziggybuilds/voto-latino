<?php
/*
* This is the right aligned split vertical
*
*
*/
?>

<?php 
$tweet = get_field('tweet_photo', $id);
$facebook = get_field('facebook_photo', $id);
?>

<section class="container vertical-split-boxes">
		<div class="lg-col-6 md-col-6 sm-col-12 first">
			<div class="content">
				<div class="text">
				<?php if( get_field('topper_text_sm', $id) ):
					echo '<h3>' . get_field('topper_text_sm', $id) .  '</h3>';
				endif;
					if( get_field('topper_subtitle_sm', $id) ):
						echo '<p>' . get_field('topper_subtitle_sm', $id) .  '</p>';
				endif;
				?>
					<div class="greenbar"></div>
				</div>
				<div class="more-link"><a href="">Learn More<i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
			</div>
		</div>
		<div class="lg-col-6 md-col-6 sm-col-12 second">
			<div class="split-vertical" style="background-image: url(<?php echo $tweet; ?>);">
				<div class="content">
					<div>
						<p class="social-type">This is a title</p class="social-type">
						<p>Aged espresso strong skinny, java caramelization breve cup chicory body frappuccino. Frappuccino mazagran latte arabica, aromatic, caramelization espresso</p>
					</div>
				</div>
				<div class="overlay-green overlay"></div>
			</div>
			<div class="split-vertical" style="background-image: url(<?php echo $facebook; ?>);">
				<div class="content">
					<div>
						<p class="social-type">This is a title</p class="social-type">
						<p>Aged espresso strong skinny, java caramelization breve cup chicory body frappuccino. Frappuccino mazagran latte arabica, aromatic, caramelization espresso</p>
					</div>
				</div>
				<div class="overlay-lightblue overlay"></div>
			</div>
		</div>
</section>
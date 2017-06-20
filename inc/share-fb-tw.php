	<?php 
	//Begin Social Profile Loop this while render as <a></a>
	$twitter = "https://twitter.com/intent/tweet?url=";
	$fb = "https://www.facebook.com/sharer/sharer.php?u="; 
	$homeLink = urlencode( get_home_url() );
	?>

	<div class="share-wrapper">
		<div class="share-action">
			<a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false" target="_blank"><div class="share-tw">
				<i class="fa fa-twitter" aria-hidden="true"></i>
			</div></a>
		</div>

		<?php if( get_field('share_icon_middle', 'options') ): ?>
			<div class="icon horiz-center">
				<img src="<?php the_field('share_icon_middle', 'options'); ?>" alt="state-icon" />
			</div>
		<?php endif; ?>
		<div class="share-action">
			<a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php $homeLink ?>" target="_blank"><div class="share-fb">
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</div></a>
		</div>
	</div>
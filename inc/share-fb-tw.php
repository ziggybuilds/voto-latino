	<?php 
	//Begin Social Profile Loop this while render as <a></a>
	$twitter = "https://twitter.com/intent/tweet?url=";
	$fb = "https://www.facebook.com/sharer/sharer.php?u="; 
	$homeLink = urlencode( get_home_url() );
	?>

	<div class="share-wrapper">
			<a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php $homeLink ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	</div>
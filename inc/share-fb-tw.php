<?php
/**
*	Post share wrapper
*	ACF theme options controls the hashtag, will auto share the home url
*/
?>
<?php 
	//Begin Social Profile Loop this while render as <a></a>
	if ( get_field('hashtag', 'acf-options') ):
		$tweetTag = "&hashtags=" . get_field('hashtag', 'acf-options');
	else :
		$tweetTag = "&hashtags=";
	endif;
	
	$twitter = "https://twitter.com/intent/tweet?url=";
	$fb = "https://www.facebook.com/sharer/sharer.php?u="; 
	$postLink = urlencode( get_home_url() );
?>

<div class="share-wrapper">
	<a href="<?php echo $twitter; echo $postLink; echo $tweetTag; ?>" class="twitter-share-button" data-show-count="false" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	<a class="facebook" href="<?php echo $fb; echo $postLink; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
</div>

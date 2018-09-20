<?php
/*
* Buttons display
*
* @package je-starter
*
*/
?>
<?php if ( get_field('button_ios', 'options') ) : 
	$ios_url = get_field('button_ios', 'options');
?>
	<button data-url="<?php echo $ios_url; ?>" class="button--url button--danger button--ios"><i class="fab fa-apple"></i> Download For IOS</button>
<?php endif; ?>
<?php if ( get_field('button_android', 'options') ) : 
	$android_url = get_field('button_android', 'options');
?>
	<button data-url="<?php echo $android_url; ?>" class="button--url button--danger button--android"><i class="fab fa-android"></i>Download For Android</button>
<?php endif; ?>

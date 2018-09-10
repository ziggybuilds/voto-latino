<?php
/*
* Sign Up Button display
*
* @package je-starter
*
*/
?>
<?php if ( get_field('sign_up_link', 'options') ) : 
	$sign_up = get_field('sign_up_link', 'options');
?>
	<button data-url="<?php echo $sign_up; ?>" class="button--danger button--signUp">Sign Up</button>
<?php endif; ?>

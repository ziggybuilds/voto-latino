<?php
/**
 * The template for displaying the header menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package je-starter
 */

?>
<div class="headerMenu container">
	<div class="headerMenu__innerWrapper inner-wrapper">
		<div class="headerMenu__logo">
			<?php if ( get_field('logo', 'options') ):
				echo '<img src="' . get_field("logo", "options") . '" alt="logo" />';
			endif; ?>
		</div>
	</div>
</div>

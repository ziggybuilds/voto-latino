<?php
/*
* This is the menu overlay
* 
*
*/
?>
<div id="mobileNav">
	<div class="mobileLogo">
	<?php 
		// echo the optional header menu logo
		if( get_field('header_logo', 'options') ): 
			echo '<a href="' . get_home_url() . '"><img id="mobileHeaderLogo" src="' . get_field('header_logo', 'options') . '" alt="logo"></a>';
		endif;
	?>
	</div>

	<div class="mobile-menu-button">
		<button class="hamburger hamburger--elastic" type="button" id="mobileMenuBtn" aria-label="Menu" aria-controls="navigation">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>
	</div>
	<div class="mobile-overlay mobile-overlay-closed" id="menuDropdown" style="top: -200%;">
	<?php
		// This displays the primary menu
		wp_nav_menu( array(
			'menu' => 'mobile',
			'menu_class' => 'mobile-dropdown-menu',
			) );
	?>
	</div>
</div>
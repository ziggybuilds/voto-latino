<?php
/*
* This is the menu overlay
* Inspiration 
*
*/
?>

<?php $id = get_the_id(); ?>

<div class="nav-container" id="navContainer">
	<div class="menu-button">
		<button class="hamburger hamburger--elastic" type="button" id="menuBtn" aria-label="Menu" aria-controls="navigation">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
			<span class="menu-label">Menu</span>
		</button>
	</div>
	<div class="overlay-closed overlay vert-center" id="menuDropdown">
	<?php
		// This displays the primary menu
		wp_nav_menu( array(
			'menu' => 'primary',
			'menu_class' => 'colored-menu',
			) );
	?>
	</div>
</div>
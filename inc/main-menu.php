<div class="navbar container">
	<div class="logo lg-col-6">
	<?php 
		// echo the optional header menu logo
		if( get_field('header_logo', 'options') ): 
			echo '<a href="' . get_home_url() . '"><img id="headerLogo" src="' . get_field('header_logo', 'options') . '" alt="logo"></a>';
		endif;
	?>
	</div>
	<div class="navigation">
		<?php
			// echoing the nav menu
			wp_nav_menu( array(
				'menu' => 'Primary',
				'menu_class' => 'primary-menu',
				) );
		?>
	</div>
	<div class="buttons">
		<?php 
			// echo the donate button and the sign up button
			if( get_field('donate_button', 'options') && get_field('donate_link', 'options') ): 
			echo '<a href="' . get_field('donate_link', 'options') . '"><button class="donate-button">' . get_field('donate_button', 'options') . '</button></a>';
			endif;

			if( get_field('signup_button', 'options') && get_field('signup_button_link', 'options') ): 
			echo '<a href="' . get_field('signup_button_link', 'options') . '"><button class="signup-button">' . get_field('signup_button', 'options') . '</button></a>';
			endif;
		?>
	</div>
	<?php get_template_part('inc/social-profiles'); ?>
</div>
<div class="container" id="addMenu" data-state="closed">
	<?php
		// echoing the additional nav menu
		wp_nav_menu( array(
			'menu' => 'Additional',
			'menu_class' => 'add-menu',
			) );
	?>
</div>
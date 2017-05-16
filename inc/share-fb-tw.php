<?php 
	//Begin Social Profile Loop this while render as <a></a>
	if( have_rows('social_profiles', 'options') ): 
	?>
	<?php while( have_rows('social_profiles', 'options') ): the_row(); ?>
			
		<?php $twitter = "https://twitter.com/intent/tweet?url=";
			$fb = "https://www.facebook.com/sharer/sharer.php?u="; 
		?>

		<?php if( get_row_layout() == 'twitter' ): 
			$twlink = urlencode( get_home_url() ); 
			?>
			<a href="<?php echo $twitter; ?><?php echo $twlink; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<?php endif; ?>
		<?php if( get_row_layout() == 'facebook' ): 
			$fblink = urlencode( get_home_url() ); 
			?>
			<a href="<?php echo $fb; ?><?php echo $fblink; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
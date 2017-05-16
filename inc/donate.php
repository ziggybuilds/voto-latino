<?php
/**
*This is the donate module
*
*
*/
?>
<?php $id = get_the_id(); ?>
<?php if( get_field('image_override', '$id') ) : ?>
	<div class="container shadow flex donate-module" style="background-image: url(<?php echo the_field('donate_image', $id); ?>)">
<?php else : ?>
	<div class="container shadow flex donate-module" style="background-image: url(<?php echo the_field('donate_image', 'options'); ?>)">
<?php endif; ?>
	<div class="overlay-dblue shadow"></div>
	<div class="overlay-gradient"></div>
	<div class="inner-wrapper flex donate-inner horizontal-flex">
		<div class="donate wow zoomIn" data-wow-delay="1s">
			<?php if( get_field('donate_text', 'options') ): ?>
				<h1><?php echo the_field('donate_text', 'options'); ?></h1>
			<?php endif; ?>
			<?php if( get_field('donate_subtitle', 'options') ): ?>
				<p><?php echo the_field('donate_subtitle', 'options'); ?></p>
			<?php endif; ?>
			<div class="accent-red"></div>
			<form action="https://dga.gospringboard.com/dem-govs-firewall" method="POST" id="donate-form" enctype="multipart/form-data" target="_self">
				<fieldset>
				<div class="form-field email">
					<input class="email" type="email" name="submitted[take_action][mail]" placeholder="Email Address" required>
				</div>
				<div class="form-field fname">
					<input type="text" name="submitted[take_action][sbp_first_name]" placeholder="First Name" maxlength="128" required>
				</div>
				<div class="form-field lname">
					<input type="text" name="submitted[take_action][sbp_last_name]" placeholder="Last Name" maxlength="128" required>
				</div>
				<div class="form-field zip">
					<input type="text" name="submitted[take_action][sbp_zip]" placeholder="Zipcode" maxlength="5" required>
				</div>
				</fieldset>
				<input type="hidden" name="submitted[ms]" value="default_ms" />
				<input type="hidden" name="submitted[cid]" value="" />
				<input type="hidden" name="submitted[referrer]" value="" />
				<input type="hidden" name="submitted[initial_referrer]" value="" />
				<input type="hidden" name="submitted[search_engine]" value="" />
				<input type="hidden" name="submitted[search_string]" value="" />
				<input type="hidden" name="submitted[user_agent]" value="" />
				<input type="hidden" name="submitted[utm_medium]" value="web" />
				<input type="hidden" name="submitted[utm_campaign]" value="dem_govs_firewall" />
				<input type="hidden" name="submitted[utm_source]" value="" />
				<input type="hidden" name="submitted[geo]" value="" />
				<input type="hidden" name="submitted[aud]" value="" />
				<input type="hidden" name="submitted[social_referer_transaction]" value="" />
				<input type="hidden" name="submitted[social_referer_network]" value="" />
				<input type="hidden" name="submitted[social_referer_contact]" value="" />
				<input type="hidden" name="submitted[device_type]" value="Desktop" />
				<input type="hidden" name="submitted[device_name]" />
				<input type="hidden" name="submitted[device_os]" value="Macintosh" />
				<input type="hidden" name="submitted[device_browser]" value="Chrome 58.0.3029.110" />
				<input type="hidden" name="details[sid]" />
				<input type="hidden" name="details[page_num]" value="1" />
				<input type="hidden" name="details[page_count]" value="1" />
				<input type="hidden" name="details[finished]" value="0" />
				<input type="hidden" name="form_build_id" value="form-kelKtZHUhPhMKSjbOHCnLLZsYmE3ofxWChsKsaxJZYk" />
				<input type="hidden" name="form_id" value="webform_client_form_3662" />
				<div class="form-field submit">
					<button class="btn" type="submit" value="submit">Sign Up</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package je-starter
 */

get_header(); ?>
<?php $id = get_the_id(); ?>
	<div id="primary" class="content-area home-page fadeIn">
		<main id="fullpage" class="site-main" role="main">
			<section class="container section hero">
				<div class="hero__innerWrapper inner-wrapper">
					<?php if ( get_field('hero_logo', 'options') ) : $hero_logo = get_field('hero_logo', 'options'); ?>
					<div class="hero__innerWrapper__logo">
						<img src="<?php echo $hero_logo; ?>" alt="hero" />
					</div>
					<?php endif; ?>
					<?php if ( get_field('hero_subtitle', 'options') ) : ?>
					<div class="hero__innerWrapper__subtitle">
						<h3><?php the_field('hero_subtitle', 'options'); ?></h3>
					</div>
					<?php endif; ?>
					<?php if ( get_field('hero_text', 'options') ) : ?>
					<div class="hero__innerWrapper__text">
						<p><?php the_field('hero_text', 'options'); ?></p>
					</div>
					<?php endif; ?>
					<div class="hero__innerWrapper__buttons">
						<?php get_template_part('inc/download-buttons'); ?>
					</div>
				</div>
				<?php if ( get_field('hero_background', 'options') ) : ?>
				<img  class="hero__background" src="<?php the_field('hero_background', 'options'); ?>" alt="background" />
				<?php endif; ?>
			</section>
			<section class="section intro container ">
				<div class="intro__innerWrapper inner-wrapper">
					<?php
						// function to fallback to homepage if not on current page
						if ( acf_home_fallback('introduction_topper') ) :
					?>
						<div class="intro__innerWrapper__topper">
							<p><?php echo acf_home_fallback('introduction_topper'); ?></p>
						</div>
					<?php endif; ?>
					<?php
						// function to fallback to homepage if not on current page
						if ( acf_home_fallback('introduction_statements') ) :
					?>
						<div class="intro__innerWrapper__boxes">
					<?php
							function emphasis_boxes() {
								$repeater = acf_home_fallback('introduction_statements');
								foreach ( $repeater as $box ) {
									echo '<div class="intro__innerWrapper__boxes__box"><p>' . $box["box"] . '</p></div>';
								}
							}
							emphasis_boxes();
					?>
						</div>
					<?php endif; ?>
					<?php
						if ( acf_home_fallback('introduction_footer') ) :
					?>
						<div class="intro__innerWrapper__footer">
							<h5>How It Works</h5>
							<h2><?php echo acf_home_fallback('introduction_footer'); ?></h2>
							<svg viewBox="0 0 54 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <g transform="translate(-1138.000000, -689.000000)" stroke="#FFFFFF" stroke-width="5.669">
							            <g>
							                <g transform="translate(1140.000000, 692.000000)">
							                    <path d="M50,0 L25.9902011,19.5863798 C25.4454049,20.1378734 24.5545951,20.1378734 24.0097989,19.5863798 L0,0"></path>
							                </g>
							            </g>
							        </g>
							    </g>
							</svg>
						</div>
					<?php endif; ?>
				</div>
			</section>
			<?php
				if ( have_rows('instruction_modules', $id) ) :
					$count = 1;
					$total = count( get_field('instruction_modules', $id ) );
					while ( have_rows('instruction_modules', $id) ) : the_row();
							$field = get_sub_field('module');
							$image = $field['preview_image'];
							$text = $field['text_content'];

							if ( $count % 2 == 0 ) {
								$state = 'even';
							} else {
								$state = 'odd';
							}

							if ( $count == $total) {
								// conditional render of the continue
								$endOfModules = 'end';
							}
					?>
					<section class=" section container instruction">
				<div class="inner-wrapper instruction__innerWrapper">
					<div class="instruction__innerWrapper__text">
						<div class="instruction__innerWrapper__text__content instruction__innerWrapper__text__content--<?php echo $state; ?>">
							<h1><?php echo $count; ?></h1>
							<p><?php echo $text; ?></p>
						</div>
					</div>
					<div class="instruction__innerWrapper__image">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 325 674"><defs><style>.cls-1{fill:#d1e4f0;}.cls-3{fill:#8ac1e6;}</style>
 <pattern id="img_<?php echo $count; ?>" patternUnits="userSpaceOnUse" width="300" height="520"  patternTransform="translate(12.5, 0)">
	<image xlink:href="<?php echo $image; ?>" x="0" y="77" width="300" height="520" />
</pattern>
</defs><g data-name="Layer 2"><g data-name="Layer 1"><path class="cls-1" d="M162.5,674H273.37a48.75,48.75,0,0,0,22.49-5.34A54.93,54.93,0,0,0,318.24,648,48.72,48.72,0,0,0,325,622.89V51.11A48.72,48.72,0,0,0,318.24,26,54.93,54.93,0,0,0,295.86,5.34,48.75,48.75,0,0,0,273.37,0H51.63A48.75,48.75,0,0,0,29.14,5.34,54.93,54.93,0,0,0,6.76,26,48.72,48.72,0,0,0,0,51.11V622.89A48.72,48.72,0,0,0,6.76,648a54.93,54.93,0,0,0,22.38,20.66A48.75,48.75,0,0,0,51.63,674Z"/><rect class="cls-2" x="12.5" y="76" width="300" height="520" rx="4" ry="4" fill="url(#img_<?php echo $count; ?>)"/><circle class="cls-3" cx="162.5" cy="633.83" r="24"/><rect class="cls-3" x="109" y="38" width="107" height="9" rx="4.5" ry="4.5"/><circle class="cls-3" cx="162.5" cy="21.79" r="4.9"/></g></g></svg>
					</div>
				</div>
				<div class="instruction__bottomBar instruction__bottomBar--<?php echo $state; ?> container">
					<div class="instruction__bottomBar__nav inner-wrapper">
						<div class="instruction__bottomBar__nav__content">
							<a class="instruction__bottomBar__nav__content__link  instruction__bottomBar__nav__content__link--<?php echo $endOfModules; ?>" href="">
								<p>Continue</p>
								<svg viewBox="0 0 54 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								        <g transform="translate(-1138.000000, -689.000000)" stroke="#FFFFFF" stroke-width="5.669">
								            <g>
								                <g transform="translate(1140.000000, 692.000000)">
								                    <path d="M50,0 L25.9902011,19.5863798 C25.4454049,20.1378734 24.5545951,20.1378734 24.0097989,19.5863798 L0,0"></path>
								                </g>
								            </g>
								        </g>
								    </g>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</section>

					<?php
							++$count;
					endwhile;
				endif;
			?>
<?php

// <main>
// </div> primary
// ^^^^ will end in footer to accomodate fullpage.js
get_footer();

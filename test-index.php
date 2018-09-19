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
<?php $id = get_the_ID(); ?>
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
						<svg viewBox="0 0 349 698" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						    <defs>
						    	 <pattern id="img_<?php echo $count; ?>" patternUnits="userSpaceOnUse" width="300" height="520"  patternTransform="translate(12.5, 0)">
									<image xlink:href="<?php echo $image; ?>" x="0" y="77" width="300" height="520" />
								</pattern>
						        <path d="M162.5,674 L273.375,674 C281.183,674 288.929,672.259 295.859,668.662 C305.415,663.703 312.927,656.862 318.242,648.001 C322.778,640.439 325,631.712 325,622.894 L325,51.106 C325,42.288 322.778,33.561 318.242,25.999 C312.927,17.137 305.415,10.297 295.859,5.338 C288.929,1.741 281.183,0 273.375,0 L162.5,0 L51.625,0 C43.817,0 36.072,1.741 29.141,5.338 C19.585,10.297 12.073,17.137 6.758,25.999 C2.222,33.561 0,42.288 0,51.106 L0,622.894 C0,631.712 2.222,640.439 6.758,648.001 C12.073,656.862 19.585,663.703 29.141,668.662 C36.072,672.259 43.817,674 51.625,674 L162.5,674 Z" id="path-1"></path>
						        <filter x="-6.2%" y="-2.4%" width="112.3%" height="105.9%" filterUnits="objectBoundingBox" id="filter-2">
						            <feMorphology radius="1" operator="dilate" in="SourceAlpha" result="shadowSpreadOuter1"></feMorphology>
						            <feOffset dx="0" dy="4" in="shadowSpreadOuter1" result="shadowOffsetOuter1"></feOffset>
						            <feGaussianBlur stdDeviation="5" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
						            <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.3 0" type="matrix" in="shadowBlurOuter1"></feColorMatrix>
						        </filter>
						    </defs>
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <g transform="translate(11.000000, 8.000000)">
						            <g transform="translate(1.000000, 0.000000)">
						                <g>
						                    <use fill="black" fill-opacity="1" filter="url(#filter-2)" xlink:href="#path-1"></use>
						                    <use fill="#D1E4F1" fill-rule="evenodd" xlink:href="#path-1"></use>
						                </g>
						                <path class="svg__innerImage" d="M308.5,596 L16.5,596 C14.3,596 12.5,594.2 12.5,592 L12.5,80 C12.5,77.8 14.3,76 16.5,76 L308.5,76 C310.7,76 312.5,77.8 312.5,80 L312.5,592 C312.5,594.2 310.7,596 308.5,596" fill="url(#img_<?php echo $count; ?>)"></path>
						                <path d="M186.5,633.835 C186.5,647.09 175.755,657.835 162.5,657.835 C149.245,657.835 138.5,647.09 138.5,633.835 C138.5,620.58 149.245,609.835 162.5,609.835 C175.755,609.835 186.5,620.58 186.5,633.835" fill="#8AC1E6"></path>
						                <path d="M211.5,47 L113.5,47 C111.025,47 109,44.975 109,42.5 C109,40.025 111.025,38 113.5,38 L211.5,38 C213.975,38 216,40.025 216,42.5 C216,44.975 213.975,47 211.5,47" fill="#8AC1E6"></path>
						                <path d="M167.3984,21.7881 C167.3984,24.4931 165.2054,26.6861 162.5004,26.6861 C159.7944,26.6861 157.6024,24.4931 157.6024,21.7881 C157.6024,19.0831 159.7944,16.8901 162.5004,16.8901 C165.2054,16.8901 167.3984,19.0831 167.3984,21.7881" fill="#8AC1E6"></path>
						            </g>
						        </g>
						    </g>
						</svg>
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

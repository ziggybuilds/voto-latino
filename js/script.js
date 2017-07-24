'use strict';

jQuery(document).ready(function ($) {

	"use strict";

	// Hover State of the vertical boxes

	function classOnHover(list) {
		list.forEach(function (item) {
			var color = item.querySelector('div.overlay');
			var content = item.querySelector('div.content');

			content.addEventListener('mouseenter', function (event) {
				TweenMax.to(color, .4, { css: { opacity: '.9' } });
			});
			content.addEventListener('mouseleave', function (event) {
				TweenMax.to(color, .4, { css: { opacity: '.6' } });
			});
		});
	}

	var vertBoxes = document.querySelectorAll('div.split-vertical');
	classOnHover(vertBoxes);

	// Ticker Tape hider
	function hideTicker() {
		var ticker = document.getElementById('tickerHide');
		var tape = document.getElementById('tickerTape');
		var social = document.getElementById('socialCorner');
		ticker.addEventListener('click', function (e) {
			TweenMax.to(tape, .4, { css: { opacity: '0' } });

			var timeline = new TimelineMax();
			timeline.to(social, .4, { bottom: '20px' });
			timeline.to(tape, 0, { css: { display: 'none' } });
		});
	}
	hideTicker();

	// Responsize menu

	var menu = document.querySelector('.primary-menu');
	var navbar = document.querySelector('.navbar');

	function responsiveMenu() {
		var more = navbar.querySelector('li.menuDropCtrl');
		more.innerHTML = 'More <i class="fa fa-chevron-down" aria-hidden="true"></i>';

		var addMenu = document.querySelector('#addMenu');
		menu.addEventListener('mouseover', function (e) {
			if (addMenu.getAttribute('data-state') === 'closed') {
				TweenMax.to(addMenu, 0, { css: { opacity: '0' } });
				TweenMax.to(addMenu, 0, { css: { display: 'block' } });
				TweenMax.to(addMenu, .4, { css: { opacity: '1' } });
				addMenu.setAttribute('data-state', 'open');
			}
		});
		addMenu.addEventListener('mouseleave', function (e) {
			if (addMenu.getAttribute('data-state') === 'open') {
				TweenMax.to(addMenu, .4, { css: { opacity: '0' } });
				TweenMax.to(addMenu, .2, { css: { display: 'none' } });
				addMenu.setAttribute('data-state', 'closed');
			}
		});
	}

	responsiveMenu();

	window.addEventListener('resize', function () {});

	// Fix WP Caption width
	$('.wp-caption').removeAttr('style');
});
jQuery(document).ready(function ($) {

	"use strict";

	var $mobileNav = document.getElementById('mobileNav'),
	    $mobileBtn = document.getElementById('mobileMenuBtn'),
	    $mobileMenu = document.getElementById('menuDropdown');

	$($mobileBtn).click(function () {
		// Check if target has open class
		if ($($mobileMenu).hasClass('mobile-overlay-closed')) {
			TweenMax.to($mobileMenu, 1, { top: '0' });

			$($mobileMenu).removeClass('mobile-overlay-closed');

			$($mobileBtn).toggleClass("is-active");
		} else if (!$($mobileMenu).hasClass('mobile-overlay-closed')) {
			TweenMax.to($mobileMenu, 1, { top: '-200%' });

			$($mobileMenu).addClass('mobile-overlay-closed');

			$($mobileBtn).toggleClass("is-active");
		}
	});

	// Smooth scrolling behavior

	$(document).ready(function () {
		// Add smooth scrolling to all links
		$("a").on('click', function (event) {

			// Make sure this.hash has a value before overriding default behavior
			if (this.hash !== "") {
				// Prevent default anchor click behavior
				event.preventDefault();

				// Store hash
				var hash = this.hash;

				// Using jQuery's animate() method to add smooth page scroll
				// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
				$('html, body').animate({
					scrollTop: $(hash).offset().top
				}, 500, function () {

					// Add hash (#) to URL when done scrolling (default click behavior)
					window.location.hash = hash;
				});
			} // End if
		});
	});
});
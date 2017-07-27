'use strict';

jQuery(document).ready(function ($) {

	"use strict";

	// Helper function to check homepage

	function checkHome() {
		if (document.body.classList.contains('home')) {
			return true;
		}
	}

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

	var videoModules = document.querySelectorAll('.video-module');
	function stripIframe(list) {
		list.forEach(function (item) {
			var video = item.querySelector('iframe');
			video.removeAttribute("width");
			video.removeAttribute("height");
		});
	}

	stripIframe(videoModules);

	window.addEventListener('resize', function () {});

	// Fix WP Caption width
	$('.wp-caption').removeAttr('style');

	function formControl() {
		var time = 5000;
		if (popUp.getAttribute('data-control') === 'active') {
			setTimeout(function (time) {
				var tl = new TimelineMax();
				tl.to(popUp, 0, {
					css: {
						opacity: '0',
						display: 'block'
					}
				});
				tl.to(popUp, .2, {
					css: {
						opacity: '1'
					}
				});
			}, time);
		}
	}

	function formClose() {
		var button = popUp.querySelector('#formClose');
		button.addEventListener('click', function (e) {
			var tl = new TimelineMax();
			tl.to(popUp, .2, {
				css: {
					opacity: '0',
					display: 'none'
				}
			});
			this.classList.remove('is-active');
		});
	}

	// Set session
	function cachedForm() {
		var test = sessionStorage.getItem('firstVisit');
		if (test == null) {
			if (checkHome() === true) {
				var _popUp = document.getElementById('#popUp');
				formControl();
				formClose();
			}
			sessionStorage.setItem('firstVisit', '1');
		}
	}
	cachedForm();

	// Smooth scrolling behavior for video link
	function smoothScroll() {
		if (checkHome() === true) {
			var videoLink = document.querySelector('.video-link > a');
			var anchor = document.querySelector('#home-page-video');
			var posTop = anchor.offsetTop + 300;
			videoLink.addEventListener('click', function (event) {
				TweenMax.to(window, .5, { scrollTo: posTop });
			});
		}
	}
	smoothScroll();

	// Fade In Controls

	var controllerViews = new ScrollMagic.Controller();

	var targets = document.querySelectorAll('.anim-push');
	function fadeIn(list) {
		list.forEach(function (item) {
			var elem = item.querySelector('.anim-target');
			TweenMax.to(elem, 0, { css: { opacity: '0' } });

			var scene = new ScrollMagic.Scene({
				triggerElement: item
			}).setTween(TweenMax.to(elem, .4, { css: { opacity: '1' } })).addTo(controllerViews);

			scene.reverse(false);
		});
	}
	fadeIn(targets);

	// Bottom of wrapper function
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

	var menuController = new ScrollMagic.Controller();
	// Downsize menu on scroll
	function menuSmall(elem, trigger) {

		var scene = new ScrollMagic.Scene({
			triggerElement: item,
			offset: 0
		}).setTween(TweenMax.to(elem, .2, { css: { opacity: '1' } })).addTo(menuController);
	}

	var primaryMenu = document.querySelector('.navbar');
	var addMenu = document.querySelector('#addMenu');
	var heroText = document.querySelector('.hero-text');
});
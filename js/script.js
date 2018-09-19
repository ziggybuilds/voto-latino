'use strict';

jQuery(document).ready(function ($) {
	// feed__articles__article
	(function () {
		var $articles = $('.feed__articles__article');
		for (var i = 0; i < $articles.length; i += 1) {
			scrollReveal($articles[i]);
		}
	})();

	// Fullpage.js Init
	$('#fullpage').fullpage({
		// options here
		autoScrolling: true,
		licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE'
	});

	// methods
	$.fn.fullpage.setAllowScrolling(true);

	// continue scroll actions
	function moveDownHandleClick(array) {
		for (var i = 0; i < array.length; i += 1) {
			$(array[i]).on('click', function (e) {
				e.preventDefault();
				fullpage_api.moveSectionDown();
			});
		}
	}

	var $continueLinks = $('.instruction__bottomBar__nav__content__link');
	moveDownHandleClick($continueLinks);

	var $svgBtn = $('.svg-btn-down');
	$svgBtn.on('click', function (e) {
		e.preventDefault();
		fullpage_api.moveSectionDown();
	});

	// button control
	// grabs data-url on each button and uses it to assign new window.location
	function handleButtonClick(elem) {
		var $btn = $(elem);
		$($btn).on('click', function (e) {
			e.preventDefault();
			var url = $btn.attr('data-url');
			window.location.assign(url);
		});
	}

	// iterate through the main buttons on the page
	var $activeBtns = $('.button--danger');
	$activeBtns.each(function () {
		handleButtonClick(this);
	});

	// control animation for banner
	var $banner = $('.banner__innerWrapper');
	var controllerBanner = new ScrollMagic.Controller();

	function bannerReveal() {
		var tl = new TimelineMax().set($banner, { y: 30 }).to($banner, 0.1, { css: { opacity: '1' } }).to($banner, 0.1, { y: 0 }, '-=0.1');

		new ScrollMagic.Scene({
			triggerElement: '.intro',
			offset: 200,
			triggerHook: 'onCenter',
			reverse: true
		}).setTween(tl).addTo(controllerBanner);

		var tlFooter = new TimelineMax().to($banner, 0.1, { css: { opacity: '0' } }).to($banner, 0.1, { x: -15 });

		new ScrollMagic.Scene({
			triggerElement: '.footer',
			offset: 200,
			triggerHook: 'onEnter',
			reverse: true
		}).setTween(tlFooter).addTo(controllerBanner);
	}
	bannerReveal();

	// animation controls
	var controller = new ScrollMagic.Controller();
	function scrollReveal(elem) {
		var tl = new TimelineMax().set(elem, { y: 15 }).set(elem, { css: { opacity: '0' } }).to(elem, 0.5, { css: { opacity: '1' } }, '0.1').to(elem, 0.5, { y: 0 }, '-=0.5');
		new ScrollMagic.Scene({
			triggerElement: elem,
			offset: '-50px',
			reverse: false
		}).setTween(tl).addTo(controller);
	}

	var $phoneFrames = $('.instruction__innerWrapper__image svg');
	for (var i = 0; i < $phoneFrames.length; i += 1) {
		scrollReveal($phoneFrames[i]);
	}

	// button actions for organizer mode
	var $modeBtn = $('#modeBtn');

	if ($modeBtn) {
		$modeBtn.on('click', function (e) {
			e.preventDefault();
			var url = $modeBtn.attr('data-href');
			window.location = url;
		});
	}

	var textController = new ScrollMagic.Controller();
	function scrollFadeIn(elem) {
		var tl = new TimelineMax().set(elem, { x: 10 }).set(elem, { css: { opacity: '0' } }).to(elem, 0.5, { css: { opacity: '1' } }, '0.1').to(elem, 0.5, { x: 0 }, '-=0.5');
		new ScrollMagic.Scene({
			triggerElement: elem,
			offset: '-50px',
			reverse: false
		}).setTween(tl).addTo(textController);
	}

	var $textContent = $('.instruction__innerWrapper__text__content');
	for (var _i = 0; _i < $textContent.length; _i += 1) {
		scrollFadeIn($textContent[_i]);
	}

	// false ajax loader svg animation
	function ajaxOnComplete() {
		var $loaderContainer = $('.falseAjax');
		var $ajaxLoader = $('#ajaxLoader');
		var ajaxTl = new TimelineMax().to($ajaxLoader, 1, { scale: 2 }).to($ajaxLoader, 1, { css: { opacity: '0' } }, '-=0.6').to($loaderContainer, 0.5, { css: { opacity: '0' } }).to($loaderContainer, 0, { css: { display: 'none' } });
	}

	var myVivus = new Vivus('ajaxLoader', {
		type: 'sync',
		duration: 200,
		animTimingFunction: Vivus.EASE_IN
	}, ajaxOnComplete);
});

jQuery(document).ready(function ($) {
	'use strict';
	// Select all links with hashes

	$('a[href*="#"]')
	// Remove links that don't actually link to anything
	.not('[href="#"]').not('[href="#0"]').click(function (event) {
		// On-page links
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			// Does a scroll target exist?
			if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 500, function () {
					// Callback after animation
					// Must change focus!
					var $target = $(target);
					$target.focus();
					if ($target.is(':focus')) {
						// Checking if the target was focused
						return false;
					} else {
						$target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
						$target.focus(); // Set focus again
					}
				});
			}
		}
	});
});
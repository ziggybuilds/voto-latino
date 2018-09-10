'use strict';

jQuery(document).ready(function ($) {
	// animation controls
	var controller = new ScrollMagic.Controller();
	function scrollReveal(elem) {
		TweenMax.to(elem, 0, { css: { 'opacity': '0' } });
		new ScrollMagic.Scene({
			triggerElement: elem,
			offset: '-50px',
			reverse: false
		}).setTween(elem, 1, { css: { 'opacity': '1' } }).addTo(controller);
	}

	// feed__articles__article
	(function () {
		var $articles = $('.feed__articles__article');
		for (var i = 0; i < $articles.length; i += 1) {
			scrollReveal($articles[i]);
		}
	})();

	// Fullpage.js Init
	$('#fullpage').fullpage({
		//options here
		autoScrolling: true,
		licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE'
	});

	//methods
	$.fn.fullpage.setAllowScrolling(true);

	// continue scroll actions
	var $continueLinks = $('.instruction__bottomBar__nav__content__link');
	for (var i = 0; i < $continueLinks.length; i += 1) {
		$($continueLinks[i]).on('click', function (e) {
			e.preventDefault();
			fullpage_api.moveSectionDown();
		});
	}
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
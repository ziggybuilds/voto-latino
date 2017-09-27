'use strict';

jQuery(document).ready(function ($) {

	"use strict";

	// animate on load after delay

	function animLoad(list) {
		for (var i = 0; i < list.length; i++) {
			var item = list[i];

			var tl = new TimelineMax();
			tl.set(item, { css: { opacity: '0' } });
			tl.to(item, 1, {
				css: {
					opacity: '1'
				}
			}, '.5');
		}
	}
	var heroText = document.querySelectorAll('.header-text');
	animLoad(heroText);

	// Fade In Controls
	var controllerViews = new ScrollMagic.Controller();

	var targets = document.querySelectorAll('.anim-load');
	function fadeIn(list) {
		for (var i = 0; i < list.length; i++) {
			var item = list[i];
			TweenMax.to(item, 0, { css: { opacity: '0' } });

			var scene = new ScrollMagic.Scene({
				triggerElement: item
			}).setTween(TweenMax.to(item, '.3', { css: { opacity: '1' } })).addTo(controllerViews);

			scene.reverse(false);
		}
	}
	fadeIn(targets);

	// Bottom of wrapper function
});
jQuery(document).ready(function ($) {

	"use strict";

	function mobileMenu() {
		var mobileBtn = document.getElementById('mobileBtn');
		if (mobileBtn != undefined) {
			var menu = document.querySelector('.menu-primary-container');
			menu.classList.toggle('hide');

			mobileBtn.addEventListener('click', function () {
				menu.classList.toggle('hide');
				menu.classList.toggle('menu-open');
				console.log('clicked');
			});
		}
	}
	mobileMenu();
});
jQuery( document ).ready( function( $ ) {

"use strict";


// animate on load after delay
function animLoad(list) {
	for(let i = 0; i < list.length; i++) {
		let item = list[i];

		var tl = new TimelineMax();
			tl.set(item, {css: {opacity: '0'}})
			tl.to(item, 1, {
				css: {
					opacity: '1'
				}
			}, '.5')
	}
}
const heroText = document.querySelectorAll('.header-text');
animLoad(heroText);

// Fade In Controls
const controllerViews = new ScrollMagic.Controller();

const targets = document.querySelectorAll('.anim-load');
function fadeIn(list) {
	for(var i = 0; i < list.length; i++) {
		let item = list[i];
		TweenMax.to(item, 0, {css: {opacity: '0'}});

		var scene = new ScrollMagic.Scene({
			triggerElement: item
		})
		.setTween(TweenMax.to(item, '.3', {css: {opacity: '1'}}))
		.addTo(controllerViews);

		scene.reverse(false);
	}
}
fadeIn(targets);



// Bottom of wrapper function
});
jQuery( document ).ready( function( $ ) {

"use strict";

const $mobileNav = document.getElementById('mobileNav'),
	$mobileBtn = document.getElementById('mobileMenuBtn'),
	$mobileMenu = document.getElementById('menuDropdown');


$($mobileBtn).click(function() {
	// Check if target has open class
	if(  $($mobileMenu).hasClass('mobile-overlay-closed') ) {
		TweenMax.to($mobileMenu, 1, {top: '0'});

		$($mobileMenu).removeClass('mobile-overlay-closed');

		$($mobileBtn).toggleClass("is-active");

	} else if ( !$($mobileMenu).hasClass('mobile-overlay-closed') ) {
		TweenMax.to($mobileMenu, 1, {top: '-200%'});

		$($mobileMenu).addClass('mobile-overlay-closed');
		
		$($mobileBtn).toggleClass("is-active");
	}
});



const menuController = new ScrollMagic.Controller();
// Downsize menu on scroll
function menuSmall(elem, trigger) {

  let scene = new ScrollMagic.Scene({
      triggerElement: item,
      offset: 0
    })
    .setTween(TweenMax.to(elem, .2, {css: {opacity: '1'}}))
    .addTo(menuController);
}

const primaryMenu = document.querySelector('.navbar');
const addMenu = document.querySelector('#addMenu');
const heroText = document.querySelector('.hero-text');

} );
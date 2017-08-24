jQuery( document ).ready( function( $ ) {

"use strict";

// Helper function to check homepage
function checkHome() {
  if( document.body.classList.contains('home')) {
  	return true;
  }
}

// animate on load after delay
function animLoad(list) {
	for(let i = 0; i < list.length; i++) {
		let item = list[i];

		var tl = new TimelineMax();
			tl.set(item, {css: {opacity: '0', top: '80%'}})
			tl.to(item, 1, {
				css: {
					opacity: '1',
					top: '50%',
					visibility: 'visible'
				}
			}, '.5')
	}
}
const heroText = document.querySelectorAll('.header-text');
animLoad(heroText);

function socialSlide(list) {
	for(let i = 0; i < list.length; i++) {
		let item = list[i];
		

		if(item.classList.contains('tickerLive') === true ) {
			var tl = new TimelineMax();
			tl.set(item, {css: {opacity: '0', bottom: '0px'}})
			tl.to(item, 1, {
				css: {
					opacity: '1',
					bottom: '80px',
					visibility: 'visible'
				}
			}, '.5')
		} else {
			var tl = new TimelineMax();
			tl.set(item, {css: {opacity: '0', bottom: '0px'}})
			tl.to(item, 1, {
				css: {
					opacity: '1',
					bottom: '20px',
					visibility: 'visible'
				}
			}, '.5')
		}
	}
}
const socialCorner = document.querySelectorAll('#socialCorner');
socialSlide(socialCorner);

// Hover State of the vertical boxes
function classOnHover(list) {
	for(let i = 0; i < list.length; i++) {
		let item = list[i];
		let color = item.querySelector('div.overlay');
		let content = item.querySelector('div.content');
		
		content.addEventListener('mouseenter', function(event) {
			TweenMax.to(color, '.4', {css: {opacity: '1'}});
		});
		content.addEventListener('mouseleave', function(event) {
			TweenMax.to(color, '.4', {css: {opacity: '.8'}});
		});
	}
}

const vertBoxes = document.querySelectorAll('div.split-vertical');
classOnHover(vertBoxes);

// Ticker Tape hider
function hideTicker() {
	const social = document.getElementById('socialCorner');

	if(social.classList.contains('tickerLive') === true) {
		let ticker = document.getElementById('tickerHide');
		let tape = document.getElementById('tickerTape');
		ticker.addEventListener('click', (e) => {
			TweenMax.to(tape, '.4', {css: {opacity: '0'}});

			var timeline = new TimelineMax();
			timeline.to(social, '.4', {bottom: '20px'});
			timeline.to(tape, 0, {css: {display: 'none'}});
		});
	}
}
hideTicker();

// Responsize menu

const menu = document.querySelector('.primary-menu');
const navbar = document.querySelector('.navbar');

function responsiveMenu() {
	var more = navbar.querySelector('li.menuDropCtrl');
	more.innerHTML = 'More <i class="fa fa-chevron-down" aria-hidden="true"></i>'

	const addMenu = document.querySelector('#addMenu');
	menu.addEventListener('mouseover', (e) => {
		if(addMenu.getAttribute('data-state') === 'closed') {
			TweenMax.to(addMenu, 0, {css: {opacity: '0'}});
			TweenMax.to(addMenu, 0, {css: {display: 'block'}});
			TweenMax.to(addMenu, '.4', {css: {opacity: '1'}});
			addMenu.setAttribute('data-state', 'open');
		}
	});
	addMenu.addEventListener('mouseleave', (e) => {
		if(addMenu.getAttribute('data-state') === 'open') {
			TweenMax.to(addMenu, '.4', {css: {opacity: '0'}});
			TweenMax.to(addMenu, '.2', {css: {display: 'none'}});
			addMenu.setAttribute('data-state', 'closed');
		}
	});
}

responsiveMenu();

const videoModules = document.querySelectorAll('.video-module');
function stripIframe(list) {
	for(var i = 0; i < list.length; i++) {
		let item = list[i];
		var video = item.querySelector('iframe');
			video.removeAttribute("width");
			video.removeAttribute("height");
	}
}

stripIframe(videoModules);


// Fix WP Caption width
$('.wp-caption').removeAttr('style');

function formControl() {
	var time = 3000;
	if( popUp.getAttribute('data-control') === 'active') {
		setTimeout(function(time){
			var tl = new TimelineMax();
				tl.to(popUp, 0, {
					css: {
						opacity: '0',
						display: 'block'
					}
				})
				tl.to(popUp, '.2', {
					css: {
						opacity: '1'
					}
				})
		}, time);
	}
}

function formClose() {
	var button = popUp.querySelector('#formClose');
	button.addEventListener('click', function(e) {
		var tl = new TimelineMax();
				tl.to(popUp, '.2', {
					css: {
						opacity: '0',
						display: 'none'
					}
				})
		this.classList.remove('is-active');
	});
}

// Set session
function cachedForm() {
	var test = sessionStorage.getItem('firstVisit');
	 if (test == null) {
	      if(checkHome() === true) {
	      	const popUp = document.getElementById('#popUp');
		formControl();
		formClose();
	      }
	      sessionStorage.setItem('firstVisit', '1');
	    }
}
cachedForm();

// Smooth scrolling behavior for video link
function smoothScroll() {
  if(checkHome() === true) {
  	var videoLink = document.querySelector('.video-link > a');
  	if(!videoLink === null || !videoLink === undefined) {
  		var anchor = document.querySelector('#home-page-video');
  		var posTop = anchor.offsetTop + 300;
	  	videoLink.addEventListener('click', function(event) {
	  		TweenMax.to(window, '.5', {scrollTo: posTop});
  		});
  	}
  }
}
smoothScroll();

// Fade In Controls

const controllerViews = new ScrollMagic.Controller();

const targets = document.querySelectorAll('.anim-push');
function fadeIn(list) {
	for(var i = 0; i < list.length; i++) {
		let item = list[i];
		var elem = item.querySelector('.anim-target');
		TweenMax.to(elem, 0, {css: {opacity: '0'}});

		var scene = new ScrollMagic.Scene({
			triggerElement: item
		})
		.setTween(TweenMax.to(elem, '.3', {css: {opacity: '1'}}))
		.addTo(controllerViews);

		scene.reverse(false);
	}
}
fadeIn(targets);

// Bottom of wrapper function
});
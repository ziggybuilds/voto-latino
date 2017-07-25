jQuery( document ).ready( function( $ ) {

"use strict";

// Hover State of the vertical boxes
function classOnHover(list) {
	list.forEach( function(item) {
		let color = item.querySelector('div.overlay');
		let content = item.querySelector('div.content');
		
		content.addEventListener('mouseenter', function(event) {
			TweenMax.to(color, .4, {css: {opacity: '.9'}});
		});
		content.addEventListener('mouseleave', function(event) {
			TweenMax.to(color, .4, {css: {opacity: '.6'}});
		});
	});
}

const vertBoxes = document.querySelectorAll('div.split-vertical');
classOnHover(vertBoxes);

// Ticker Tape hider
function hideTicker() {
	const ticker = document.getElementById('tickerHide');
	const tape = document.getElementById('tickerTape');
	const social = document.getElementById('socialCorner');
	ticker.addEventListener('click', (e) => {
		TweenMax.to(tape, .4, {css: {opacity: '0'}});

		let timeline = new TimelineMax();
		timeline.to(social, .4, {bottom: '20px'});
		timeline.to(tape, 0, {css: {display: 'none'}});
	});
}
hideTicker();

// Responsize menu

const menu = document.querySelector('.primary-menu');
const navbar = document.querySelector('.navbar');

function responsiveMenu() {
	let more = navbar.querySelector('li.menuDropCtrl');
	more.innerHTML = 'More <i class="fa fa-chevron-down" aria-hidden="true"></i>'

	const addMenu = document.querySelector('#addMenu');
	menu.addEventListener('mouseover', (e) => {
		if(addMenu.getAttribute('data-state') === 'closed') {
			TweenMax.to(addMenu, 0, {css: {opacity: '0'}});
			TweenMax.to(addMenu, 0, {css: {display: 'block'}});
			TweenMax.to(addMenu, .4, {css: {opacity: '1'}});
			addMenu.setAttribute('data-state', 'open');
		}
	});
	addMenu.addEventListener('mouseleave', (e) => {
		if(addMenu.getAttribute('data-state') === 'open') {
			TweenMax.to(addMenu, .4, {css: {opacity: '0'}});
			TweenMax.to(addMenu, .2, {css: {display: 'none'}});
			addMenu.setAttribute('data-state', 'closed');
		}
	});
}

responsiveMenu();

const videoModules = document.querySelectorAll('.video-module');
function stripIframe(list) {
	list.forEach(function(item) {
		let video = item.querySelector('iframe');
			video.removeAttribute("width");
			video.removeAttribute("height");
	});
}

stripIframe(videoModules);


window.addEventListener('resize', function() {

});

// Fix WP Caption width
$('.wp-caption').removeAttr('style');

});
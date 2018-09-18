jQuery(document).ready(($) => {
	// feed__articles__article
	(function() {
		const $articles = $('.feed__articles__article');
		for (let i = 0; i < $articles.length; i += 1) {
			scrollReveal($articles[i]);
		}
	})();

	// Fullpage.js Init
	$('#fullpage').fullpage({
		//options here
		autoScrolling: true,
		licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
	});

	//methods
	$.fn.fullpage.setAllowScrolling(true);

	// continue scroll actions
	function moveDownHandleClick(array) {
		for (let i = 0; i < array.length; i += 1) {
			$(array[i]).on('click', (e) => {
				e.preventDefault();
				fullpage_api.moveSectionDown();
			});
		}
	}

	const $continueLinks = $('.instruction__bottomBar__nav__content__link');
	moveDownHandleClick($continueLinks);

	const $svgBtn = $('.svg-btn-down');
	$svgBtn.on('click', (e) => {
		e.preventDefault();
		fullpage_api.moveSectionDown();
	});

	// button control
	// grabs data-url on each button and uses it to assign new window.location
	function handleButtonClick(elem) {
		const $btn = $(elem);
		$($btn).on('click', (e) => {
			e.preventDefault();
			const url = $btn.attr('data-url');
			window.location.assign(url);
		});
	}

	// iterate through the main buttons on the page
	const $activeBtns = $('.button--danger');
	$activeBtns.each(function () {
		handleButtonClick(this);
	});

	// control animation for banner
	const $banner = $('.banner__innerWrapper');
	const $hero = $('.hero');
	const $intro = $('.intro');
	const controllerBanner = new ScrollMagic.Controller();

	function bannerReveal() {
		const tl = new TimelineMax()
			.set($banner, { y: 30 })
			.to($banner, 0.1, { css: { opacity: '1'} })
			.to($banner, 0.1, { y: 0 }, '-=0.1');

		new ScrollMagic.Scene({
			triggerElement: '.intro',
			offset: 200,
			triggerHook: 'onCenter',
			reverse: true,
		})
			.setTween(tl)
			.addTo(controllerBanner);

		const tlFooter = new TimelineMax()
			.to($banner, 0.1, { css: { opacity: '0'} })
			.to($banner, 0.1, { x: -15 });

		new ScrollMagic.Scene({
			triggerElement: '.footer',
			offset: 200,
			triggerHook: 'onEnter',
			reverse: true,
		})
			.setTween(tlFooter)
			.addTo(controllerBanner);
	}
	bannerReveal();

	// animation controls
	const controller = new ScrollMagic.Controller();
	function scrollReveal(elem) {
		const tl = new TimelineMax()
			.set(elem, { y: 30 })
			.set(elem, { css: { opacity: '0' } })
			.to(elem, 0.5, { css: { opacity: '1' } })
			.to(elem, 0.5, { y: 0 }, '-=0.4');
		new ScrollMagic.Scene({
			triggerElement: elem,
			offset: '-50px',
			reverse: false,
		})
		.setTween(tl)
		.addTo(controller);
	}

	// button actions for organizer mode
	const $modeBtn = $('#modeBtn');

	if ($modeBtn) {
		$modeBtn.on('click', (e) => {
			e.preventDefault();
			const url = $modeBtn.attr('data-href');
			window.location = url;
		});
	}

	
	const $phoneFrames = $('.instruction__innerWrapper__image');
	for (let i = 0; i <= $phoneFrames.length; i += 1) {
		scrollReveal($phoneFrames[i]);
	}
	
});

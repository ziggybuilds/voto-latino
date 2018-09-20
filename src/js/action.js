jQuery(document).ready(($) => {
	// Fullpage.js Init
	$('#fullpage').fullpage({
		// options here
		autoScrolling: true,
		licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
	});

	// methods
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
	const $activeBtns = $('.button--url');
	$activeBtns.each(function () {
		handleButtonClick(this);
	});

	// sign up pop up controls
	function handlePopUp() {
		const $signUpBtn = $('.button--signUp');
		const $popUp = $('#signUp');
		const $closePopUpBtn = $('#signUpCloser');

		if ($signUpBtn) {
			$signUpBtn.on('click', (e) => {
				e.preventDefault();
				const openTl = new TimelineMax()
					.set($popUp, { css: { opacity: '0' } })
					.to($popUp, 0, { css: { display: 'block' } })
					.to($popUp, 1, { css: { opacity: '1' } });

				$popUp.addClass('active');
			});
		}

		if ($closePopUpBtn) {
			$closePopUpBtn.on('click', (e) => {
				e.preventDefault();
				if ($popUp.hasClass('active')) {
					const closeTl = new TimelineMax()
						.to($popUp, 1, { css: { opacity: '1' } })
						.to($popUp, 0, { css: { display: 'none' } });

					$popUp.removeClass('active');
				}
			});
		}
	}
	handlePopUp();

	// control animation for banner
	const $banner = $('.banner__innerWrapper');
	const controllerBanner = new ScrollMagic.Controller();

	function bannerReveal() {
		const tl = new TimelineMax()
			.set($banner, { y: 30 })
			.to($banner, 0.1, { css: { opacity: '1' } })
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
			.to($banner, 0.1, { css: { opacity: '0' } })
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
			.set(elem, { y: 15 })
			.set(elem, { css: { opacity: '0' } })
			.to(elem, 0.5, { css: { opacity: '1' } }, '0.1')
			.to(elem, 0.5, { y: 0 }, '-=0.5');
		new ScrollMagic.Scene({
			triggerElement: elem,
			offset: '-50px',
			reverse: false,
		})
			.setTween(tl)
			.addTo(controller);
	}

	const $phoneFrames = $('.instruction__innerWrapper__image svg');
	for (let i = 0; i < $phoneFrames.length; i += 1) {
		scrollReveal($phoneFrames[i]);
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

	const textController = new ScrollMagic.Controller();
	function scrollFadeIn(elem) {
		const tl = new TimelineMax()
			.set(elem, { x: 10 })
			.set(elem, { css: { opacity: '0' } })
			.to(elem, 0.5, { css: { opacity: '1' } }, '0.1')
			.to(elem, 0.5, { x: 0 }, '-=0.5');
		new ScrollMagic.Scene({
			triggerElement: elem,
			offset: '-50px',
			reverse: false,
		})
			.setTween(tl)
			.addTo(textController);
	}

	const $textContent = $('.instruction__innerWrapper__text__content');
	for (let i = 0; i < $textContent.length; i += 1) {
		scrollFadeIn($textContent[i]);
	}

	// false ajax loader svg animation
	function ajaxOnComplete() {
		const $loaderContainer = $('.falseAjax');
		const $ajaxLoader = $('#ajaxLoader');
		const ajaxTl = new TimelineMax()
			.to($ajaxLoader, 1, { scale: 2 })
			.to($ajaxLoader, 1, { css: { opacity: '0' } }, '-=0.6')
			.to($loaderContainer, 0.5, { css: { opacity: '0' } })
			.to($loaderContainer, 0, { css: { display: 'none' } });
	}

	const myVivus = new Vivus('ajaxLoader', {
		type: 'sync',
		duration: 200,
		animTimingFunction: Vivus.EASE_IN,
	}, ajaxOnComplete);
});

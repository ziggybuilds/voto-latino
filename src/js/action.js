jQuery(document).ready(($) => {
	// pop up functionality
	if ($('.popUp')) {
		const $popUp = $('.popUp');
		$popUp.hide();

		$('#popUpTrigger').on('click', () => {
			if ($popUp.is(":visible") === false) {
				$popUp.fadeIn('fast');
				console.log($popUp.is(":visible"));
			}
		});

		$('#popUpClose').on('click', (e) => {
			e.preventDefault();
			console.log($popUp.is(":visible"));
			if ($popUp.is(":visible") === true) {
				console.log($popUp.is(":visible"));
				$popUp.fadeOut('fast');
			}
		});
	}
});

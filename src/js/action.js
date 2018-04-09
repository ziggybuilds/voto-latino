jQuery(document).ready(($) => {
	let map;
	let geocoder;
	let markers = [];
	let markerCluster;
	function initMap() {
		geocoder = new google.maps.Geocoder();
		const latlng = new google.maps.LatLng('39.8283', '-98.5795');
		const mapSetup = {
			zoom: 4,
			center: latlng,
		};
		map = new google.maps.Map(document.getElementById('map'), mapSetup);
	}

	function renderMarker(location, title, desc, link) {
		const linkContent = link > 0 ? `<a href="${link}">Learn More</a>` : '';
		const contentString = `<div><h3>${title}</h3><p>${desc}</p>${linkContent}</div>`;

		const infowindow = new google.maps.InfoWindow({
			content: contentString,
		});

		const marker = new google.maps.Marker({
			map,
			position: location,
			icon: iconMarker,
		});

		marker.addListener('click', () => {
			infowindow.open(map, marker);
		});

		markers.push(marker.position);
		markerCluster.addMarker(marker);
	}

	function codeAddress(address, title, desc, link) {
		const add = address;
		geocoder.geocode({ address: add }, (results, status) => {
			if (status === 'OK') {
				// console.log('location:' + results[0].geometry.location);
				renderMarker(results[0].geometry.location, title, desc, link);
			} else {
				console.log(`Geocode was not successful for the following reason: ${status}`);
			}
		});
	}

	let iconMarker;
	let markerClusterImage;
	function mapOptions() {
		// postdata exposed via functions.php
		const pageID = postdata.post_id;
		const baseURI = `${postdata.rest_url}pages/${pageID}`;

		$.get({
			url: baseURI,
		})
			.then((resp) => {
				iconMarker = resp.acf.marker_image;
				markerClusterImage = resp.acf.marker_cluster[0].url.slice(0, -5);
				resp.acf.map_events.map((event) => {
					const title = event.title !== undefined ? event.title : '';
					const desc = event.description !== undefined ? event.description : '';
					const address = event.event.address;
					let link;
					if (event.read_more[0] != undefined) {
						if (event.read_more[0].acf_fc_layout === 'internal_link') {
							link = event.read_more[0].post.guid;
						} else if (event.read_more[0].acf_fc_layout === 'external_link') {
							link = event.read_more[0].link;
						} else {
							link = '';
						}
					}
					codeAddress(address, title, desc, link);
				});
				// call the render cluster after the promise to ensure the image path is correct
				renderCluster();
			})
			.fail((error) => {
				console.log(error);
			});
	}

	function renderCluster() {
		console.log(markers);
		markerCluster = new MarkerClusterer(map, markers, {imagePath: markerClusterImage});
	}

	if (document.getElementById('map')) {
		initMap();
		mapOptions();
	}

	// animation controls
	const tl = new TimelineMax();
	tl.set($('.header-menu'), {y: '-200px'})
		.set($('.header-wrapper'), {css: {'opacity': '0'}})
		.to($('.header-menu'), 2, {y: 0})
		.to($('.header-wrapper'), 1, {css: {'opacity': '1'}}, '-=1');


	function scrollReveal(elem) {
		TweenMax.to(elem, 0, {css: {'opacity': '0'}});
		const controller = new ScrollMagic.Controller();
		new ScrollMagic.Scene({
			triggerElement: elem,
			offset: '-50px',
		})
		.setTween(elem, 1, {css: {'opacity': '1'}})
		.addTo(controller);
	}

	const titles = $('.title');
	for (let i = 0; i < titles.length; i += 1) {
		scrollReveal(titles[i]);
	}
});

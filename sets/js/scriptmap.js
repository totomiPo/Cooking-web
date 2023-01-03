function init() {
	let map = new ymaps.Map('map', {
		center: [59.8649374712713,30.318793033581017],
		zoom: 17
	});

	let placemark = new ymaps.Placemark([59.8649374712713,30.318793033581017], {
		balloonContent: `
			<div class="balloon">
				<div class="balloon_name">Булочная №14</div>
				<div class="balloon_content">Только тут вы сможете попробовать
				 все рецепты с нашего сайта!</div>
				<div class="balloon__contacts">
					<a href="tel:+71234567890">+71234567890</a>
				</div>
			</div>
		`
	}, {
		iconLayout: 'default#image',
		iconImageSize: [40, 40],
		iconImageOffset: [17, 17]
	});

  map.controls.remove('geolocationControl'); // удаляем геолокацию
  map.controls.remove('searchControl'); // удаляем поиск
  map.controls.remove('trafficControl'); // удаляем контроль трафика
  map.behaviors.disable(['scrollZoom']); // отключаем скролл карты

  map.geoObjects.add(placemark);
}

ymaps.ready(init);

function init() {
	let map = new ymaps.Map('map', {
		center: [59.8649374712713,30.318793033581017],
		zoom: 17
	});

  map.controls.remove('geolocationControl'); // удаляем геолокацию
  map.controls.remove('searchControl'); // удаляем поиск
  map.controls.remove('trafficControl'); // удаляем контроль трафика
  map.behaviors.disable(['scrollZoom']); // отключаем скролл карты
}

ymaps.ready(init);

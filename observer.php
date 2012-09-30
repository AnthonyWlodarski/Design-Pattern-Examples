<?php
/**
 * Anthony Wlodarski
 * ant92083@gmail.com
 **/

/**
 * A class to demonstrate the observer pattern
 */
class Event {
	protected static $callbacks = array();

	public static function registerCallback($eventName, $callback) {
		if(!is_callable($callback)) {
			throw new Exception('Invalid callback');
		}

		$eventName = strtolower($eventName);
		self::$callbacks[$eventName][] = $callback;
	}

	public static function trigger($eventName, $data = null) {
		$eventName = strtolower($eventName);

		if(isset(self::$callbacks[$eventName])) {
			foreach(self::$callbacks[$eventName] as $callback) {
				$callback($data);
			}
		}
	}
}

Event::registerCallback('Hadean', function($data) {
	echo 'Entering the hadean era.' . PHP_EOL;
	Event::trigger('createEarth');
	Event::trigger('formMoon');
	Event::trigger('firstLife');
	Event::trigger('Archean');
});

Event::registerCallback('Archean', function($data) {
	echo 'Entering the Archean era' . PHP_EOL;
	Event::trigger('photosynthesis');
	Event::trigger('Proterozoic');
});

Event::registerCallback('Proterozoic', function($data) {
	echo 'Entering the Proterozoic era' . PHP_EOL;
	Event::trigger('snowballEarth');
	Event::trigger('eukaryotesForm');
	Event::trigger('multicelledLife');
	Event::trigger('animals');
	Event::trigger('twoSnowballEarths');
	Event::trigger('Paleozoic');
});

Event::registerCallback('Paleozoic', function($data) {
	echo 'Entering the Paleozoic era, time: 542 million B.C' . PHP_EOL;
	Event::trigger('cambrianExplosion');
	Event::trigger('firstLandAnimals');
	Event::trigger('Mesozoic');
});

Event::registerCallback('Mesozoic', function($data) {
	echo 'Entering the Mesozoic era, time: 251 million B.C.' . PHP_EOL;
	Event::trigger('mammals');
	Event::trigger('dinosaurs');
	Event::trigger('dinosaursDie');
	Event::trigger('Cenozoic');
});

Event::registerCallback('Cenozoic', function($data) {
	echo 'Entering the Cenozoic era, time: 65 million B.C' . PHP_EOL;
	Event::trigger('hominids');
	Event::trigger('today');
});

Event::registerCallback('createEarth', function($data) {
	echo 'The earth has formed, time: 4.550 billion B.C.' . PHP_EOL;
});

Event::registerCallback('formMoon', function($data) {
	echo 'The moon has formed, time: 4.427 billion B.C.' . PHP_EOL;
});

Event::registerCallback('firstLife', function($data) {
	echo 'The unverse has decided to stop face smashing with rock.' . PHP_EOL;
	echo 'First life a.k.a. prokaryotes have formed, time: 4.000 billion B.C.' . PHP_EOL;
});

Event::registerCallback('photosynthesis', function($data) {
	echo 'Photosynthesis has started, time: 3.500 billion B.C'. PHP_EOL;
});

Event::registerCallback('snowballEarth', function($data) {
	echo 'The earth\'s atmosphere has become oxygen rich, time: 2.300 billion B.C.' . PHP_EOL;
});

Event::registerCallback('eukaryotesForm', function($data) {
	echo 'Eukaryotes have arrived!' . PHP_EOL;
});

Event::registerCallback('multicelledLife', function($data) {
	echo 'Things are getting interesting, multicellular life is in the hizzy!' . PHP_EOL;
});

Event::registerCallback('animals', function($data) {
	echo 'Primitive animals are here!' . PHP_EOL;
});

Event::registerCallback('twoSnowballEArths', function($data) {
	echo 'There are now two snowball earths, time: 750-650 million B.C.' . PHP_EOL;
});

Event::registerCallback('cambrianExplosion', function($data) {
	echo 'Cambrian explosion, time: 530 million B.C.' . PHP_EOL;
});

Event::registerCallback('firstLandAnimals', function($data) {
	echo 'Backbones for the win, first vertebrate land animals, time: 380 million B.C.' . PHP_EOL;
});

Event::registerCallback('mammals', function($data) {
	echo 'Mammals have arrived!' . PHP_EOL;
});

Event::registerCallback('dinosaurs', function($data) {
	echo 'Dinosaurs have arrived, time: 230 million B.C.' . PHP_EOL;
});

Event::registerCallback('dinosaursDie', function($data) {
	echo 'Dinosaurs have left the building, time: 65 million B.C.' . PHP_EOL;
});

Event::registerCallback('hominids', function($data) {
	echo 'Hominids have arrived, sorry dinosaurs, time: 2 million B.C.' . PHP_EOL;
});

Event::registerCallback('today', function($data) {
	echo 'Hey it\'s '.date('Y-m-d').' thanks for playing!'.PHP_EOL;
});

Event::trigger('Hadean');

?>
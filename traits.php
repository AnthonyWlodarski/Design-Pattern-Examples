<?php

/**
 * Anthony Wlodarski
 * ant92083@gmail.com
 */

trait Hamburger {
    // a single instance container
    private static $instance = null;

    public static function getInstance() {
        // a little dynamic work going on here
        $class = __CLASS__;

        if(!(self::$instance instanceOf __CLASS__)) {
            self::$instance = new $class();
        }

        return self::$instance;
    }
}

class CheeseBurger {
    // use syntax
    use Hamburger;

    private function __construct() {

    }

    public function identify() {
        echo 'I am a cheese burger.' . PHP_EOL;
    }
}

class BaconCheeseBurger extends CheeseBurger {
    public function identify() {
        echo 'I am a cheese burger with bacon!';
    }
}

class PizzaBurger {
    use Hamburger;

    private function __construct() {

    }

    public function identify() {
        echo 'I am a pizza burger.';
    }
}
?>
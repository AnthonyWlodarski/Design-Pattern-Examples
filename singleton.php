<?php

/**
 * Anthony Wlodarski
 * ant92083@gmail.com
 **/

/**
 *
 */
class HotDog {
    public $name = 'Oscar';
    /**
     * @var null
     */
    private static $instance = null;

    /**
     *
     */
    private function __construct() {

    }

    /**
     * @static
     * @return null|HotDog
     */
    public static function getInstance() {
        if(!(self::$instance instanceOf HotDog)) {
            self::$instance = new HotDog();
        }

        return self::$instance;
    }
}

$hotDog = HotDog::getInstance();
echo $hotDog->name . 'PHP_EOL';

?>
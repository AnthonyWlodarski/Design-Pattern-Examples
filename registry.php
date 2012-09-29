<?php
/**
* Anthony Wlodarski
* ant92083@gmail.com
*/

class Registry {
    private static $collection = array();

    /**
     * Add an item to the collection.
     * @static
     * @param $object
     * @param null $name
     * @throws Exception
     */
    public static function add($object, $name = null) {
        if(empty($name)) {
            throw new Exception('You must pass in a name to store an item in the registry.');
        }

        self::$collection[$name] = $object;
    }

    /**
     * Return null or the object if it exists in the registry.
     * @static
     * @param $name
     * @return null|mixed
     */
    public static function get($name) {
        if(!self::$collection[$name]) {
            return null;
        } else {
            return self::$collection[$name];
        }
    }

    /**
     * Check to see if an item exists in the
     * registry
     * @static
     * @param $name
     * @return bool
     */
    public static function contains($name) {
        if(isset(self::$collection[$name])) {
            return true;
        }

        return false;
    }

    /**
     * Removes a item from the registry
     * @static
     * @param $name
     */
    public static function remove($name) {
        if(self::contains($name)) {
            unset(self::$collection[$name]);
        }
    }
}
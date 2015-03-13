<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 22:18
 * To change this template use File | Settings | File Templates.
 */
class MWD_System_ClassManager
{
    private static $_classes = array();

    public static function get($className) {
        return isset(self::$_classes[$className]) ? self::$_classes[$className] : $className;
    }

    public static function set($oldClass, $newClass) {
        self::$_classes[$oldClass] = $newClass;
    }

    public static function getStaticInstance() {
        $args = func_get_args();

        $className = array_shift($args);
        $methodName = array_shift($args);

        return call_user_func_array($className."::".$methodName, $args);
    }

    public static function getInstance() {
        $args = func_get_args();

        $className = array_shift($args);

        if(empty($args)) {
            return new $className();
        }

        $refClass = new ReflectionClass($className);

        return $refClass->newInstanceArgs($args);
    }
}

<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 22:56
 * To change this template use File | Settings | File Templates.
 */
class MWD_Singleton
{
    // holds current single instance
    protected static $instances = array();

    // reference to doctrine object
    protected static $db = false;

    // reference to configuration object
    protected static $config = false;

    /*
     * _construct to initialize
     */
    final public function __construct() {


        if(class_exists('MWD_Registry', false) && TecBase_System_ClassManager::getStaticInstance('MWD_Registry' , 'isRegistered', 'db')) {
            self::$db = MWD_System_ClassManager::getStaticInstance('MWD_Registry' , 'get', 'db');
        }

        if(class_exists('MWD_Registry', false) && TecBase_System_ClassManager::getStaticInstance('MWD_Registry' , 'isRegistered', 'config')) {
            self::$config =  MWD_System_ClassManager::getStaticInstance('MWD_Registry' , 'get', 'config');
        }

        $this->_init();
    }

    public static function getClassName() {
        return get_called_class();
    }

    /**
     * will return the instance of current instanciated class
     */
    final public static function getInstance() {

        $className = self::getClassName();

        if(isset(self::$instances[$className])) {
            return self::$instances[$className];
        }

        self::$instances[$className] = new $className();

        return self::$instances[$className];
    }

    /*
     * _init will be overwritten by his children
     */
    protected function _init() {
        // ....
    }
}

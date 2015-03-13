<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 22:33
 * To change this template use File | Settings | File Templates.
 */
class MWD_Config extends Zend_Config_Ini
{
    protected static $instance = false;


    public static function createInstance($self) {
        self::$instance = $self;
    }

    public static function getInstance() {
        if(!self::$instance) {
            $class = get_called_class();
            die('Please create an Instance of '.$class.' before you can use singleton');
        }

        return self::$instance;
    }

    public function getValue($name, $default = null) {
        //return self::_getValueRecursive($name, $default, $this->_data->{APPLICATION_ENV});

        $data = $this->_data[APPLICATION_ENV];

        $configAr = explode(".",$name);

        $value = self::_searchValue($configAr, $data);

        if($value == false && !is_null($default)) {
            return $default;
        }

        return $value;
    }

    private static function _searchValue(&$search, $config ) {

        $currentKey = array_shift($search);

        if(is_object($config)) {
            $config = $config->toArray();
        }

        if (!is_array($config)) {
            return $config;
        }

        if (!isset($config[$currentKey])) {
            return false;
        }

        if (!is_array($config[$currentKey])) {
            return $config[$currentKey];
        }

        if (empty($search)) {
            return $config[$currentKey];
        }

        return self::_searchValue($search, $config[$currentKey]);
    }
}

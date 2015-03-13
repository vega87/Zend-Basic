<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 22:52
 * To change this template use File | Settings | File Templates.
 */
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
defined('PUBLIC_PATH') || define('PUBLIC_PATH', realpath(dirname(__FILE__) . '/'));
defined('MWD_PATH') || define('MWD_PATH', realpath(dirname(__FILE__) . '/../library/MWD/'));
defined('LIBRARY_PATH') || define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/../library/'));
defined('DS') || define('DS', DIRECTORY_SEPARATOR);

require_once(MWD_PATH . DS . 'Singleton.php');

require_once(MWD_PATH . DS . 'System' . DS . 'ClassManager.php');
require_once(MWD_PATH . DS . 'Doctrine' . DS . 'DoctrineLoader.php');
require_once(MWD_PATH . DS . 'MWD.php');

require_once(MWD_PATH . DS . "System" . DS . "Startup.php");


// initialize tecbase system environment
MWD_System_Startup::getInstance()->init();

// run tecbase, zend framework, doctrine 2, etc.
if(PHP_SAPI !== 'cli'){
    MWD_System_Startup::getInstance()->run();
}

?>
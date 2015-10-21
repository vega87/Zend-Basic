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
defined('MSF_PATH') || define('MSF_PATH', realpath(dirname(__FILE__) . '/../library/MSF/'));
defined('LIBRARY_PATH') || define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/../library/'));
defined('DS') || define('DS', DIRECTORY_SEPARATOR);

require_once(MSF_PATH . DS . 'Singleton.php');

require_once(MSF_PATH . DS . 'System' . DS . 'ClassManager.php');
require_once(MSF_PATH . DS . 'Doctrine' . DS . 'DoctrineLoader.php');
require_once(MSF_PATH . DS . 'MSF.php');

require_once(MSF_PATH . DS . "System" . DS . "Startup.php");


// initialize tecbase system environment
MSF_System_Startup::getInstance()->init();

// run tecbase, zend framework, doctrine 2, etc.
if(PHP_SAPI !== 'cli'){
    MSF_System_Startup::getInstance()->run();
}

?>
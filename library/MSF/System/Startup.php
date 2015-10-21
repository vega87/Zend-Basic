<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 22:58
 * To change this template use File | Settings | File Templates.
 */
class MSF_System_Startup extends MSF_Singleton
{
    private static $_systemConfig = array();

    public static function init() {
        // execute smarty hotfix
        self::doSmartyHotfix();

        // set include paths for zend
        self::setupIncludePath();

        // load zend framework
        self::initZendFramework();

        require_once(MSF_PATH.DS.'Config.php');

        // load app configuration
        self::loadAppConfiguration();

        // init merged configuration
        self::initConfiguration();
    }

    public static function run() {
        MSF_System_ClassManager::getStaticInstance('MSF', 'getInstance')->getApplication()->bootstrap()->run();
    }

    protected static function loadAppConfiguration() {
        $configPath = APPLICATION_PATH . DS . 'configs'. DS . 'application.ini';

        if (file_exists($configPath)) {
            $supplementalConfig = MSF_System_ClassManager::getInstance('MSF_Config', $configPath);

            self::$_systemConfig = $supplementalConfig;
        } else {
            die("Could not find app configuration: ".$configPath);
        }
    }


    /**
     * dispatch merged configuration to zend
     * Attention! after setting options to application the application bootstrapper will be called
     */
    protected static function initConfiguration() {
        MSF_System_ClassManager::getStaticInstance('MSF_Config', 'createInstance', self::$_systemConfig);
        MSF_System_ClassManager::getInstance('MSF', 'getInstance')->getApplication()->setOptions(self::$_systemConfig->{APPLICATION_ENV}->toArray());
    }

    /*
     * Initialising Zend Framework
     */
    protected static function initZendFramework() {
        /** Zend_Application */
        require_once 'Zend/Application.php';

        // Create application, bootstrap, and run
        $application = MSF_System_ClassManager::getInstance('Zend_Application',
            APPLICATION_ENV
        );

        MSF_System_ClassManager::getStaticInstance('MSF', 'getInstance')->setApplication($application);
    }

    /**
     * Smarty Hotfix
     *
     * On first smarty action on new or modified template causes an autoloaded error
     * after disabling autoloader the issue would be fixed
     */
    protected static function doSmartyHotfix() {
        define('SMARTY_SPL_AUTOLOAD', 0);
    }

    /**
     * set up the tecbase and zend include path
     */
    protected static function setupIncludePath() {
        // Ensure library/ is on include_path
        set_include_path(implode(PATH_SEPARATOR, array(
            realpath(APPLICATION_PATH . DS . '..' . DS . 'library' . DS),
            get_include_path()
        )));
    }
}
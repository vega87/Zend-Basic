<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 22:55
 * To change this template use File | Settings | File Templates.
 */
class MSF extends MSF_Singleton
{
    // holds instance of zend application
    protected static $application = false;

    /*
     * set the application to TecBase
     */
    public function setApplication(Zend_Application $obj) {
        self::$application = $obj;
    }

    /**
     * get the current application
     */
    public function getApplication() {
        return self::$application;
    }

}
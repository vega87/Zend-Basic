<?php
require_once(APPLICATION_PATH."/../library/Smarty/SmartyView.php");

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    /**
     * generate registry
     * @return Zend_Registry
     */
    protected function _initRegistry(){
        $registry = Zend_Registry::getInstance();
        return $registry;
    }

    /**
     * Bootstrap autoloader for application resources
     *
     * @return Zend_Application_Module_Autoloader
     */
    protected function _initAutoload(){
        Zend_Loader_Autoloader::getInstance()->registerNamespace('MWD_');
        MWD_Doctrine_DoctrineLoader::init();
    }

    /**
     * Bootstrap Smarty view
     * @return Smarty_View
     */
    protected function _initView()
    {
        // initialize smarty view
        $config = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH.'/configs/application.ini');
        Zend_Registry::set('config', $config);
        $view = new Smarty_View($this->getOption('smarty'));

        // setup viewRenderer with suffix and view
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setViewSuffix('tpl');
        $viewRenderer->setView($view);

        // ensure we have layout bootstraped
        $this->bootstrap('layout');

        // set the tpl suffix to layout also
        $layout = Zend_Layout::getMvcInstance();
        $layout->setViewSuffix('tpl');

        $view->addHelperPath('MWD/View/Helper', 'MWD_View_Helper');

        return $view;
    }
}

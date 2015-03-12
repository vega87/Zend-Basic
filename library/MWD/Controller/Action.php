<?php
/**
 * Created by PhpStorm.
 * User: MWD
 * Date: 11.03.15
 * Time: 17:17
 */

abstract class MWD_Controller_Action extends Zend_Controller_Action {

    public function init(){
        $this->preInit();
        $this->view->error = "";
        /* Initialize action controller here */

        /* Initialize action controller here */
        $registry = Zend_Registry::getInstance();
        $this->_em = $registry->entitymanager;

        $this->postInit();
    }

    private function preInit(){}

    private function postInit(){}

}
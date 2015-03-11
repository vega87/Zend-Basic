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
        /* Initialize action controller here */



        $this->postInit();
    }

    private function preInit(){}

    private function postInit(){}

}
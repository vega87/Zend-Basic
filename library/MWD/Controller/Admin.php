<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 07:28
 * To change this template use File | Settings | File Templates.
 */
class MWD_Controller_Admin extends Zend_Controller_Action{

    public $db = false;

    public function init(){
        $this->_helper->_layout->setLayout('admin');

        $this->db = Zend_Registry::get('em');
    }
}
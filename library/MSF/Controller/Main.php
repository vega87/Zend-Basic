<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 07:28
 * To change this template use File | Settings | File Templates.
 */
class MSF_Controller_Main extends Zend_Controller_Action{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $db = false;

    public function init(){
        $this->_helper->_layout->setLayout('layout');

        $this->db = Zend_Registry::get('entitymanager');

        $this->view->error = "";
    }

}
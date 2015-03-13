<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 07:28
 * To change this template use File | Settings | File Templates.
 */
class MWD_Controller_Main extends Zend_Controller_Action{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $db = false;

    public function init(){
        $this->_helper->_layout->setLayout('layout');

        $this->db = Zend_Registry::get('entitymanager');

        $this->view->error = "";

        $this->isLoggedIn();
    }

    public function isLoggedIn(){
        $session = new Zend_Session_Namespace('MWD_PW_de');
        if(isset($session->userid)){
            $user = $this->db->getRepository('Entity_Users')->find($session->userid);
            if(!empty($user)){
                $this->view->loggedin = true;
                $this->view->loggedinUser = $user;

                return true;
            } else {
                $this->view->loggedin = false;

                return false;
            }
        } else {
            $this->view->loggedin = false;

            return false;
        }
    }
}
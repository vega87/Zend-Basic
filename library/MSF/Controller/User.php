<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 07:28
 * To change this template use File | Settings | File Templates.
 */
class MSF_Controller_User extends MSF_Controller_Main{

    public function init(){
        $this->_helper->_layout->setLayout('user');

        $this->db = Zend_Registry::get('entitymanager');

        $this->view->error = "";

        if(!$this->isLoggedIn()){
            $this->_redirect('/index/');
        }
    }

    public function isLoggedIn(){
        $session = new Zend_Session_Namespace('MSF_PW_de');
        if(isset($session->userid)){
            $user = $this->db->getRepository('Entity_Users')->find($session->userid);
            if(!empty($user)){
                $this->view->loggedin = true;
                $this->view->loggedinUser = $user;
                $this->view->firstlogin = $user->getFirstlogin();

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
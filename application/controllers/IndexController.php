<?php

class IndexController extends MWD_Controller_Main
{

    public function init(){
        parent::init();
    }

    public function indexAction(){
        $session = new Zend_Session_Namespace('MWD_PW_de');
        if(isset($session->userid)){
            $this->_redirect('/user/index/index/');
        }

        $postData = $this->getRequest()->getParams();

        if(isset($postData['submit'])){
            if($postData['username'] != '' && $postData['password'] != ''){
                $user = $this->db->getRepository('Entity_Users')->findOneBy(Array('username'=>$postData['username'],'password'=>sha1($postData['password'])));

                if(!empty($user)){
                    $sessionSettings = MWD_System_ClassManager::getStaticInstance('MWD_Config', 'getInstance')->getValue('session');
                    Zend_Session::setOptions($sessionSettings);
                    $session = new Zend_Session_Namespace('MWD_PW_de');
                    $session->userid = $user->getId();

                    if($this->getRequest()->getParam('jump_to',null) !== null){
                        $this->_redirect($this->getRequest()->getParam('jump_to',null));
                    }
                    $this->_redirect('/user/index/index/');
                } else {
                    $this->view->error = "Benutzername und/oder Passwort falsch oder leer";
                }
            } else {
                $this->view->error = "Benutzername und/oder Passwort falsch oder leer";
            }
        }
    }

    public function logoutAction(){
        Zend_Session::destroy();
        $this->_redirect('/');
    }
}


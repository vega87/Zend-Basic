<?php
/**
 * Created by PhpStorm.
 * User: msmolka87
 * Date: 20.10.15
 * Time: 17:20
 */

class User_SettingsController extends MSF_Controller_User{

    public function indexAction(){
        $params = $this->getRequest()->getParams();
        $session = new Zend_Session_Namespace('MSF_PW_de');
        $user = $this->db->getRepository('Entity_Users')->find($session->userid);

        if(isset($params['edit'])){
            $user->setFirstname($params['fname']);
            $user->setLastname($params['lname']);
            $user->setEmail($params['email']);
            $user->setUsername($params['email']);

            if(isset($params['role_select'])) {
                $role = $this->db->getRepository('Entity_Roles')->find($params['role_select']);
                $user->setRole($role);
            }

            $this->db->persist($user);
            $this->db->flush();

            $this->redirect('/index/logout/');
        }

        $this->view->user = $user;
        $this->view->roles = $this->db->getRepository('Entity_Roles')->findAll();
    }

    public function firstloginAction(){
        $params = $this->getRequest()->getParams();

        $session = new Zend_Session_Namespace('MSF_PW_de');
        $user = $this->db->getRepository('Entity_Users')->find($session->userid);
        if(sha1($params['old_password']) == $user->getPassword()){
            if($params['new_password'] == $params['new_password_repeate']){
                $user->setPassword(sha1($params['new_password']));
                $user->setFirstlogin(0);
                $this->db->persist($user);
                $this->db->flush();

                $this->_redirect('/index/logout/');
            } else {
                $this->view->error = "Passwort wiederholung stimmt nicht";
            }
        } else {
            $this->view->error = "Altes Passwort stimmt nicht";
        }
    }

}
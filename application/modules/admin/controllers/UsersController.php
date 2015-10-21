<?php
/**
 * Created by PhpStorm.
 * User: MSF
 * Date: 19.03.15
 * Time: 16:05
 */

class Admin_UsersController extends MSF_Controller_Admin {

    public function indexAction(){
        $this->view->users = $this->db->getRepository('Entity_Users')->findAll();
    }

    public function editAction(){
        $params = $this->getRequest()->getParams();

        if(isset($params['edit'])){
            print_r($params);
            $user = $this->db->getRepository('Entity_Users')->find($params['id']);
            $user->setFirstname($params['fname']);
            $user->setLastname($param['lname']);
            $user->setEmail($params['email']);
            $user->setRole($params['role']);

            $this->db->persist($user);
            $this->db->flush();

            $this->_redirect('/admin/users/');
        }

        if(isset($params['id']) && $params['id'] != 0) {
            $this->view->user = $this->db->getRepository('Entity_Users')->find($params['id']);
            $this->view->roles = $this->db->getRepository('Entity_Roles')->findAll();
        } else {
            $this->view->error = "Unbekannter Benutzer";
        }
    }

    public function createAction(){
        $params = $this->getRequest()->getParams();

        if(isset($params['create'])){

            $user = new Entity_Users();
            $user->setFirstname($params['fname']);
            $user->setLastname($params['lname']);
            $user->setEmail($params['email']);
            $user->setRole($this->db->getRepository('Entity_Roles')->find($params['role']));
            $user->setPassword(sha1($params['password']));
            $user->setUsername($params['email']);
            $user->setActiv(1);
            $user->setFirstlogin(1);

            $this->db->persist($user);
            $this->db->flush();

            $this->_redirect('/admin/users/');
        }

        $this->view->roles = $this->db->getRepository('Entity_Roles')->findAll();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: MSF
 * Date: 16.03.15
 * Time: 12:38
 */

class Admin_GroupController extends MSF_Controller_Admin
{

    public function indexAction(){
        $this->view->groups = $this->db->getRepository('Entity_Groups')->findAll();
        $this->view->roles  = $this->db->getRepository('Entity_Roles')->findAll();
    }

    public function createAction(){
        $params = $this->getRequest()->getParams();

        if(isset($params['create'])){
            $group = new Entity_Groups();
            $group->setName($params['name']);
            $group->setMetaKey(strtoupper($params['name']));
            $group->setCreatedAt(date('Y-m-d H:i:s'));
            $group->setDescription($params['description']);

            foreach($params['roles'] as $role){
                if($role == "all"){
                    $rolesEnt = $this->db->getRepository('Entity_Roles')->findAll();
                    foreach($rolesEnt as $roleEnt){
                        $group->addEntity_Roles($roleEnt);
                    }
                } else {
                    $rolesEnt = $this->db->getRepository('Entity_Roles')->findOneBy(array('id'=>$role));
                    $group->addEntity_Roles($rolesEnt);
                }
            }

            $this->db->persist($group);
            $this->db->flush();

            $this->_redirect('/admin/Group/');
        }

        $roles = $this->db->getRepository('Entity_Roles')->findAll();
        $this->view->roles = $roles;
    }

    public function editAction(){
        $params = $this->getRequest()->getParams();

        if(isset($params['edit'])){
            $group = $this->db->getRepository('Entity_Groups')->find($params['id']);
            $group->setName($params['name']);
            $group->setMetaKey(strtoupper($params['name']));
            $group->setDescription($params['description']);
            $this->db->getRepository('Entity_Groups')->clearRoles($params['id']);
            
            foreach($params['roles'] as $role){
                if($role == "all"){
                    $rolesEnt = $this->db->getRepository('Entity_Roles')->findAll();
                    foreach($rolesEnt as $roleEnt){
                        $group->addEntity_Roles($roleEnt);
                    }
                } else {
                    $rolesEnt = $this->db->getRepository('Entity_Roles')->findOneBy(array('id'=>$role));
                    $group->addEntity_Roles($rolesEnt);
                }
            }

            $this->db->persist($group);
            $this->db->flush();

            $this->_redirect('/admin/Group/');
        }

        $group = $this->db->getRepository('Entity_Groups')->find($params['id']);
        $selectArray = Array();
        foreach($group->getRole() as $role){
            $selectArray[$role->getId()] = $role->getId();
        }

        $this->view->selects = $selectArray;
        $this->view->roles = $this->db->getRepository('Entity_Roles')->findAll();
        $this->view->group = $this->db->getRepository('Entity_Groups')->find($params['id']);
    }

}
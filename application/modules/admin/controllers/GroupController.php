<?php
/**
 * Created by PhpStorm.
 * User: MWD
 * Date: 16.03.15
 * Time: 12:38
 */

class Admin_GroupController extends MWD_Controller_Admin
{

    public function indexAction(){
        $this->view->groups = $this->db->getRepository('Entity_Groups')->findAll();
    }

    public function createAction(){
        $params = $this->getRequest()->getParams();

        if(isset($params['create'])){
            $group = new Entity_Groups();
            $group->setName($params['name']);
            $group->setMetaKey(strtoupper($params['name']));
            $group->setCreatedAt(new DateTime());
            $group->setDescription($params['description']);

            foreach($params['roles'] as $role){
                if($role == "all"){
                    $rolesEnt = $this->db->getRepository('Entity_Roles')->findAll();
                    foreach($rolesEnt as $roleEnt){
                        $group->addEntity_Roles($roleEnt);
                    }
                } else {
                    $rolesEnt = $this->db->getRepository('Entity_Roles')->findOneBy(array('id'=>$group));
                    $group->addEntity_Roles($rolesEnt);
                }
            }

            $this->db->persist($group);
            $this->db->flush();
        }

        $roles = $this->db->getRepository('Entity_Roles')->findAll();
        $this->view->roles = $roles;
    }

    public function editAction(){

    }

}
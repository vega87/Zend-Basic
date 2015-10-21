<?php
/**
 * Created by PhpStorm.
 * User: MSF
 * Date: 16.03.15
 * Time: 12:38
 */

class Admin_RoleController extends MSF_Controller_Admin
{

    public function indexAction()
    {
        $roles = $this->db->getRepository('Entity_Roles')->findAll();
        $this->view->roles = $this->db->getRepository('Entity_Roles')->findAll();
    }

    public function createAction(){

        $params = $this->getRequest()->getParams();

        if(isset($params['create'])){
            $groups = Array();
            if(isset($params['groups'])) {
                $groups = $params['groups'];
            }
            $name   = $params['name'];

            $role = new Entity_Roles();
            $role->setName($name);
            $role->setMetaKey(strtoupper($name));
            $role->setCreatedAt(date('Y-m-d H:i:s'));
            $role->setDescription($params['description']);
            foreach($groups as $key => $group){
                if($group == "all"){
                    $groupsEnt = $this->db->getRepository('Entity_Groups')->findAll();
                    foreach($groupsEnt as $groupEnt){
                        $role->addEntity_Groups($groupEnt);
                    }
                } else {
                    $groupEnt = $this->db->getRepository('Entity_Groups')->findOneBy(array('id'=>$group));
                    $role->addEntity_Groups($groupEnt);
                }
            }


            $this->db->persist($role);
            $this->db->flush();

            $this->_redirect('/admin/role/');
        }

        $this->view->groups = $this->db->getRepository('Entity_Groups')->findAll();
    }

    public function editAction(){
        $id = $this->getRequest()->getParam('id',0);

        if($id != 0){
            $role = $this->db->getRepository('Entity_Roles')->find($id);

            $selected = Array();
            if(!$role->getGroup()->isEmpty()) {
                foreach ($role->getGroup() as $group) {
                    $selected[$group->getId()] = $group->getId();
                }
            }

            $this->view->selected = $selected;
            $this->view->groups   = $this->db->getRepository('Entity_Groups')->findAll();
            $this->view->role     = $role;
        } else {
            $this->_redirect('/admin/role/');
        }
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: MWD
 * Date: 16.03.15
 * Time: 12:38
 */

class Admin_RoleController extends MWD_Controller_Admin
{

    public function indexAction()
    {
        $roles = $this->db->getRepository('Entity_Roles')->findAll();

        $role = $roles[3];

        //print_r($role->getGroup()[0]); exit;

        $this->view->roles = $this->db->getRepository('Entity_Roles')->findAll();
    }

    public function createAction(){

        $params = $this->getRequest()->getParams();

        if(isset($params['create'])){
            $groups = $params['groups'];
            $name   = $params['name'];

            $role = new Entity_Roles();
            $role->setName($name);
            $role->setMetaKey(strtoupper($name));
            $role->setCreatedAt(new DateTime());
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
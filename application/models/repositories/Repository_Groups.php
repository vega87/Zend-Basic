<?php
use Doctrine\ORM\EntityRepository;

class Repository_Groups extends EntityRepository{

    public function getPasswords($groupId){
        $passwords = $this->getEntityManager()->getRepository('Entity_Passwords')->findBy(array('group'=>$groupId));

        return $passwords;
    }

    public function clearRoles($id){
        $conn = $this->getEntityManager()->getConnection();
        $statement = $conn->prepare("DELETE FROM role_groups WHERE group_id='".$id."'");
        $statement->execute();
    }

};
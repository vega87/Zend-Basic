<?php
use Doctrine\ORM\EntityRepository;

class Repository_Groups extends EntityRepository{

    public function getPasswords($groupId){
        $passwords = $this->getEntityManager()->getRepository('Entity_Passwords')->findBy(array('group'=>$groupId));

        return $passwords;
    }

};
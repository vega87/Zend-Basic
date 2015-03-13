<?php
use Doctrine\ORM\EntityRepository;

class Repository_Users extends EntityRepository{

    public function getToast(){
        die('Toast');
    }

};
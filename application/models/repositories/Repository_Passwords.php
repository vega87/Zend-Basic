<?php
use Doctrine\ORM\EntityRepository;

class Repository_Passwords extends EntityRepository{

    public function decryptPassword($passwordId){
        $password = $this->getEntityManager()->getRepository('Entity_Passwords')->find($passwordId);
        $pwSettings = MWD_System_ClassManager::getStaticInstance('MWD_Config', 'getInstance')->getValue('pwmanager');

        //Entschlüsseln
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $pwSettings['password'], base64_decode($password->getPassword()), MCRYPT_MODE_ECB,file_get_contents(APPLICATION_PATH.'/../passwordkey/key'));
    }

};
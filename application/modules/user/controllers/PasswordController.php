<?php
/**
 * Created by PhpStorm.
 * User: MWD
 * Date: 13.03.15
 * Time: 13:44
 */
class User_PasswordController extends MWD_Controller_User{

    public function indexAction(){
        $this->view->groups = $this->db->getRepository('Entity_Groups')->findAll();
    }

    public function viewAction(){
        $id = $this->getRequest()->getParam('id',0);

        if($id != 0) {
            $password = $this->db->getRepository('Entity_Passwords')->find($id);

            $this->view->password = $password;
        } else {
            $this->view->error = "Kein Passwort zum Anzeigen";
        }
    }

    public function createAction(){
        $params = $this->getRequest()->getParams();

        if(isset($params['create'])){
            //Verschlüsseln
            $session = new Zend_Session_Namespace('MWD_PW_de');
            $user = $this->db->getRepository('Entity_Users')->find($session->userid);

            $pwSettings = MWD_System_ClassManager::getStaticInstance('MWD_Config', 'getInstance')->getValue('pwmanager');

            $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $pwSettings['password'], $params['password'], MCRYPT_MODE_ECB,file_get_contents(APPLICATION_PATH.'/../passwordkey/key'));

            $password = new Entity_Passwords();
            $password->setName($params['name']);
            $password->setDescription($params['description']);
            $password->setGroup($this->db->getRepository('Entity_Groups')->find($params['roleId']));
            $password->setPassword(base64_encode($encrypted));
            $password->setCreatedBy($user);

            $this->db->persist($password);
            $this->db->flush();

            $this->_redirect('/user/password/');
        }

        $this->view->groups = $this->db->getRepository('Entity_Groups')->findAll();
    }

    public function showAction(){
        $params = $this->getRequest()->getParams();

        if(isset($params['id']) && $params['id'] != 0){
            $password = $this->db->getRepository('Entity_Passwords')->decryptPassword($params['id']);

            die(json_encode(Array('success' => 1,'de_password'=>trim($password))));
        }

        die(json_encode(Array('error' => 1)));
    }
}
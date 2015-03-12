<?php

class IndexController extends MWD_Controller_Guest
{

    public function indexAction(){
        $user = new MWD\Entity\User();

    	$postData = $this->getRequest()->getParams();
        if(isset($postData['submit'])){
        	if($postData['username'] != '' && $postData['password'] != ''){
        		//Checke DB nach Benutzer
        	} else {
        		//Fehler keine Daten übergeben
        		$this->view->error = "Benutzername und Password ungültig oder leer";
        	}
        }
    }
    
}


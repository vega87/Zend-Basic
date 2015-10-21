<?php
/**
 * Created by PhpStorm.
 * User: MSF
 * Date: 19.03.15
 * Time: 15:50
 */

class InstallController extends MSF_Controller_Main {

    public function step1Action(){
        if(!is_file(APPLICATION_PATH.'/../passwordkey/key')) {
            $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
            $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

            file_put_contents(APPLICATION_PATH.'/../passwordkey/key',$iv);
        }
    }

}
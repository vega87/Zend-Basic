<?php

define("ZEND_ENVIRONMENT", 'production');
define("APPLICATION_ENV", 'production');
define('HTTP_HOST',$_SERVER['HTTP_HOST']);
$prodHosts = array("www.laguun.de", "laguun.de");

if(in_array($_SERVER['HTTP_HOST'], $prodHosts)) {
    try {
        require_once('bootstrap.php');
    } catch(Exception $e) {
        header('HTTP/1.0 404 Not Found');
        header("Location: /404.html");
        die();
    }

} else {
    try {
        require_once('bootstrap.php');
    } catch(Exception $e) {
        print($e->getMessage());
        print($e->getTraceAsString());
        //header('HTTP/1.0 404 Not Found');
        //header("Location: /404.html");

    }
}
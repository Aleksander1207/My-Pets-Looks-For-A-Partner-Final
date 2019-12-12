<?php
session_start();

require_once "Facebook/autoload.php";
require_once "GoogleAPI/vendor/autoload.php";

$FB=new \Facebook\Facebook([
    'app_id'=>'733508503784564',
    'app_secret'=>'81487a20d86e7c4e90df21e8955d6a5a',
    'default_graph_version'=>'v2.10'
]);

$helper=$FB->getRedirectLoginHelper();


$gClient=new Google_Client();

$gClient->setClientId("714227506718-bc3fqqviov76dusna4rovsevmjo8krpn.apps.googleusercontent.com");
$gClient->setClientSecret("ePdAoJeg61FbBWzqOGdz2RzK");
$gClient->setApplicationName("Animal");
$gClient->setRedirectUri("http://localhost/g-callback.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");


?>
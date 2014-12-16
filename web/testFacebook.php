<?php

require_once '../vendor/autoload.php';

$clientId = "";
$key = "";
$callbackUrl = "";
$facebookLogin = new \AndrushinAnton\SocialLogin\Facebook\FacebookLogin($clientId, $key, $callbackUrl);

if(empty($_GET['code']))
{
    header("location: ".$facebookLogin->init()->getLoginUrl());
}
else
{
    $user = $facebookLogin->init()->loginCallback($_GET['code']);
    echo "Hi ". $user->getFirstname() . " " . $user->getLastname();
}
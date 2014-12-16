<?php

require_once '../vendor/autoload.php';

$clientId = "";
$key = "";
$callbackUrl = "";
$googleLogin = new \AndrushinAnton\SocialLogin\Google\GoogleLogin($clientId, $key, $callbackUrl);

if(empty($_GET['code']))
{
    header("location: ".$googleLogin->init()->getLoginUrl());
}
else
{
    $user = $googleLogin->init()->loginCallback($_GET['code']);
    echo "Hi ". $user->getFirstname() . " " . $user->getLastname();
}
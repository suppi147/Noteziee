<?php
include __DIR__.'/../UpdateCredential.php';
require_once('OAuthManager.php');

if($_GET['code']){
    $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $gauth= new Google_Service_Oauth2($client);
    $googleAccountIn4= $gauth->userinfo->get();

    $email=$googleAccountIn4->email;
    $addEmail =new UpdateCredential();
    $addEmail->Insert2LoginDB($email);
}
?>
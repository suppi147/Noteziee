<?php
include __DIR__.'/../UpdateCredential.php';
require_once('vendor/autoload.php');


$clientID='452812593294-9rmutaejqhrupe95tp5gd06jucv17u15.apps.googleusercontent.com';
$clientSecret='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';
$redirectURI='http://localhost/Noteziee/UserLogin/LoginController/OAuthManager/EmailRetrieve.php';

$client= new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope('profile');
$client->addScope('email');

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
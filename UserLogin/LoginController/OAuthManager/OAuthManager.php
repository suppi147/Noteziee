<?php
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
?>
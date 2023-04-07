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


<html>
<head>
  <title>Noteziee</title>
  <link rel="shortcut icon" href="http://localhost/Noteziee/Homepage/assets/icon/icon.ico" type="image/x-icon">
  <link rel="stylesheet" href="http://localhost/Noteziee/UserLogin/assets/css/login.css">
  <meta charset="utf-8">
 
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <div class="form-center">
            <a class="a" href="http://localhost/Noteziee/Homepage/" rel="dofollow">
            <img src="http://localhost/Noteziee/UserLogin/assets/images/tree.png" alt=""></a>
       </div>
        </div>
        <div class="formbg-outer">
        <div class="row">
            
           <div  class="formbg col-md-7 text-part" >
            <div class="formbg-inner padding-horizontal--48" style="padding-bottom: 26px;">
            <img src="http://localhost/Noteziee/UserLogin/assets/images/g.png" style="margin-left: 160px;margin-top: -10px;" alt=""></a>
              <form action=<?php echo $client->createAuthUrl();?> name="loginForm" method="POST" id="loginID">      
                <div class="field padding-bottom--24">
                  <input type="submit" name="control_flag" value="Sign in with Google Account" style="margin-top: 15px;">
                  
                </div>
              </form>
            </div>
        </div>
        
        
          </div>
          <div class="footer-link padding-top--24">
            <span style="color: #f2f2f2;">I know you are questioning why I use OAuth!? Well, nothing personal, It's just me liking It.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
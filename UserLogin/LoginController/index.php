<?php
include __DIR__.'/OAuthManager/OAuthManager.php';
?>


<html>
<head>
  <title>Noteziee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="/Noteziee/Homepage/assets/icon/icon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/Noteziee/UserLogin/assets/css/login.css">
  <meta charset="utf-8">
 
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <div class="form-center">
            <a class="a" href="http://localhost/Noteziee/Homepage/" rel="dofollow">
            <img src="/Noteziee/UserLogin/assets/images/tree.png" alt=""></a>
       </div>
        </div>
        <div class="formbg-outer">
        <div class="row">
            
           <div  class="formbg col-md-7 text-part" >
            <div class="formbg-inner padding-horizontal--48" style="padding-bottom: 26px;">
            <img src="/Noteziee/UserLogin/assets/images/g.png" style="margin-left: 160px;margin-top: -10px;" alt=""></a>
              <form action=<?php echo $client->createAuthUrl();?> name="loginForm" method="POST" id="loginID">      
                <div class="field padding-bottom--24">
                  <input type="submit" name="control_flag" value="Sign in with Google Account" style="margin-top: 20px;">
                </div>
              </form>
            </div>
        </div>
        
        
          </div>
          <div class="footer-link padding-top--24">
            <span style="color: #f2f2f2;">Google uses OAuth to log in to almost anything that belong to Google... Including Noteziee ;3</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
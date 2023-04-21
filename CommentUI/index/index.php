<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title>Noteziee</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="http://localhost/Noteziee/CommentUI/css/index.css" rel="stylesheet" />
        <link href="http://localhost/Noteziee/CommentUI/css/checkbox.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="http://localhost/Noteziee/CommentUI/js/index.js"></script>
        
    <link rel="shortcut icon" href="http://localhost/Noteziee/Homepage/assets/icon/icon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/Noteziee/Homepage/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/Noteziee/Homepage/assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="http://localhost/Noteziee/Homepage/assets/css/button.css">
    <link rel="stylesheet" href="http://localhost/Noteziee/Homepage/assets/plugins/owl/owl.carousel.min.css">
      <link rel="stylesheet" href="http://localhost/Noteziee/Homepage/assets/plugins/owl/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Noteziee/Homepage/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <header id="menu-jk" class="container-fluid">
          <div class="container">
              <div class="row">
                   <div class="col-lg-3 col-md-12 logo">
                    
                       <a href="#"><img class="white" src="http://localhost/Noteziee/Homepage/assets/images/logo.png" alt=""></a>
                       <a href="#"><img class="gray" src="http://localhost/Noteziee/Homepage/assets/images/logo-gray.png" alt=""></a>

                       <a class="small-menu" class="d-lg-none" data-toggle="collapse" data-target="#menu" href="#menu" >
                           <i  class="fas d-lg-none fa-bars"></i>
                      </a>
                   </div>
                   <div id="menu" class="col-lg-9 d-none d-lg-block navigation">
                       <ul>
                           <li><a href="#" onclick="customAlert.alert('For our security measurement and resource saves. Limits are set at 50 accounts maximum, 50 notes per an account and 20,000 words per a note.','Heads Up!')">Policy</a>
                           <li><a href="http://localhost/Noteziee/UserLogin/LoginController/Logout.php">Logout</a></li>                    
                       </ul>
                   </div>
              </div>
          </div>
      </header>
      <div class="slider container-fluid">
      <div class="container">
      <form action="http://localhost/Noteziee/ZieeAPI/ZieeAPI.php" name="submitForm" method="POST" id="commentID" onclick="ReceiveEnter();">
                <div class="form-group">
                 <textarea name="commentContent" id="commentContent" class="textarea-edit" placeholder="Enter Something :3" rows="10" cols="60"></textarea>
                </div>
                <div class="form-group">
                 <input type="hidden" name="control_flag" id="control_flag" value="post" />
                 <div class="col text-center"><button id="submit" type="submit" onclick="return IsEmpty();" >Submit</button>
                </div> 
                </div>
            </form>
            </div>
            
            <div class="col text-center" style="padding-bottom:15px;">
            </div>
            <div class="row">
<?php
include __DIR__.'/../../CommentController/FetchComment.php';
include __DIR__.'/../../CommentController/DeleteComment.php';
include __DIR__.'/../../CommentController/EditComment.php';
include __DIR__.'/../../UserLogin/LoginController/SessionManager/SessionManager.php';


require_once("BoxCommentController.php");
require_once("DeleteButton.php");
require_once("EditButton.php");
require_once("ModalButton.php");
require_once("CheckBox.php");
require_once("SelectAllButton.php");
require_once("CopyButton.php");
define("MAX_COMMENTLINE",6);
define("MAX_LETTER",435);

    
    $sessionManager= new SessionManager();
    $sessionManager->SessionStart();
    $sessionManager->IsSessionExpired();
    
    $showerPack= new FetchComment();
    $commentBoxTrigger= new BoxCommentController();
    $deleteButtonTrigger=new DeleteButton();
    $editButtonTrigger=new EditButton();
    $modalButtonTrigger=new ModalButton();
    $checkBoxTrigger=new CheckBox();
    $selectAllButtonTrigger=new SelectAllButton();
    $copyButtonTrigger=new CopyButton();
    $showerPack->InteractCommentDB->SetDBInformation("localhost","CommentDB",$_SESSION['username'],$_SESSION['password']);
    foreach( $showerPack->Fetch() as $commentID=> $commentShow){
        $commentBoxTrigger->AddPackHeader($checkBoxTrigger->CheckBoxPack($commentID));
        $commentBoxTrigger->AddButtons2Pack($selectAllButtonTrigger->SelectAllButtonPack());
        $commentBoxTrigger->AddButtons2Pack($deleteButtonTrigger->DeleteButtonPack($commentID));
        $commentBoxTrigger->AddButtons2Pack($editButtonTrigger->EditButtonPack($commentShow,$commentID));
        $commentBoxTrigger->AddButtons2Pack($copyButtonTrigger->CopyButtonPack($commentID,$commentShow));
        if(substr_count($commentShow,"\n")>MAX_COMMENTLINE or strlen($commentShow)>MAX_LETTER){
            $commentBoxTrigger->AddButtons2Pack($modalButtonTrigger->ModalButtonPack($commentShow));        
        }
        $commentBoxTrigger->AddButtons2Pack($checkBoxTrigger->CheckBoxPack($commentID));
        
        echo $commentBoxTrigger->FullPack($commentShow,$commentID);
    }

echo '</div>
        </div>
            </div>
            <footer id="contact" class="container-fluid">
       <div class="container">

           <div class="row content-ro">
             <div class="col-lg-4 col-md-12 footer-form">
                <h2>About Noteziee</h2>

                <p>Noteziee was created by suppi147 with dedication and hard work. Noteziee is mainly used for noting down small notes like recipes, or as a way to interact between virtual machines with a real machine based on comments and files.</p>
                  
             </div>

               <div class="col-lg-4 col-md-12 footer-links">
                  <div class="row no-margin mt-2">
                   <h2>Quick Links</h2>
                   <ul style="margin-left: 60px;">
                    <li><a style="color:#f7f2f2;" href="#">Home</a></li>
                    <li><a style="color:#f7f2f2;" href="#features">Policy</a></li>
                    <li><a style="color:#f7f2f2;" href="#contact">About Noteziee</a></li>
                </ul>
                   </div>
                  <div class="row no-margin mt-1">
                      <h2 class="m-t-2">More Products</h2>
                    <ul style="margin-left: 60px;">
                       <li>Catinger</li>
                       <li>Smart Hi</li>
                       <li>Smart School</li>


                   </ul>
                  </div>

               </div>
               <div class="col-lg-4 col-md-12 footer-contact">
                   <h2>Contact Information</h2>
                   <div class="address-row">
                       <div class="icon">
                           <i class="fas fa-map-marker-alt"></i>
                       </div>
                       <div class="detail">
                           <p style="margin-top: 15px;">HCMC National University Dormitory Zone A</p>
                       </div>
                   </div>
                   <div class="address-row">
                       <div class="icon">
                           <i class="far fa-envelope"></i>
                       </div>
                       <div class="detail">
                           <p style="margin-top: 15px;">khoitran2090@gmail.com</p>
                       </div>
                   </div>
                   <div class="address-row">
                       <div class="icon">
                           <i class="fas fa-phone"></i>
                       </div>
                       <div class="detail">
                           <p>+91 9751791203 <br> +91 9159669599</p>
                       </div>
                   </div>
               </div>

           </div>
           <div class="footer-copy">
               <div class="row">
                   <div class="col-lg-8 col-md-6">
                       <p>Copyright © <a>suppi147</a> | All right reserved.</p>
                   </div>
                   <div class="col-lg-4 col-md-6 socila-link">
                       <ul>
                           <li><a target="_blank" rel="noopener noreferrer" href="https://github.com/suppi147"><i class="fab fa-github"></i></a></li>
                           <li><a target="_blank" rel="noopener noreferrer" href="https://twitter.com/suppi147"><i class="fab fa-twitter"></i></a></li>
                           <li><a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/khoi.lee.2090/"><i class="fa fa-facebook"></i></a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </footer>

            </body>
            <script src="http://localhost/Noteziee/Homepage/assets/js/jquery-3.2.1.min.js"></script>
            <script src="http://localhost/Noteziee/Homepage/assets/js/popper.min.js"></script>
            <script src="http://localhost/Noteziee/Homepage/assets/js/bootstrap.min.js"></script>
            <script src="http://localhost/Noteziee/Homepage/assets/plugins/owl/owl.carousel.min.js"></script>
            <script src="http://localhost/Noteziee/Homepage/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
            <script src="http://localhost/Noteziee/Homepage/assets/js/script.js"></script>
                </html>';
?>
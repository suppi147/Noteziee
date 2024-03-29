<?php
include __DIR__.'/../CommentController/CommentController.php';
include __DIR__.'/../CommentController/PostComment.php';
include __DIR__.'/../CommentController/DeleteComment.php';
include __DIR__.'/../CommentController/EditComment.php';
include __DIR__.'/../CommentController/SelectAllComment.php';
include __DIR__.'/../UserLogin/LoginController/SessionManager/SessionManager.php';
include __DIR__.'/../LimitationControl/LimitComments.php';
include __DIR__.'/../LimitationControl/LimitAllNote.php';

$sessionManager=new SessionManager();
$sessionManager->SessionStart();
$sessionManager->IsSessionExpired();

$controller= new CommentController();
switch($_POST["control_flag"]){
     case 'post':{
          
          $limitAllComments= new LimitAllNote($_SESSION['username']);
          $limitAllComments->CheckForLimit();
          $limitComments= new LimitComments($_POST["commentContent"]);
          $limitComments->CheckForLimit();
          $postTrigger=new PostComment();
          $postTrigger->InteractCommentDB->SetDBInformation("localhost","CommentDB",$_SESSION['username'],$_SESSION['password']);
          $postTrigger->Post($_POST["commentContent"]);
          break;
          }
     case 'delete':{
          $deleteTrigger=new DeleteComment();
          $deleteTrigger->InteractCommentDB->SetDBInformation("localhost","CommentDB",$_SESSION['username'],$_SESSION['password']);
          $deleteTrigger->Delete();
          break;
     }
     case 'select':{
          $selectTrigger=new DeleteComment();
          $selectTrigger->InteractCommentDB->SetDBInformation("localhost","CommentDB",$_SESSION['username'],$_SESSION['password']);
          $selectTrigger->DeleteIDStackUp($_POST["id"],$_POST["checker"]);
          break;
     }
     case 'selectAll':{
          $selectAllTrigger=new SelectAllComment();
          $selectAllTrigger->InteractCommentDB->SetDBInformation("localhost","CommentDB",$_SESSION['username'],$_SESSION['password']);
          $selectAllTrigger->SelectAllIDStackUp($_POST["checker"]);
          break;
     }
     case 'edit':{
          $editTrigger=new EditComment();
          $editTrigger->InteractCommentDB->SetDBInformation("localhost","CommentDB",$_SESSION['username'],$_SESSION['password']);
          $editTrigger->Edit($_POST["commentContent"],$_POST["id"]);
          break;
     }
     default:{
          echo '<script>alert("Unknown control flag")</script>';
          break;
     }
}
header("Location: ".$controller->indexLocation);
?>


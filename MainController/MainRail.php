<?php
include __DIR__.'/../CommentController/CommentController.php';
include __DIR__.'/../CommentController/PostComment.php';
include __DIR__.'/../CommentController/DeleteComment.php';
include __DIR__.'/../CommentController/EditComment.php';
include __DIR__.'/../CommentController/SelectAllComment.php';

include __DIR__.'/../UserLogin/LoginController/LoginController.php';

$controller= new CommentController();

if(strcmp($_POST["control_flag"],"post")==0){
     $postTrigger=new PostComment();
     $postTrigger->Post($_POST["commentContent"]);
}
else if( strcmp($_POST["control_flag"],"delete")==0 or strcmp($_POST["control_flag"],"select")==0){
     $postTrigger=new DeleteComment();
     //$postTrigger->Delete($_POST["id"]);
     if(strcmp($_POST["control_flag"],"select")==0){
          $postTrigger->DeleteIDStackUp($_POST["id"],$_POST["checker"]);
     }
     else if(strcmp($_POST["control_flag"],"delete")==0){
          $postTrigger->Delete();
     }
}
else if(strcmp($_POST["control_flag"],"selectAll")==0){
     $postTrigger=new SelectAllComment();
     $postTrigger->SelectAllIDStackUp($_POST["checker"]);
}
else if(strcmp($_POST["control_flag"],"edit")==0){
     $postTrigger=new EditComment();
     $postTrigger->Edit($_POST["commentContent"],$_POST["id"]);
}
else if(strcmp($_POST["control_flag"],"login")==0){
     $postTrigger=new EditComment();
     $postTrigger->Edit($_POST["commentContent"],$_POST["id"]);
}
else{
     echo '<script>alert("Unknown control flag")</script>';
}
header("Location: ".$controller->indexLocation);
?>


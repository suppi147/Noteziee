<?php
include __DIR__.'/../CommentController/CommentController.php';
include __DIR__.'/../CommentController/PostComment.php';
include __DIR__.'/../CommentController/DeleteComment.php';

$controller= new CommentController();

if(strcmp($_POST["control_flag"],"post")==0){
     $postTrigger=new PostComment();
     $postTrigger->Post($_POST["commentContent"]);
}
else if(strcmp($_POST["control_flag"],"delete")==0){
     $postTrigger=new DeleteComment();
     $postTrigger->Delete($_POST["id"]);
}
else{
     echo "error";
     header("Location: ".$controller->indexLocation);
}
header("Location: ".$controller->indexLocation);
?>

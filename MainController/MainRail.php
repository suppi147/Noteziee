<?php
include __DIR__.'/../CommentController/CommentController.php';
include __DIR__.'/../CommentController/PostComment.php';
include __DIR__.'/../CommentController/DeleteComment.php';
include __DIR__.'/../CommentController/EditComment.php';

$controller= new CommentController();

if(strcmp($_POST["control_flag"],"post")==0){
     $postTrigger=new PostComment();
     $postTrigger->Post($_POST["commentContent"]);
}
else if(strcmp($_POST["control_flag"],"delete")==0){
     $postTrigger=new DeleteComment();
     $postTrigger->Delete($_POST["id"]);
}
else if(strcmp($_POST["control_flag"],"edit")==0){
     $postTrigger=new EditComment();
     $postTrigger->Edit($_POST["commentContent"],$_POST["id"]);
}
else{
     echo '<script>alert("Unknown control flag")</script>';
}
header("Location: ".$controller->indexLocation);
?>


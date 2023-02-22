<?php
    include __DIR__.'CommentController/CommentController.php';
    include __DIR__.'CommentController/PostComment.php';

$controller= new CommentController();

if(strcmp($_POST["control_flag"],"post")==0){
     $postTrigger=new PostComment();
     $postTrigger->post($_POST["commentContent"]);
}
else{
     echo "control flag invalid";
     header("Location: ".$controller->indexLocation);
}
?>
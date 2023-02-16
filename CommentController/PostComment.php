<?php
require_once("CommentController.php");
class PostComment extends CommentController{
    protected $commentContent;
    function __construct(){
        parent::__construct();
    }

    function Filter(){
        $this->commentContent = filter_var($this->commentContent, FILTER_SANITIZE_STRING);
    } 

    function Post($commentCarrier){
        $this->Connect2DB();

        $this->commentContent=$commentCarrier;

        $this->Filter();

        $query=" INSERT INTO CommentTable(commentItem)VALUES (:commentItem)";
    $trigger=$this->connect->prepare($query);
    $trigger->execute(
        array(
            ':commentItem'=>$this->commentContent
        )
    );

        $this->Disconnect2DB();
    header("Location: ".$this->indexLocation);
    }
}
?>
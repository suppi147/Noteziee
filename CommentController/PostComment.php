<?php
require_once("CommentController.php");
require_once("FilterComment.php");
class PostComment extends CommentController{
    protected $commentContent;
    protected $filterNet;
    function __construct(){
        $this->filterNet= new FilterComment();
        parent::__construct();
    }

    function Post($commentCarrier){

        $this->Connect2DB();

        if($this->filterNet->FilterComment($commentCarrier)==true){
            $this->commentContent=$this->filterNet->GetItemfiltering();
            $query=" INSERT INTO CommentTable(commentItem)VALUES (:commentItem)";
            $trigger=$this->connect->prepare($query);
            $trigger->execute(
                array(
                    ':commentItem'=>$this->commentContent
                )
            );
        }
        
        $this->Disconnect2DB();
    }
}
?>

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
            $query=' INSERT INTO CommentTable'.$_SESSION['username'].'(commentItem)VALUES ("'.$this->commentContent.'")';
            //$trigger=$this->connect->prepare($query);
            //$trigger->execute(
            //    array(
            //        ':commentItem'=>$this->commentContent
            //    )
            //);
            $this->InteractCommentDB->Update2DB($query);
        }
        
        $this->Disconnect2DB();
    }
}
?>

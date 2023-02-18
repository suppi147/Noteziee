<?php
require_once("CommentController.php");
class PostComment extends CommentController{
    protected $commentContent;
    function __construct(){
        parent::__construct();
    }

    function Filter(){
        if (strlen(trim($this->commentContent)) == 0)
            return false;
        
        $this->commentContent=htmlspecialchars($this->commentContent, ENT_QUOTES, 'UTF-8');
        return true;
        
    } 

    function Post($commentCarrier){
        $this->Connect2DB();

        $this->commentContent=$commentCarrier;

        if($this->Filter()){
            $query=" INSERT INTO CommentTable(commentItem)VALUES (:commentItem)";
            $trigger=$this->connect->prepare($query);
            $trigger->execute(
                array(
                    ':commentItem'=>$this->commentContent
                )
            );
        }

        $this->Disconnect2DB();
    header("Location: ".$this->indexLocation);
    }
}
?>
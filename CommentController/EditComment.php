<?php
require_once("CommentController.php");
require_once("FilterComment.php");
class EditComment extends CommentController{
    protected $commentEditing;
    protected $idEditing;
    protected $filterNet;
    function __construct(){
        $this->commentEditing="NULL";
        $this->idEditing=-1;
        $this->filterNet= new FilterComment();
        parent::__construct();
    }

    function Edit($commentCarrier,$commentID){

        $this->Connect2DB();

        if($this->filterNet->FilterComment($commentCarrier)==true && $this->filterNet->FilterID($commentID)==true){
            $this->commentEditing=$this->filterNet->GetItemfiltering();
            $this->idEditing=$this->filterNet->GetIDFiltering();
            $query=" UPDATE CommentTable SET commentItem=\"".$this->commentEditing."\" WHERE id=".$this->idEditing;
            $trigger=$this->connect->prepare($query);
            $trigger->execute();
        }
        else{
            echo '<script>alert("Comment or ID failed")</script>';
        }
        
        $this->Disconnect2DB();
    }
}
?>

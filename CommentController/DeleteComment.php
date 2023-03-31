<?php
require_once("CommentController.php");
require_once("FilterComment.php");
class DeleteComment extends CommentController{
    protected $filterNet;
    protected $filterID;
    protected $filterIDBlock;

    function __construct(){
    $this->filterNet= new FilterComment();
    $this->filterIDBlock= array();
    $this->filterID=0;
	parent::__construct();
    }

    function Delete(){
        parent:$this->Connect2DB();
        //id filtering
        
        $query="SELECT * FROM IDBlock".$_SESSION['username'];
        $result=$this->InteractCommentDB->FetchFromDB($query);
        foreach($result as $data){
            array_push($this->filterIDBlock,$data['block']);
            
        }
        $this->filterIDBlock = implode(',',$this->filterIDBlock);
        $query="DELETE FROM CommentTable".$_SESSION['username']." WHERE id IN(".$this->filterIDBlock.")";
        $this->InteractCommentDB->Update2DB($query);

        $query="DELETE FROM IDBlock".$_SESSION['username'];
        $this->InteractCommentDB->Update2DB($query);

        //Disconnect DB
        $this->Disconnect2DB();

    }

    function DeleteIDStackUp($unfilterID,$boxChecker){

        parent:$this->Connect2DB();
        if($this->filterNet->FilterID($unfilterID)==true)
            $this->filterID=$this->filterNet->GetIDFiltering();
        else{
                echo '<script>alert("Invalid ID")</script>';
                exit();
            }    
        if($boxChecker=="true")
            {
                $query="SELECT EXISTS(SELECT * FROM IDBlock".$_SESSION['username']." WHERE block=".$this->filterID.")";
                $result=$this->InteractCommentDB->FetchFromDB($query);
                foreach($result as $data){
                if($data[0]==0){
                    $query='INSERT INTO IDBlock'.$_SESSION['username'].'(block)VALUES ("'.$this->filterID.'")';
                    $this->InteractCommentDB->Update2DB($query);
                }
            }
        }
        else{
            $query='DELETE FROM IDBlock'.$_SESSION['username'].' WHERE block='.$this->filterID.'"';
            $this->InteractCommentDB->Update2DB($query);
        }
        $this->Disconnect2DB();
    }
}
?>
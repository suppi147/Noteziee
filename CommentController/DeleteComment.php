<?php
require_once("CommentController.php");
require_once("FilterComment.php");
class DeleteComment extends CommentController{
    protected $filterNet;
    protected $filterID;
    function __construct(){
    $this->filterNet= new FilterComment();
	parent::__construct();
    }

    function Delete($unfilterID){
        parent:$this->Connect2DB();
        //id filtering
        if($this->filterNet->FilterID($unfilterID)==true){
            $this->filterID=$this->filterNet->GetItemfiltering();
            //execute Delete query
            $query="DELETE FROM CommentTable WHERE id=".$this->filterID;
            $statement= $this->connect->prepare($query);
            $statement->execute();
        }
        else{
            echo 'invalid ID';
        }
        

        //Disconnect DB
        $this->Disconnect2DB();

    }
}
?>
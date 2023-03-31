<?php
require_once("CommentController.php");
class SelectAllComment extends CommentController{
    function __construct(){
  
	parent::__construct();
    }

    function SelectAllIDStackUp($boxChecker){
        parent:$this->Connect2DB();
        if($boxChecker=="true"){
            $query="SELECT id FROM CommentTable".$_SESSION['username'];
            $result=$this->InteractCommentDB->FetchFromDB($query);
            foreach($result as $data){
                $query="INSERT INTO IDBlock".$_SESSION['username']."(block)VALUES (".$data['id'].")";
                $this->InteractCommentDB->Update2DB($query);
            }
        }
        else{
            $query="DELETE FROM IDBlock".$_SESSION['username'];
            $this->InteractCommentDB->Update2DB($query);
        }
        
        $this->Disconnect2DB();
    }
}
?>
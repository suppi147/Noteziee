<?php
require_once("CommentController.php");
class SelectAllComment extends CommentController{
    function __construct(){
  
	parent::__construct();
    }

    function SelectAllIDStackUp($boxChecker){
        parent:$this->Connect2DB();
        if($boxChecker=="true"){
            $query="SELECT id FROM CommentTable";
            $statement= $this->connect->prepare($query);
            $statement->execute();
            $result=$statement->fetchAll();
            foreach($result as $data){
                $query="INSERT INTO IDBlock(block)VALUES (".$data['id'].")";
                $trigger=$this->connect->prepare($query);
                $trigger->execute();
            }
        }
        else{
            $query="DELETE FROM IDBlock";
            $statement= $this->connect->prepare($query);
            $statement->execute();
        }
        
        $this->Disconnect2DB();
    }
}
?>
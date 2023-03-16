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
        
        $query="SELECT * FROM IDBlock";
        $statement= $this->connect->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll();
        foreach($result as $data){
            array_push($this->filterIDBlock,$data['block']);
            
        }
        $this->filterIDBlock = implode(',',$this->filterIDBlock);
        echo $this->filterIDBlock;
        $query="DELETE FROM CommentTable WHERE id IN(".$this->filterIDBlock.")";
        $statement= $this->connect->prepare($query);
        $statement->execute();

        $query="DELETE FROM IDBlock";
        $statement= $this->connect->prepare($query);
        $statement->execute();

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
                $query="SELECT EXISTS(SELECT * FROM IDBlock WHERE block=".$this->filterID.")";
                $statement= $this->connect->prepare($query);
                $statement->execute();
                $result=$statement->fetchAll();
                foreach($result as $data){
                if($data[0]==0){
                $query="INSERT INTO IDBlock(block)VALUES (:block)";
                $trigger=$this->connect->prepare($query);
                $trigger->execute(
                     array(
                      ':block'=>$this->filterID
                          )
                    );
                }
            }
                
        }
        else{
            $query="DELETE FROM IDBlock WHERE block=\"".$this->filterID."\"";
            $statement= $this->connect->prepare($query);
            $statement->execute();
        }
        
        $this->Disconnect2DB();
    }
}
?>
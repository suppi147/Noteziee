<?php
require_once("CommentController.php");
class FetchComment extends CommnentController{
    function __construct(){
        parent::__construct();
    }

    function Fetch(){
        parent:$this->Connect2DB();


        $query="SELECT * FROM CommentTable";
        $statement= $this->connect->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll();
        foreach($result as $data){
			$this->commentPie[$this->commentCount]=$data["commentItem"];
			$this->commentCount++;
		}
    }
}
?>

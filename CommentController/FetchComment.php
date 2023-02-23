<?php
require_once("CommentController.php");
class FetchComment extends CommentController{
    protected $commentPie;

    function __construct(){
	$commentPie=array();
	parent::__construct();
    }

    function Fetch(){
        parent:$this->Connect2DB();

        $query="SELECT * FROM CommentTable";
        $statement= $this->connect->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll();
        foreach($result as $data){
			$this->commentPie[]=$data["commentItem"];
		}
        return $this->commentPie;
    }
}
?>
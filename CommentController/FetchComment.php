<?php
require_once("CommentController.php");
class FetchComment extends CommentController{
    protected $commentPie;
    protected $idPie;

    function __construct(){
	$this->commentPie=array();
    $this->idPie=array();
	parent::__construct();
    }

    

    function Fetch(){
        parent:$this->Connect2DB();

        $query="SELECT * FROM CommentTable ORDER BY id DESC";
        //$statement= $this->connect->prepare($query);
        //$statement->execute();
        //$result=$statement->fetchAll();
        $result=$this->InteractCommentDB->FetchFromDB($query);
        foreach($result as $data){
			$this->commentPie[$data["id"]]=$data["commentItem"];
		}
        $this->Disconnect2DB();
        return $this->commentPie;
    }
}
?>

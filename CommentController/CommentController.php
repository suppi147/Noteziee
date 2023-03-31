<?php
include __DIR__.'/../DatabaseInteraction/DatabaseController.php';
class CommentController{

    public $InteractCommentDB;
    public $indexLocation="http://localhost/Noteziee/CommentUI/index/index.php";

    function __construct(){
        $this->InteractCommentDB=new DatabaseController();
    }

    function Connect2DB(){
     
        try{
            $this->InteractCommentDB->Connect2DB();
        }
        catch(PDOException $e){
            echo"Connection failed: ".$e->getMessage();
        }    
    }
    function Disconnect2DB(){
	$this->InteractCommentDB->Disconnect2DB();
    }


}
?>

<?php
include __DIR__.'/../DatabaseInteraction/DatabaseController.php';
class CommentController{

    protected $InteractCommentDB;
    public $indexLocation="http://localhost/Noteziee/CommentUI/index/index.php";

    function __construct(){
        $this->InteractCommentDB=new DatabaseController();
    }

    function Connect2DB(){
        $hostname="localhost";
        $dbname="CommentDB";
        $username="root";
        $password="uitcisco";
        try{
            $this->InteractCommentDB->Connect2DB($hostname,$dbname,$username,$password);
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

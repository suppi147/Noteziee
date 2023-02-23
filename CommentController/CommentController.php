<?php
class CommentController{
    protected $connect;
    public $indexLocation="http://localhost/Noteziee/CommentUI/index/index.php";

    function __construct(){
        $connect=null;
    }

    function Connect2DB(){
        $hostname="localhost";
        $dbname="CommentDB";
        $username="root";
        $password="uitcisco";
        try{
            $this->connect=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password) or die("Can't connect to Database");
        }
        catch(PDOException $e){
            echo"Connection failed: ".$e->getMessage();
        }    
    }
    function Disconnect2DB(){
	$this->connect=null;
    }


}
?>
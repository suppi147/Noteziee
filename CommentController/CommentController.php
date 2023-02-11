<?php
class CommnentController{
    protected $connect;
    protected $commentPie;
    protected $commentCount;
    

    function __construct(){
        $connect=null;
        $commentPie=array();
        $commentCount=0;
    }

    function Connect2DB(){
        $hostname="localhost";
        $dbname="CommentDB";
        $username="root";
        $password="uitcisco";

        try{
            $this->connect=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password) or die("Can't connect to Database");
        }
        catch(PDOException $error){
            echo"Connection failed: ".$error->getMessage();
        }
        
    }
}

?>
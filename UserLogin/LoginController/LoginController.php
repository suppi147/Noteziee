<?php
class LoginController{
    protected $connect;
    protected $username;
    protected $password;
    function __construct(){
        $this->username="NULL";
        $this->password="NULL";
        $this->connect=null;
    }
    function GetUsername(){
        return $this->username;
    }

    function GetPassword(){
        return $this->password;
    }


    function Connect2DB(){
        $hostname="localhost";
        $dbname="loginDB";
        $username="loginuser";
        $password="password";
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
$a=new LoginController();
$a->Connect2DB();
?>
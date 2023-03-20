<?php
include __DIR__.'/../../DatabaseInteraction/DatabaseController.php';
class LoginController{
    protected $InteractCommentDB;
    protected $username;
    protected $password;
    function __construct(){
        $this->username="NULL";
        $this->password="NULL";

        $this->InteractCommentDB= new  DatabaseController();
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
        $this->InteractCommentDB->Connect2DB($hostname,$dbname,$username,$password);
    }
    function Disconnect2DB(){
        $this->InteractCommentDB->Disconnect2DB();
    }

    

}
?>
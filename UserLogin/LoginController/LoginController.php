<?php

include __DIR__.'/SessionManager/SessionManager.php';
include __DIR__.'/../../LimitationControl/LimitAccount.php';
//include __DIR__.'/../../DatabaseInteraction/UpdateDatabase.php';
class LoginController{
    protected $InteractCommentDB;
    protected $username;
    protected $password;
    protected $session;
    function __construct(){
        $this->username="NULL";
        $this->password="NULL";
        $this->InteractCommentDB= new DatabaseController();
        $this->session= new SessionManager();
    }
    function GetUsername(){
        return $this->username;
    }

    function GetPassword(){
        return $this->password;
    }


    function Connect2loginDB(){
        $hostname="localhost";
        $dbname="LoginDB";
        $username="loginuser";
        $password="";
        $this->InteractCommentDB->SetDBInformation($hostname,$dbname,$username,$password);
        $this->InteractCommentDB->Connect2DB();
    }
    function Disconnect2loginDB(){
        $this->InteractCommentDB->Disconnect2DB();
    }
}
?>
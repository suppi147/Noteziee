<?php
//include __DIR__.'/../DatabaseInteraction/DatabaseController.php';

class TableAccessController {
    protected $tableName;
    protected $connect2users;


    function __construct(){
        $this->tableName="NULL";
        $this->connect2users=new DatabaseController();
    }

    private function Connect2LoginDB(){
        $hostname="localhost";
        $dbname="loginDB";
        $username="loginuser";
        $password="password";
        $this->connect2users->Connect2DB($hostname,$dbname,$username,$password);
    }

    private function Disconnect2LoginDB(){
        $this->connect2users->Disconnect2DB();
    }


    function GetTableID($username,$password){
        $this->Connect2LoginDB();
        $query='SELECT noteTableID FROM users WHERE username="'.$username.'" AND password="'.$password.'"';
        $result=$this->connect2users->FetchFromDB($query);
        foreach($result as $noteTableID){
            $this->tableName=$noteTableID['noteTableID'];
        }
    }
}
?>
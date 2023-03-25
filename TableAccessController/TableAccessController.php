<?php
//include __DIR__.'/../DatabaseInteraction/DatabaseController.php';
define("HEAD_PASS_LOCK",'3498s23n*3u21bh');
define("TAIL_PASS_LOCK",'*&^&#$*KJkj@%33');
class TableAccessController {
    protected $tableName;
    protected $connect2users;

    protected $hostname;
    protected $dbname;
    protected $username;
    protected $password;

    function __construct(){
        $this->tableName="NULL";
        $this->connect2users=new DatabaseController();

        $this->hostname="localhost";
        $this->dbname="loginDB";
        $this->username="root";
        $this->password="uitcisco";
    }

    private function Connect2LoginDB(){
        
        $this->connect2users->Connect2DB($this->hostname,$this->dbname,$this->username,$this->password);
    }

    private function Disconnect2LoginDB(){
        $this->connect2users->Disconnect2DB();
    }


    function GetNotingTableID($username,$password){
        $this->Connect2LoginDB();
        $query='SELECT noteTableID FROM users WHERE username="'.$username.'" AND password="'.$password.'"';
        $result=$this->connect2users->FetchFromDB($query);
        foreach($result as $noteTableID){
            $this->tableName=$noteTableID['noteTableID'];
        }
        $this->Disconnect2LoginDB();
        return $this->tableName;
    }

    function CreateNotingTableForUser(){
        $this->dbname="CommentDB";
        $this->Connect2LoginDB();
        $this->password=hash("sha256",HEAD_PASS_LOCK.$this->tableName.TAIL_PASS_LOCK);

        $createNewUserQuery='CREATE USER \''.$this->tableName.'\'@\''.$this->hostname.'\' IDENTIFIED BY \''.$this->password.'\'';
        $this->connect2users->Update2DB($createNewUserQuery);

        //create table
        $createUserTableQuery='CREATE TABLE CommentTable'.$this->tableName.'(id TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT, commentItem text)';
        $this->connect2users->Update2DB($createUserTableQuery);
        $createIDBlockQuery='CREATE TABLE IDBlock'.$this->tableName.'(block varchar(255) NOT NULL)';
        $this->connect2users->Update2DB($createIDBlockQuery);

        //grant prvilege
        $grantUserTableQuery='GRANT INSERT,UPDATE,DELETE,SELECT ON CommentDB.CommentTable'.$this->tableName.' TO \''.$this->tableName.'\'@\''.$this->hostname.'\'';
        $this->connect2users->Update2DB($grantUserTableQuery);
        $grantIDBlockQuery='GRANT INSERT,UPDATE,DELETE,SELECT ON CommentDB.IDBlock'.$this->tableName.' TO \''.$this->tableName.'\'@\''.$this->hostname.'\'';
        $this->connect2users->Update2DB($grantIDBlockQuery);

        $this->Disconnect2LoginDB();

    } 
}
?>
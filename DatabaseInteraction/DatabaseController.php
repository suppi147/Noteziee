<?php
class DatabaseController{
    protected $connect;
    protected $hostname;
    protected $dbname;
    protected $username;
    protected $password;

    function __construct(){
        $this->connect=null;
        $this->hostname="NULL";
        $this->dbname="NULL";
        $this->username="NULL";
        $this->password="NULL";
    }

    function Connect2DB($hostname,$dbname,$username,$password){

        $this->hostname=$hostname;
        $this->dbname=$dbname;
        $this->username=$username;
        $this->password=$password;
        
        try{
            $this->connect=new PDO("mysql:host=$this->hostname;dbname=$this->dbname",$this->username,$this->password) or die("Can't connect to Database");
        }
        catch(PDOException $e){
            echo"Connection failed: ".$e->getMessage();
        }
        return $this->connect;
    }
    function Disconnect2DB(){
	$this->connect=null;
    }

    function Update2DB($query){
        if($this->connect !== null){
            $trigger= $this->connect->prepare($query);
            $trigger->execute();
        }
        else{
            echo "Cannot interact with DB.";
        }
    }

    function FetchFromDB($query){
        if($this->connect !== null){
            $trigger= $this->connect->prepare($query);
            $trigger->execute();
            return $trigger->fetchAll();
        }
        else{
            echo "Cannot interact with DB.";
        }
    }

    function CheckFromDB($query){
        if($this->connect !== null){
            $trigger= $this->connect->prepare($query);
            $trigger->execute();
            if($trigger->rowCount()>0){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            echo "Cannot interact with DB.";
        }
    }
}


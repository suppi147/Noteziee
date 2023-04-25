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

    public function SetDBInformation($hostname,$dbname,$username,$password){
        $this->hostname=$hostname;
        $this->dbname=$dbname;
        $this->username=$username;
        $this->password=$password;
    }
    function Connect2DB(){
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
            echo "Cannot update with DB.";
        }
    }

    function FetchFromDB($query){
        if($this->connect !== null){
            $trigger= $this->connect->prepare($query);
            $trigger->execute();
            return $trigger->fetchAll();
        }
        else{
            echo "Cannot fetch with DB.";
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
            echo "Cannot check with DB.";
        }
    }
}
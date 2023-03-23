<?php
require_once("FilterCredential.php");
require_once("LoginController.php");
class UpdateCredential extends LoginController{
    protected $noteTableID;

    function __construct(){
        $this->noteTableID="NULL";
        parent::__construct();
    }

    function Insert2LoginDB($username,$password){

        $filter= new FilterCredential();
        $filter->FilterEmailPassword($username,$password);
        $this->username=$filter->GetUsername();
        $this->password=$filter->GetPassword();
        
        if($filter->CheckRecordExist()){
            echo 'record exist';
        }
        else{
            $this->Connect2loginDB();
            $this->noteTableID=uniqid();
            $query='INSERT INTO users(username,password,noteTableID) VALUES ("'.$this->username.'","'.$this->password.'","'.$this->noteTableID.'")';
            $this->InteractCommentDB->Update2DB($query);

            $this->Disconnect2loginDB();
        }
    }

}
$a =new UpdateCredential();
$a->Insert2LoginDB($_POST["email"],$_POST["password"]);
?>
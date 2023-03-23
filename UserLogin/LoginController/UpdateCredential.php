<?php
require_once("FilterCredential.php");
require_once("LoginController.php");
class UpdateCredential extends LoginController{
    function __construct(){
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

            $query='INSERT INTO users(username,password) VALUES ("'.$this->username.'","'.$this->password.'")';
            $this->InteractCommentDB->Update2DB($query);

            $this->Disconnect2loginDB();
        }
    }

}
$a =new UpdateCredential();
$a->Insert2LoginDB($_POST["email"],$_POST["password"]);
?>
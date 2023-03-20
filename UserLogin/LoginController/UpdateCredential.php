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
    }

}

?>
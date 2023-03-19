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
$a= new UpdateCredential();
$a->Insert2LoginDB('21313@dsfsf.ccds<script>alert(1)</script>','asdsad');

echo $a->GetUsername();
echo $a->GetPassword();

?>
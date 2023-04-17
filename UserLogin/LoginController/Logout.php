<?php
require_once("LoginController.php");

class logout extends LoginController{

    function __construct(){
        parent::__construct();
    }
    function DeleteSession(){
        
        $this->session->SessionDelete();
        header("location: http://localhost/Noteziee/Homepage/");
    }
}
$logoutTrigger= new logout();
$logoutTrigger->DeleteSession();

?>
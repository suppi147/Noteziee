<?php
include __DIR__.'/../../CommentController/FilterComment.php';
require_once("LoginController.php");
class FilterCredential extends LoginController{

    function __construct(){
        parent::__construct();
    }
    function FilterEmailPassword($username,$password){
        $characterFilterEmail= new FilterComment();
        $characterFilterPassword= new FilterComment();
        if($characterFilterEmail->FilterComment($username) && $characterFilterPassword->FilterComment($password)){
            $this->username = $characterFilterEmail->GetItemfiltering();
            $this->password = $characterFilterPassword->GetItemfiltering();
            
        }
    }
    

}
?>
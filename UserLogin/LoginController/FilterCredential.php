<?php
include __DIR__.'/../../CommentController/FilterComment.php';
require_once("LoginController.php");
class FilterCredential extends LoginController{

    function __construct(){
        parent::__construct();
    }


    function CheckRecordExist(){
        $this->Connect2loginDB();
        $query='SELECT id FROM users WHERE username="'.$this->username.'"';
        $Checkflag=$this->InteractCommentDB->CheckFromDB($query);
        $this->Disconnect2loginDB();
        return $Checkflag;
    }

    function FilterEmail($username){
        $characterFilterEmail= new FilterComment();
        if($characterFilterEmail->FilterComment($username)){
            $this->username = $characterFilterEmail->GetItemfiltering();    
        }

        if(!(filter_var($this->username, FILTER_VALIDATE_EMAIL))){
            echo 'email invalid';
            exit();
        }
    }
}
?>
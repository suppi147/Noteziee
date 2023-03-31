<?php
include __DIR__.'/../../CommentController/FilterComment.php';
require_once("LoginController.php");
class FilterCredential extends LoginController{

    function __construct(){
        parent::__construct();
    }

    function FilterEmail(){
        if(!(filter_var($this->username, FILTER_VALIDATE_EMAIL))){
            echo 'email invalid';
            exit();
        }
    }


    function bcryptHash(){
        $options = [
            'cost' => 12
        ];
        $this->password = password_hash($this->password, PASSWORD_BCRYPT, $options);
    }

    function CheckRecordExist(){
        $this->Connect2loginDB();
        $query='SELECT id FROM users WHERE username="'.$this->username.'"';
        $Checkflag=$this->InteractCommentDB->CheckFromDB($query);
        $this->Disconnect2loginDB();
        return $Checkflag;
    }

    function FilterEmailPassword($username,$password){
        $characterFilterEmail= new FilterComment();
        $characterFilterPassword= new FilterComment();
        if($characterFilterEmail->FilterComment($username) && $characterFilterPassword->FilterComment($password)){
            $this->username = $characterFilterEmail->GetItemfiltering();    
            $this->password = $characterFilterPassword->GetItemfiltering();   
        }

        $this->FilterEmail();
        $this->bcryptHash();
    }
}
?>
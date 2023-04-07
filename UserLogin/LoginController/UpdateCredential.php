<?php
require_once("FilterCredential.php");
require_once("LoginController.php");
require_once("SessionManager.php");
include __DIR__.'/../../TableAccessController/TableAccessController.php';

class UpdateCredential extends LoginController{
    protected $noteTableID;
    protected $userNoteTable;

    function __construct(){
        $this->noteTableID="NULL";
        $this->userNoteTable= new TableAccessController();
        parent::__construct();
    }

    function Insert2LoginDB($username,$password=0){

        $filter= new FilterCredential();
        $filter->FilterEmailPassword($username,$password);
        $this->username=$filter->GetUsername();
        $this->password=$filter->GetPassword();
        
        if($filter->CheckRecordExist()){
            $this->session->StartSession();
            $_SESSION['username']=$this->userNoteTable->GetNotingTableID($this->username);
            $_SESSION['password']=$this->userNoteTable->GetNotingTablePassword();
            header("location: http://localhost/Noteziee/CommentUI/index/");
        }
        else{
            $this->Connect2loginDB();
            $this->noteTableID=uniqid();
            $query='INSERT INTO users(username,password,noteTableID) VALUES ("'.$this->username.'","'.$this->password.'","'.$this->noteTableID.'")';
            $this->InteractCommentDB->Update2DB($query);
            $this->userNoteTable->CreateNotingTableForUser($this->noteTableID);

            $this->Disconnect2loginDB();
            $this->session->StartSession();
            $_SESSION['username']=$this->userNoteTable->GetNotingTableID($this->username);
            $_SESSION['password']=$this->userNoteTable->GetNotingTablePassword();
            header("location: http://localhost/Noteziee/CommentUI/index/");
        }
        
    }

}
?>
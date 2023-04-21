<?php
require_once('LimitationControl.php');
include __DIR__.'../../DatabaseInteraction/DatabaseController.php';


class LimitAccount extends LimitationControl{
    protected $maxAccount;
    protected $interactWithDB;
    

    function __construct(){
        $this->maxAccount=0;
        $this->interactWithDB=new DatabaseController();
    }

    function CheckForLimit(){
        $this->interactWithDB->SetDBInformation("localhost","LoginDB","loginuser","password");
        $this->interactWithDB->Connect2DB();
        $countRowQuery="SELECT COUNT(*) FROM users";
        $result=$this->interactWithDB->FetchFromDB($countRowQuery);
        foreach($result as $noteTableID){
            $this->maxAccount=$noteTableID['COUNT(*)'];
        }
        if($this->maxAccount>=ACCOUNT_LIMIT){
            header(ACCOUNTCROSS);
            exit();
        }
        $this->interactWithDB->Disconnect2DB();
    }
}
?>
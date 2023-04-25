<?php
require_once('LimitationControl.php');



class LimitAllNote extends LimitationControl{
    protected $maxAllNote;
    protected $noteTableID;
    protected $interactWithDB;
    

    function __construct($noteTableID){
        $this->maxAllNote=0;
        $this->interactWithDB=new DatabaseController();
        $this->noteTableID=$noteTableID;
    }

    function CheckForLimit(){
        $this->interactWithDB->SetDBInformation("localhost","CommentDB","loginuser","password");
        $this->interactWithDB->Connect2DB();
         
        $countRowQuery="SELECT COUNT(*) FROM CommentTable".$this->noteTableID;
        $result=$this->interactWithDB->FetchFromDB($countRowQuery);
        foreach($result as $numberOfNote){
            $this->maxAllNote=$numberOfNote['COUNT(*)'];
        }
        if($this->maxAllNote>=NUMBEROF_NOTE_LIMIT){
            echo $this->maxAllNote;
            header(ALLCOMMENTCROSS);
            exit();
        }
        
        $this->interactWithDB->Disconnect2DB();
    }
}

?>
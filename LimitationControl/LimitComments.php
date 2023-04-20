<?php
require_once('LimitationControl.php');


class LimitComments extends LimitationControl{
    protected $maxComment;

    function __construct($comment){
        $this->maxComment=$comment;
    }

    function CheckForLimit(){
        if(strlen($this->maxComment) > COMMENT_TYPE_LIMIT){
            $_POST=array();
            header(COMMENTCROSS);
            exit();
        }
    }
}
?>
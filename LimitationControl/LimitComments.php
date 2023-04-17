<?php
require_once('LimitationControl.php');


class LimitComments extends LimitationControl{
    protected $maxComment;

    function __construct(){
        $this->maxComment=COMMENT_TYPE_LIMIT;
    }

    function CheckForLimit($comment){
        if(strlen($comment) > COMMENT_TYPE_LIMIT){
            $_POST=array();
            header(COMMENTCROSS);
            exit();
        }
    }
}
?>
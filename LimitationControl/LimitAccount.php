<?php
require_once('LimitationControl.php');


class LimitAccount extends LimitationControl{
    protected $maxComment;

    function __construct(){
        $this->maxComment=COMMENT_TYPE_LIMIT;
    }

    function CheckForLimit(){
        
    }
}
?>
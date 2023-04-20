<?php
define('COMMENTCROSS',"location: http://localhost/Noteziee/SomethingGoesWrong/PolicyViolation/NoteLimitCross");

define('COMMENT_TYPE_LIMIT',20000);
abstract class LimitationControl{
    abstract protected function CheckForLimit();
}
?>
<?php
define('COMMENTCROSS',"location: http://localhost/Noteziee/SomethingGoesWrong/PolicyViolation/NoteLimitCross");
define('ACCOUNTCROSS',"location: http://localhost/Noteziee/SomethingGoesWrong/PolicyViolation/AccountLimitCross");
define('ALLCOMMENTCROSS',"location: http://localhost/Noteziee/SomethingGoesWrong/PolicyViolation/AllNoteLimitCross");
define('COMMENT_TYPE_LIMIT',20000);
define('ACCOUNT_LIMIT',50);
define('NUMBEROF_NOTE_LIMIT',50);


abstract class LimitationControl{

    abstract protected function CheckForLimit();
}
?>
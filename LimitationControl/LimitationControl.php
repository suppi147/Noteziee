<?php
define('COMMENTCROSS',"location: http://localhost/Noteziee/SomethingGoesWrong/PolicyViolation/NoteLimitCross");
define('ACCOUNTCROSS',"location: http://localhost/Noteziee/SomethingGoesWrong/PolicyViolation/AccountLimitCross");
define('COMMENT_TYPE_LIMIT',20000);
define('ACCOUNT_LIMIT',3);


abstract class LimitationControl{

    abstract protected function CheckForLimit();
}
?>
<?php
class SessionManager{

    function __construct(){
    }

    function StartSession(){
        session_start();
    }


    function EndSession(){
        session_destroy();
    }
}
?>
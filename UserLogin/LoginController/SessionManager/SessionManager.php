<?php
class SessionManager{
    function __construct(){

    }

    function SessionStart(){
        // Set the session cookie parameters
        $sessionParams = session_get_cookie_params();
        $sessionParams["httponly"] = true;
        $sessionParams["lifetime"]=500;
        ini_set('session.cookie_samesite', 'Lax');

        // Set the session cookie parameters
        session_set_cookie_params(
            $sessionParams["lifetime"],
            $sessionParams["path"],
            $sessionParams["domain"],
            $sessionParams["secure"],
            $sessionParams["httponly"]
        );

        session_start();
    }
    function IsSessionExpired(){
        if(!isset($_SESSION['username'])&&!isset($_SESSION['password']))
        header("location: http://localhost/Noteziee/SomethingGoesWrong/SessionExpired/");
    }
    function SessionDelete(){
        $_SESSION = array(); // unset all session variables

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]); // unset the session cookie
        }

        session_destroy(); // destroy the session completely
    }
}
?>
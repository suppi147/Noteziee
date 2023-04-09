<?php
class SessionManager{
    function __construct(){

    }

    function SessionRegenerate(){
        session_regenerate_id();
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
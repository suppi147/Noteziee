<?php
class SessionManager{
    function __construct(){

    }

    function SessionStart(){
        // Set the session cookie parameters
        session_set_cookie_params([
            'lifetime' => 604800,
            'path' => '/Noteziee/CommentUI/index/',
            'domain' => 'localhost',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict'
        ]);
        session_start();
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
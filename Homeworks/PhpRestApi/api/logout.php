<?php

function logout(){ 
    try {
        session_start();
        setcookie($_COOKIE["PHPSESSID"], null, time() -1);
        session_destroy();
    } catch (Exception $e){
        return error(500, "Server error when destroying the session!");
    }
    return response(200, "Logged out!");
}
?>
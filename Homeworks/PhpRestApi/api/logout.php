<?php

function logout(){
    session_start();
    if(isset($_SESSION)){
        try {
            setcookie(session_name(), session_id(), time() - 1);
            session_destroy();
        } catch (Exception $e){
            return error(500, "Server error when destroying the session!");
        }
    }
    return response(200, "Logged out!");
}
?>
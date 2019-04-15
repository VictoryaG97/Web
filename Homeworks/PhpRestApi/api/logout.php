<?php
include dirname(__FILE__).'\..\common\base.php';

if (isset($_SESSION['login_user'])){
    try {
        session_start();
        session_destroy();
    } catch (Exception $e){
        echo error(500, "Server error when destroying the session!");
        exit();
    }
}

if (isset($_COOKIE['email']) && isset($_COOKIE['password']) && isset($_COOKIE['role'])){
    try {
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];

        setcookie('email', $email, time()-1);
        setcookie('password', $password, time()-1);
        setcookie('role', $password, time()-1);
    } catch (Exception $e) {
        echo error(500, "Server error when destroying the cookie!");
        exit();
    }
}
echo response(200, "Logged out!");
?>
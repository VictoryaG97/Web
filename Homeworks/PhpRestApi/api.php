<?php
include "common/base.php";
include "api/register.php";
include "api/login.php";

function register(){
    $input = json_decode(file_get_contents('php://input'), TRUE);

    if (isset($input["email"]) && isset($input["first_name"]) &&
    isset($input["last_name"]) && isset($input["password"])) {
        return registration($input);
    } else {
        return error(400, "Requred parameter missing");
    }
}

function login(){
    $input = json_decode(file_get_contents('php://input'), TRUE);

    if (isset($input["email"]) && isset($input["password"])) {
        return login($input);
    } else {
        return error(400, "Requred parameter missing");
    }
}

function logout(){
    if (isset($input["email"]) && isset($input["password"])) {
        return login($input);
    } else {
        return error(400, "Requred parameter missing");
    }
}
?>
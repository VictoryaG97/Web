<?php
include "api/register.php";
include "api/login.php";
include "api/logout.php";
include "api/users.php";

$input = json_decode(file_get_contents('php://input'), TRUE);
$path = strtolower(trim(str_replace("/","", $_SERVER["PATH_INFO"])));
$method = $_SERVER["REQUEST_METHOD"];

if ($path == "register" && $method == "POST"){
    if (isset($input["email"]) && isset($input["first_name"]) &&
    isset($input["last_name"]) && isset($input["password"])) {
        echo registration($input);
    } else {
        echo error(400, "Requred parameter missing");
    }
} elseif ($path == "login" && $method == "POST"){
    if (isset($input["email"]) && isset($input["password"])) {
        echo login($input);
    } else {
        echo error(400, "Requred parameter missing");
    }
} elseif ($path == "logout" && $method == "GET"){
    echo logout($input);
} elseif ($path == "users" && $method == "GET"){
    echo get_all_users();
} elseif ($path == "user" && $method == "DELETE"){
    echo delete_user($email);
}
?>
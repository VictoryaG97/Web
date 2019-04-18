<?php
include "api/register.php";
include "api/login.php";
include "api/logout.php";
include "api/users.php";
include "api/user.php";

$input = json_decode(file_get_contents('php://input'), TRUE);

if (substr_count($_SERVER["PATH_INFO"], "/") > 1){
    $temp = explode("/", $_SERVER["PATH_INFO"]);
    $path = $temp[1];
    $to_delete = $temp[2];
} else {
    $path = strtolower(trim(str_replace("/","", $_SERVER["PATH_INFO"])));
}

$method = $_SERVER["REQUEST_METHOD"];

if ($path == "register" && $method == "POST"){
    if (isset($input["email"]) && isset($input["first_name"]) &&
    isset($input["last_name"]) && isset($input["password"])) {
        echo registration($input);
    } else {
        echo error(400, "Required parameter missing");
    }
} elseif ($path == "login" && $method == "POST"){
    if (isset($input["email"]) && isset($input["password"])) {
        echo login($input);
    } else {
        echo error(400, "Required parameter missing");
    }
} elseif ($path == "logout" && $method == "GET"){
    echo logout();
} elseif ($path == "users" && $method == "GET"){
    # still doesn't check if the user is logged or has the right
    echo get_all_users();
} elseif ($path == "user" && $method == "DELETE"){
    if (isset($to_delete)){
        echo delete_user($to_delete);
    } else {
        echo error(400, "Required parameter missing");
    }
} else {
    echo error(400, "Method or path are not correct!");
}
?>
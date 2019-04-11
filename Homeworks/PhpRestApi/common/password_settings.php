<?php
$salt_lenght = 32;

function generateSalt(){
    global $salt_lenght;
    return bin2hex(openssl_random_pseudo_bytes($salt_lenght));
}

function addSaltToPass($password, $salt){
    global $salt_lenght;
    
    if ($salt_lenght % 2 == 0) {
        $mid = $salt_lenght / 2;
    } else {
        $mid = ($salt_lenght - 1) / 2;
    }
    return substr($salt, 0, $mid - 1).$password.substr($salt, $mid, $salt_lenght - 1);
}
?>
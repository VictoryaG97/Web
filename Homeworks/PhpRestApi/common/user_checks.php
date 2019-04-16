<?php
include dirname(__FILE__)."\..\config\db_connect.php";

function emailValidation($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function userExists($email){
    global $conn;

    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        return true;
    }
    return false;
}
?>

<?php
include dirname(__FILE__).'\..\config\db_connect.php';
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

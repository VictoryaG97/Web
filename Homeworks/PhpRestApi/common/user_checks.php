<?php
function userExists($email){
    $q = "SELECT email FROM users WHERE email = ?";
    global $conn;
    
    $stmt = $conn->prepare($q);
    $stmt->execute([$email]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        return true;
    }
    return false;
}
?>

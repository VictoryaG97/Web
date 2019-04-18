<?php

function delete_user($email){
    global $conn;
    if (!userExists($email)) {
        echo error(404, "User not in the database");
    } else {
        try {
            $stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
            $stmt->execute([$email]);

            echo response(200, "User deleted");
        } catch(PDOException $e){
            echo error(500, $e->getMessage());
        }
    }
}
?>
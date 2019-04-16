<?php
include dirname(__FILE__)."\..\common\user_checks.php";
include dirname(__FILE__)."\..\common\base.php";

$response = array();
global $conn;

parse_str($_SERVER["QUERY_STRING"], $input);

if ($email = $input["email"]){
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
} else {
    echo error(400, "Invalid parameters");
}
?>
<?php
include dirname(__FILE__)."\..\common\user_checks.php";

$response = array();
global $conn;

parse_str($_SERVER["QUERY_STRING"], $input);

if ($email = $input["email"]){
    if (!userExists($email)) {
        $response["status"] = 404;
        $response["message"] = "User not in the database";
    } else {
        try {
            $stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $response["status"] = 200;
            $response["message"] = "User deleted";
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
} else {
    $response["status"] = 400;
    $response["message"] = "Invalid parameters";
}
echo json_encode($response);
?>
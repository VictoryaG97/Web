<?php
include 'Homeworks/PhpRestApi/common/user_checks.php';
include 'Homeworks/PhpRestApi/common/password_settings.php';

$response = array();

# get input params from the request
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
echo "INPUT: ".$input;

# check if all required params are set 
if (isset($input['email']) && isset($input['first_name']) &&
    isset($input['last_name']) && isset($input['password'])) {
        $email = $input['email'];
        $first_name = $input['first_name'];
        $last_name = $input['last_name'];
        $password = $input['password'];

        if (!userExists($email)) {
            $salt = generateSalt();
            $password_hash = password_hash(addSaltToPass($password, $salt), PASSWORD_DEFAULT);

            $insert_query = "INSERT INTO users(email, first_name, last_name, role, password_hash, salt) VALUES (?, ?, ?, ?, ?, ?)";
            if ($stmt = $conn->prepare($insert_query)){
                $stmt->execute([$email, $first_name, $last_name, "User", $password_hash, $salt]);
                $response["status"] = 200;
                $response["message"] = "User created";
                $stmt->close();
            }
        } else {
            $response["status"] = 409;
            $response["message"] = "User already exists";
        }
} else {
    $response["status"] = 400;
    $response["message"] = "Requred parameter missing";
}

echo json_encode($response);
?>
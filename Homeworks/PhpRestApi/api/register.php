<?php
include dirname(__FILE__).'\..\common\user_checks.php';
include dirname(__FILE__).'\..\common\password_settings.php';

$response = array();

# check if all required params are set 
if (isset($_POST['email']) && isset($_POST['first_name']) &&
    isset($_POST['last_name']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password = $_POST['password'];

        # check if user with this emal exists in the db and if not, add the user
        if (userExists($email)) {
            $response["status"] = 409;
            $response["message"] = "User already exists";
        } else {
            $salt = generateSalt();
            $password_hash = password_hash(addSaltToPass($password, $salt), PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users(
                email, first_name, last_name, password_hash, role, salt)
                VALUES (:email, :fname, :lname, :pass, :role, :salt)
            ");
            $stmt->execute([
                'email' => $email,
                'fname' => $first_name,
                'lname' => $last_name,
                'role'  => "User",
                'pass'  => $password_hash,
                'salt'  => $salt
            ]);
            $response["status"] = 200;
            $response["message"] = "User created";
        }
} else {
    $response["status"] = 400;
    $response["message"] = "Requred parameter missing";
}

echo json_encode($response);
?>
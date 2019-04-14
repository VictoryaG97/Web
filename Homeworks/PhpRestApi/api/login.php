<?php
include dirname(__FILE__).'\..\common\user_checks.php';
include dirname(__FILE__).'\..\common\password_settings.php';

$response = array();

# check if all required params are set 
if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        # check if user with this emal exists in the db and if not, add the user
        if (!userExists($email)) {
            $response["status"] = 404;
            $response["message"] = "User not in the database";
        } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if (password_verify(addSaltToPass($password, $row['salt']), $row['password_hash'])){
                    $response['status'] = 200;
                    $response['message'] = 'Logged in!';
                    $response['full name'] = $row['first_name'].' '.$row['last_name'];
                }
            }
        }
} else {
    $response["status"] = 400;
    $response["message"] = "Requred parameter missing";
}

echo json_encode($response);
?>
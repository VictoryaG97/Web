<?php
// include dirname(__FILE__)."\..\common\user.php";

function login($input){
    $email = $input["email"];
    $password = $input["password"];

    # check if user with this emal exists in the db and if not, add the user
    if (!userExists($email)) {
        return error(404, "User not in the database");
    } else {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if (password_verify($password, $row["password_hash"])){
                session_start();
                $_SESSION["email"] = $row["email"];
                $_SESSION["role"] = $row["role"];

                $message = $row["first_name"]." ".$row["last_name"]." logged in successfully as ".$row["role"];
                return response(200, $message);
            } else {
                return error(404, "Wrong password");
            }
        } else {
            return error(500, "Internal server error");
        }
    }
}
?>
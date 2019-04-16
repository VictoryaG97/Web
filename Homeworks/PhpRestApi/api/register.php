<?php
include dirname(__FILE__)."\..\common\user_checks.php";
include dirname(__FILE__)."\..\common\base.php";

function registration($input){
    if (emailValidation($input["email"])){
        $email = $input["email"];
        $first_name = $input["first_name"];
        $last_name = $input["last_name"];
        $password = $input["password"];

        # check if user with this emal exists in the db and if not, add the user
        if (userExists($email)) {
            return error(409, "User already exists");
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users(
                email, first_name, last_name, password_hash, role)
                VALUES (:email, :fname, :lname, :pass, :role)
            ");
            $stmt->execute([
                "email" => $email,
                "fname" => $first_name,
                "lname" => $last_name,
                "role"  => "User",
                "pass"  => $password_hash,
            ]);
            return response(200, "User created");
        }
    } else {
        return error(400, "Invalid email address");
    }
}
?>
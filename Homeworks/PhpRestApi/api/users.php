<?php

function get_all_users(){
    global $conn;
    $response = array();

    try{
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $response[] = [
                "Email" => $row["email"],
                "First Name" => $row["first_name"],
                "Last Name" => $row["last_name"]
            ];
        }
    } catch (PDOException $e) {
        return error(500, "Internal server error");
    }
    return response(200, $response);
}
?>
<?php
include dirname(__FILE__)."\..\config\db_connect.php";

$response = array();
global $conn;

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $response[] = array(
        "Email" => $row["email"],
        "First Name" => $row["first_name"],
        "Last Name" => $row["last_name"]
    );
}

echo json_encode($response);
?>
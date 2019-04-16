<?php
include dirname(__FILE__)."\..\config\db_connect.php";
include dirname(__FILE__)."\..\common\base.php";

global $conn;

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo response(200, array(
        "Email" => $row["email"],
        "First Name" => $row["first_name"],
        "Last Name" => $row["last_name"]
    ));
}
?>
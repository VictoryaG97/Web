<?php
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'mydatabase');
define('DB_USER', 'user');
define('DB_PASS', 'password');

try {
    $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASS);
} catch (PDOException $e) {
    print "Error: " . $e->getMessage() . "<br/>";
    die();
}
?>
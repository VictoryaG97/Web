<?php
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'manageusers');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASS);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage() . '<br/>';
    die();
}
?>  
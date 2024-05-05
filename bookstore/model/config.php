<?php
$dsn = 'mysql:host=test;dbname=123104618;charset=utf8';
$dbusername = 'root';
$dbpassword = '';

try {
    $db = new PDO($dsn, $dbusername, $dbpassword);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}
?>
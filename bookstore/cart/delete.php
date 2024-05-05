<?php
session_start();

$id = $_GET['cart_id'];
echo $id;

unset($_SESSION['books'][$id]);

header('location: index.php');

?>
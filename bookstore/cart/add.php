<?php
session_start();

require('../model/config.php');

$id = $_GET['a_id'];

$query = 'SELECT * FROM product WHERE id = :id';
$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();

//book number in cart is less than stock
if($_SESSION['books'][$id]['num'] < $product['quantity']){
    $_SESSION['books'][$id]['num']++;
}else{
    $_SESSION['books'][$id]['num'] = $product['quantity'];
}

header('location:index.php');
?>

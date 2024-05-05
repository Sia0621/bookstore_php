<?php
session_start();

require('../model/config.php');

$id = $_GET['book_id'];

$query = 'SELECT * FROM product WHERE id = :id';
$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();

//if cart is empty, add the book to cart, and set qty is 1
if(!isset($_SESSION['books'])){
    $_SESSION['books'][$id] = $product;
    $_SESSION['books'][$id]['num'] = 1;
}else {
    //To check if the added book is already in cart.
    foreach ($_SESSION['books'] as $book) {
        if ($book['id'] == $id) {
            $_SESSION['books'][$id]['num']++;
            break;
        }else{
            $_SESSION['books'][$id] = $product;
            $_SESSION['books'][$id]['num'] = 1;
        }
    }
}

//echo '<pre>';
//echo print_r($_SESSION['books']);
//echo '</pre>';
header('location: index.php');
?>
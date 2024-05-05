<?php 
session_start();

require('../model/config.php');

foreach ($_SESSION['books'] as $book){
    $query = 'INSERT INTO bookorder (user_id, book_id, quantity) VALUES (:user_id, :book_id, :quantity)';

    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $_SESSION['user_id']);
    $statement->bindValue(':book_id', $book['id']);
    $statement->bindValue(':quantity', $book['num']);
    $statement->execute();
    
}
$statement->closeCursor();

$_SESSION['books'] = array();
header('location: index.php');
?>
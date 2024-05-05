<?php
require('../../model/config.php');
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
// Delete the product from the database
if ($user_id != false) {
    $query = 'DELETE FROM user WHERE id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $success = $statement->execute();
    $statement->closeCursor();
}
// Display the Product List page
include('index.php');


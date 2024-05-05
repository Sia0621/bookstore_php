<?php
require('../../model/config.php');
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
// Delete the order from the database
if ($id != false) {
    $query = 'DELETE FROM bookorder WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $success = $statement->execute();
    $statement->closeCursor();
}
// Display the order List page
include('index.php');
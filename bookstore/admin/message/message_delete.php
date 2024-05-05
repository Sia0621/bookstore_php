<?php
require('../../model/config.php');
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
// Delete the message from the database
if ($id != false) {
    $query = 'DELETE FROM message WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $success = $statement->execute();
    $statement->closeCursor();
}
// Display the Product List page
include('index.php');


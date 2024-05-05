<?php
// Get the user data
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');

// Validate inputs
if ($id == null || $name == null || $password == false || $email == null || $address == null) {
    $error = "Invalid user data. Check all fields and try again.";
    include('../../errors/error.php');
} else {
    require('../../model/config.php');
    // Add the product to the database
    $query = 'UPDATE user SET username = :username, password = :password, email = :email, address = :address WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':username', $name);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':address', $address);
    $statement->execute();
    $statement->closeCursor();
// Display the Product List page
    include('index.php');
}?>




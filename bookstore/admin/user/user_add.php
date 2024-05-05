<?php
// Get the user data
$name = filter_input(INPUT_POST, 'name');
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');

// Validate inputs
if ($name == null || $password == false || $email == null || $address == null) {
    $error = "Invalid user data. Check all fields and try again.";
    include('../../errors/error.php');
} else {
    require('../../model/config.php');
    // Add the product to the database
    $query = 'INSERT INTO user 
    (username, password, email, address, isadmin) VALUES
    (:username, :password, :email, :address, 1)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $name);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':address', $address);
    $statement->execute();
    $statement->closeCursor();
// Display the Product List page
    include('index.php');
}?>



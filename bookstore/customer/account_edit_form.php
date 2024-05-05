<?php
include '../view/header.php';

require('../model/config.php');

$user_id = $_SESSION['user_id'];

if($user_id != false){
    $query = 'SELECT * FROM user WHERE id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>My Account</title>
</head>
<body>

<div class="ctgry-Header">
    <h2 style="text-align: center">My Account</h2>
</div>

<div class="account-left">
    <ul>
        <li><a href="account.php">Dashboard</a></li>
        <li><a href="account_order.php">My Orders</a></li>
        <li><a href="account_edit_form.php">Edit</a></li>
    </ul>
</div>

<div class="account-right">
<form action="account_edit.php" method="post" id="add_product_form">
<div class="account-table">
<table class="myTable">
    <tr>
        <td>
        <label>Name:</label>
        </td>
        <td>
        <input type="text" name="name" value="<?php echo $user['username']; ?>"><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Password:</label>
        </td>
        <td>
        <input type="text" name="password" value="<?php echo $user['password']; ?>"><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Email:</label>
        </td>
        <td>
        <input type="text" name="email" value="<?php echo $user['email']; ?>"><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Address:</label>
        </td>
        <td>
        <input type="text" name="address" value="<?php echo $user['address']; ?>"><br>
        </td>
    </tr>
</table>   
<label>&nbsp;</label>
<input type="hidden" name="id" value="<?php echo $user['id']; ?>"><br>
<input type="submit" value="Edit" class="accountButton">
</div>
</div>
</body>
</html>
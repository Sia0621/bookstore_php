<?php
require('../../model/config.php');

$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
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
    <link rel="stylesheet" href="../../style.css">
    <title>Document</title>
</head>
<body>

<h1 class="cms-header">Edit Users</h2>
<form action="user_edit.php" method="post" id="add_product_form">
<div class="edit-table">
<table class="editTable">
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
<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
<input type="submit" value="Edit" class="editButton"><br>
</div>
</body>
</html>

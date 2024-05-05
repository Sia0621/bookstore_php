<?php
include '../view/header.php';

require('../model/config.php');

$user_id = $_SESSION['user_id'];

if($user_id != false){
    $query = 'SELECT product.title, product.img_path, bookorder.quantity FROM bookorder 
              JOIN user ON bookorder.user_id = user.id 
              JOIN product ON bookorder.book_id = product.id
              WHERE user.id = :user_id;';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $orders = $statement->fetchAll();
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
<div class="order-main">
<div class="order-table">
<table>
        <tr>
            <th>&nbsp;</th>
            <th>Book Title</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td>
                <img src=<?php echo $order['img_path']; ?> height="200px">
                </td>
                <td><?php echo $order['title']; ?></td>
                <td><?php echo $order['quantity']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
</div>

</body>
</html>
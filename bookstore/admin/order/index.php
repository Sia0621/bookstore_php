<?php
require('../../model/config.php');

// $query = 'SELECT * FROM bookorder ORDER BY id';
$query = 'SELECT bookorder.id, user.id as user_id, user.username, product.id as book_id, product.title, bookorder.quantity FROM bookorder 
          JOIN user ON bookorder.user_id = user.id 
          JOIN product ON bookorder.book_id = product.id;';
$statement = $db->prepare($query);
$statement->execute();
$orders = $statement->fetchAll();
$statement->closeCursor();
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
<h1 class="cms-header">All Orders</h2>
<section>
<div class="cms-main">
<div class="cms-table">
<table>
        <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Book ID</th>
            <th>Book Name</th>
            <th>Quantity</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?php echo $order['user_id']; ?></td>
                <td><?php echo $order['username']; ?></td>
                <td><?php echo $order['book_id']; ?></td>
                <td><?php echo $order['title']; ?></td>
                <td><?php echo $order['quantity']; ?></td>
                <td><form action="order_delete.php" method="post">
                        <input type="hidden" name="id"
                               value="<?php echo $order['id']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
</section>
</body>
</html>


<?php
require('../../model/config.php');

$query = 'SELECT * FROM product ORDER BY id';
$statement = $db->prepare($query);
$statement->execute();
$products = $statement->fetchAll();
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
<h1 class="cms-header">All Books</h2>
<section>
<div class="cms-main">
<div class="cms-table">
<table>
        <tr>
            <th>category</th>
            <th>image</th>
            <th>title</th>
            <th>author</th>
            <th>price</th>
            <th>quantity</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['category']; ?></td>
                <td>
                    <img src="<?php echo $product['img_path']; ?>" height="100px">
                </td>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['author']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td><form action="product_edit_form.php" method="post">
                        <input type="hidden" name="id"
                               value="<?php echo $product['id']; ?>">
                        <input type="submit" value="Edit">
                    </form></td>
                <td><form action="product_delete.php" method="post">
                        <input type="hidden" name="id"
                               value="<?php echo $product['id']; ?>">
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


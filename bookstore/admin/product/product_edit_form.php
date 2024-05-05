<?php
require('../../model/config.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if($id != false){
    $query = 'SELECT * FROM product WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $product = $statement->fetch();
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

<h1 class="cms-header">Edit Book</h2>
<form action="product_edit.php" method="post" id="add_product_form" enctype="multipart/form-data">
<div class="edit-table">
<table class="editTable">
<tr>
        <td>
        <label>Category:</label>
        </td>
        <td>
        <select name="category" id="category" >
        <option <?php if($product['category'] == 'best_seller'){ echo 'selected';}?> value="best_seller">best_seller</option>
        <option <?php if($product['category'] == 'fiction'){ echo 'selected';}?> value="fiction">fiction</option>
        <option <?php if($product['category'] == 'nonfiction'){ echo 'selected';}?> value="nonfiction">nonfiction</option>
        </select><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Title:</label>
        </td>
        <td>
        <input type="text" name="title" value="<?php echo $product['title']; ?>">
        </td>
    </tr>
    <tr>
        <td>
        <label>Author</label>
        </td>
        <td>
        <input type="text" name="author" value="<?php echo $product['author']; ?>">
        </td>
    </tr>
    <tr>
        <td>
        <label>Price:</label>
        </td>
        <td>
        <input type="text" name="price" value="<?php echo $product['price']; ?>">
        </td>
    </tr>
    <tr>
        <td>
        <label>Quantity:</label>
        </td>
        <td>
        <input type="text" name="quantity" value="<?php echo $product['quantity']; ?>">
        </td>
    </tr>
    <tr>
        <td>
        <label>Image:</label>
        </td>
        <td>
        <input type="file" name="file" id="file" accept=".png, .jpg, .jpeg">
        </td>
    </tr>
</table>
<input type="hidden" name="id" value="<?php echo $product['id']; ?>"><br>
<input type="submit" value="Edit" class="editButton"><br>
</body>
</html>

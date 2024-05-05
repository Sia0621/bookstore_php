<?php
$id = $_GET['product_id'];

require('../model/config.php');

$query = "SELECT * FROM product WHERE id = :id";
$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
include '../view/header.php';
?>

<div class="segment"></div>
<div class="book-display">
    <div class="d-left">
        <img src=<?php echo $product['img_path']; ?> height="500px">
    </div>
    <form id="addtocartform" action=<?php
    if (isset($_SESSION['user_id'])) {
        echo "../cart/addtocart.php"."?book_id=".$product['id'];
    } else {
        echo "../login/login.php";
    }
    ?>
    method="post">
        <div class="d-right">
            <div class="d-title">
                <h2><?php echo $product['title']; ?></h2>
            </div>
            <div class="d-author">
                <h4><?php echo 'by '.$product['author']; ?></h4>
            </div>
            <div class="d-price">
                <h4><?php echo '€'.$product['price']; ?></h4>
            </div>
            <div class="d-addtocart">
                <input type="submit" value="Add to cart" name="addtocart" class="addToCartButton">
            </div>

        </div>
    <div class="clear"> </div>
</div>

<?php
include '../view/footer.php'
?>
</body>
</html>

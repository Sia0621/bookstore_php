<?php
$category = $_GET['product_category'];

require('../model/config.php');

$query = "SELECT * FROM product WHERE category = :category";
$statement = $db->prepare($query);
$statement->bindValue(':category', $category);
$statement->execute();
$book = $statement->fetch();
//$statement->closeCursor();
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

<div class="ctgry-Header">
        <h2 style="text-align: center"><?php
            switch ($book['category']) {
                case 'best_seller':
                    echo 'All Bestsellers';
                    break;
                case 'fiction':
                    echo 'General Fiction';
                    break;
                case 'nonfiction':
                    echo 'Non-Fiction';
                    break;
            }
            ?></h2>
    </div>

<div class="book-display">

    <div class="clear"> </div>
    <div class="bsContent2">
        <?php
        $query = "SELECT * FROM product WHERE category = :category";
        $statement = $db->prepare($query);
        $statement->bindValue(':category', $category);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        ?>
        <?php foreach ($products as $product) : ?>
            <div class="ctItem">
                <div class="item-img">
                    <a href="detail.php?product_id=<?php echo $product['id'] ?>">
                        <img src=<?php echo $product['img_path'] ?>  height = "300px">
                    </a>
                </div>
                <div class="item-seg"></div>
                <div class="item-name">
                    <a href="detail.php?product_id=<?php echo $product['id'] ?>">
                        <p><?php echo $product['title'] ?></p>
                    </a>
                </div>
                <div class="item-seg"></div>
                <div class="item-price">
                    <p><?php echo '€'.$product['price'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
</div>

<?php
include '../view/footer.php'
?>
</body>
</html>

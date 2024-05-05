<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
include 'view/header.php';
?>

<!-- Slide -->
<div class="slide-container">
    <div class="slide fade">
        <img src="img/slide1.png" alt='Customers'>
    </div>
    <div class="slide fade">
        <img src="./img/slide2.png" alt='people'>
    </div>
    <div class="slide fade">
        <img src="img/slide3.png" alt='cybers'>
    </div>

    <a href="#" class="prev" title="Previous">&#10094</a>
    <a href="#" class="next" title="Next">&#10095</a>
</div>

<div class="segment"></div>
<div class="book-display">
    <div class="bsHeader">
        <div style="float: left"><h2>Best Sellers</h2></div>
        <div style="float: right"><a href="customer/category.php?product_category=best_seller">See all products</a></div>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
    <div class="bsContent">
        <?php
        require('model/config.php');

        $query = "SELECT * FROM product WHERE category = 'best_seller' ORDER BY RAND() LIMIT 4";
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        ?>
        <?php foreach ($products as $product) : ?>
            <div class="bsItem">
                <div class="item-img">
                    <a href="customer/detail.php?product_id=<?php echo $product['id'] ?>">
                        <img src=<?php echo $product['img_path'] ?>>
                    </a>
                </div>
                <div class="item-seg"></div>
                <div class="item-name">
                    <a href="customer/detail.php?product_id=<?php echo $product['id'] ?>">
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

<div class="book-display">
    <h2 class="adHeader" >Shop Some of Ireland's Greatest Writers</h2>
    <div class="adImg">
        <img src="img/Irish_1200x628-839x439.jpg">
    </div>
</div>


<div class="segment"></div>
<div class="book-display">
    <div class="bsHeader">
        <div style="float: left"><h2>Fiction</h2></div>
        <div style="float: right"><a href="customer/category.php?product_category=fiction">See all products</a></div>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
    <div class="bsContent">
        <?php
        $query = "SELECT * FROM product WHERE category = 'fiction' ORDER BY RAND() LIMIT 4";
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        ?>
        <?php foreach ($products as $product) : ?>
            <div class="bsItem">
                <div class="item-img">
                    <a href="customer/detail.php?product_id=<?php echo $product['id'] ?>">
                        <img src=<?php echo $product['img_path'] ?>  height = "300px">
                    </a>
                </div>
                <div class="item-seg"></div>
                <div class="item-name">
                    <a href="customer/detail.php?product_id=<?php echo $product['id'] ?>">
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

<div class="book-display">
    <div class="bsHeader">
        <div style="float: left"><h2>Nonfiction</h2></div>
        <div style="float: right"><a href="customer/category.php?product_category=nonfiction">See all products</a></div>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
    <div class="bsContent">
        <?php
        $query = "SELECT * FROM product WHERE category = 'nonfiction' ORDER BY RAND() LIMIT 4";
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        ?>
        <?php foreach ($products as $product) : ?>
            <div class="bsItem">
                <div class="item-img">
                    <a href="customer/detail.php?product_id=<?php echo $product['id'] ?>">
                        <img src=<?php echo $product['img_path'] ?>  height = "300px">
                    </a>
                </div>
                <div class="item-seg"></div>
                <div class="item-name">
                    <a href="customer/detail.php?product_id=<?php echo $product['id'] ?>">
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

<!-- Brief descirption about company -->
<div class="homeaboutus">
    <img src="img/bookstore.jpg" alt="bookstore" style="width:40%; float: left;">
    <div class="homeaboutus-article">
        <article>
            <h2>About us</h2>
            <p>Welcome to Chapters Bookstore, your literary haven where every page holds a new adventure and every bookshelf whispers tales of imagination. At Chapters Bookstore, we believe that every reader deserves to embark on a journey of discovery through the pages of a book. With a vast collection spanning genres from classics to contemporary bestsellers, our bookstore is a treasure trove waiting to be explored.</p>
            <p>Our knowledgeable staff is here to guide you, offering personalized recommendations and helping you find the perfect book to accompany you on your literary voyage. From cozy reading corners to vibrant community events, Chapters Bookstore is more than just a place to buy books — it's a gathering space for book lovers to connect, share, and celebrate the magic of storytelling.</p>

        </article>
    </div>
    <!-- Solve the problem that div have no height because of float -->
    <div class="clear"> </div>
</div>

<?php
include 'view/footer.php'
?>

<!-- The script control the slide to turn page manually or automatically -->
<script src="inner.js"></script>
</body>
</html>
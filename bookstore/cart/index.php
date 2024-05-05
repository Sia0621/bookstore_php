<?php
$subtotal = 0;
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
    <h2 style="text-align: center">Shopping Cart</h2>
</div>

<form action="addtoorder.php" method="post" id="add_order_form">
<div class="cart-main">
    <div class="cart-table">
        <table>
            <tr>            
                <th colspan="2">PRODUCT</th>
                <th style="width:20%">PRICE</th>
                <th style="width:10%">QUANTITY</th>
                <th style="width:10%"></th>
                <th style="width:10%">TOTAL</th>

            </tr>
            <?php if (isset($_SESSION['books'])){ ?>
                <?php foreach ($_SESSION['books'] as $book) :?>
                <?php $subtotal += (float)$book['price'] * $book['num']; ?>
                    <tr>
                        <td>
                            <div class="cart-img">
                                <img src=<?php echo $book['img_path']?> height="200px">
                            </div>
                            <div class="clear"> </div>
                        </td>
                        <td>
                            <div class="cart-title">
                                <?php echo $book['title']?>
                            </div>
                        </td>
                        <td><p class="cart_price"><?php echo '€'.$book['price']?></p></td>
                        <td>
                            <div style="float: left; margin-left:20%">
                                <a href="substract.php?a_id=<?php echo $book['id'];?>" class="cartButton">-</a>
                            </div>
                            <div style="float: left; padding-left:10%;padding-right:10%">
                                <p class="cart_qty"><?php echo $book['num']?></p>
                            </div>
                            <div style="float: left">
                                <a href="add.php?a_id=<?php echo $book['id'];?>" class="cartButton">+</a>
                            </div>
                        </td>
                        <td>
                            <div style="float: left; margin-left:50%">
                                 <a href=<?php echo "delete.php?cart_id=".$book['id']?> class="cartButton">Delete</a>
                            </div>    
                        </td>
                            <td><?php echo '€'.number_format((float)$book['price'] * $book['num'], 2, '.', '')?> </td>
                    </tr>
                <?php endforeach; ?>
            <?php } ?>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>SUBTOTAL</td>
                <td><?php echo '€'.number_format($subtotal, 2, '.', ''); ?></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="CHECK OUT" class="submitbutton"></td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>

<?php session_start(); ?>

<header>
    <!-- Users can click title to return to homepage -->
    <a href="/bookstore/index.php"><h1>CHAPTERS BOOKSTORE</h1></a>
</header>
<!-- Navigation -->
<nav>
    <ul>
        <li><a href="/bookstore/index.php">Home</a></li>
        <li><a href="/bookstore/customer/category.php?product_category=best_seller">Best Sellers</a></li>
        <li><a href="/bookstore/customer/category.php?product_category=fiction">Fiction</a></li>
        <li><a href="/bookstore/customer/category.php?product_category=nonfiction">Non-Fiction</a></li>
        <li><a href="/bookstore/customer/contactus.php">Contact us</a></li>
        <?php
        if(isset($_SESSION['user_name'])){
            echo '<li style="float:right"><a href="/bookstore/cart/index.php">Cart</a></li>';
            echo '<li style="float:right"><a href="/bookstore/login/logout.php">Logout</a></li>';
            echo '<li style="float:right"><a href="/bookstore/customer/account.php">'.$_SESSION['user_name'].'</a></li>';
        }else{
            echo '<li style="float:right"><a href="/bookstore/login/register.php">Sign up</a></li>';
            echo '<li style="float:right"><a href="/bookstore/login/login.php">Log in</a></li>';
        }
        ?>
    </ul>
</nav>

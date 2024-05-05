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
<body class="cmsLeft">
<nav class="cmsNav">
    <ul>
        <li><a href="right.php" target="right">Dashboard</a></li>
    <h4>Users</h4>
        <li><a href="user/index.php" target="right">All Users</a></li>
        <li><a href="user/user_add_form.php" target="right">Add Admin</a></li>
    <h4>Books</h4>
        <li><a href="product/index.php" target="right">All Books</a></li>
        <li><a href="product/product_add_form.php" target="right">Add Books</a></li>
    <h4>Orders</h4>
        <li><a href="order/index.php" target="right">All Orders</a></li>
    <h4>Messages</h4>
        <li><a href="message/index.php" target="right">All Messages</a></li>
        <li style="padding-top: 15px;padding-left: 3px;color: #d2ecff;">
            <b><a href="../login/logout.php" target="_parent" onclick="return confirm('Comfirm logout?')">Log out</a></b>
        </li>
    </ul>
</nav>

</body>
</html>

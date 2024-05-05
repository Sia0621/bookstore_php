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

<h1 class="cms-header">Add Admin</h2>
<form action="user_add.php" method="post" id="add_product_form">
<div class="edit-table">
<table class="editTable">
<tr>
        <td>
        <label>Name:</label>
        </td>
        <td>
        <input type="text" name="name"><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Password:</label>
        </td>
        <td>
        <input type="text" name="password"><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Email:</label>
        </td>
        <td>
        <input type="text" name="email"><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Address:</label>
        </td>
        <td>
        <input type="text" name="address"><br>
        </td>
    </tr>
</table>
<input type="submit" value="Add Admin" class="editButton"><br>
</div>
</body>
</html>


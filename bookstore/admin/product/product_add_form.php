<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../style.css">
    <title>Document</title>
</head>
<body>

<h1 class="cms-header">Add Book</h2>
<form action="product_add.php" method="post" id="add_product_form" enctype="multipart/form-data">
<div class="edit-table">
<table class="editTable">
<tr>
        <td>
        <label>Category:</label>
        </td>
        <td>
        <select name="category" id="category">
        <option value="best_seller">best_seller</option>
        <option value="fiction">fiction</option>
        <option value="nonfiction">nonfiction</option>
        </select><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Title:</label>
        </td>
        <td>
        <input type="text" name="title">
        </td>
    </tr>
    <tr>
        <td>
        <label>Author</label>
        </td>
        <td>
        <input type="text" name="author"><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Price:</label>
        </td>
        <td>
        <input type="text" name="price"><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Quantity:</label>
        </td>
        <td>
        <input type="text" name="quantity"><br>
        </td>
    </tr>
    <tr>
        <td>
        <label>Image:</label>
        </td>
        <td>
        <input type="file" name="file" id="file" accept=".png, .jpg, .jpeg"><br>
        </td>
    </tr>
</table>
<input type="submit" value="Add Book" class="editButton"><br>
</div>
</body>
</html>


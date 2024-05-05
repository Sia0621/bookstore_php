<?php
// Get the data
$id = filter_input(INPUT_POST, 'id');
$category = filter_input(INPUT_POST, 'category');
$title = filter_input(INPUT_POST, 'title');
$author = filter_input(INPUT_POST, 'author');
$price = filter_input(INPUT_POST, 'price');
$quantity = filter_input(INPUT_POST, 'quantity');

if ($category == null || $title == null || $author == null || $price == null || $quantity == null) {
    $error = "Invalid data. Check all fields and try again.";
    include('../../errors/error.php');
} else {
    $filename = '/bookstore/img/'.$_FILES["file"]["name"];
    if(file_exists($filename))
    {
        echo "The file already exists.";
    }
    else{
        move_uploaded_file($_FILES["file"]["tmp_name"], '../../img/'. $_FILES["file"]["name"]);
        require('../../model/config.php');
        // Add the product to the database
        $query = 'UPDATE product SET category = :category, title = :title, author = :author, price = :price, quantity = :quantity, img_path = :img_path WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':category', $category);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':img_path', $filename);
        $statement->execute();
        $statement->closeCursor();
    }
// Display the Product List page
    include('index.php');
}
?>




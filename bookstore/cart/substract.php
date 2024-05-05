<?php
session_start();

$id = $_GET['a_id'];

//book number in cart must be greater than or equal to 1
if($_SESSION['books'][$id]['num'] > 1){
    $_SESSION['books'][$id]['num']--;
}else{
    $_SESSION['books'][$id]['num'] = 1;
}

header('location:index.php');
?>


<?php
session_start();

$_SESSION=array();

session_destroy();

setcookie('PHPSESSID', '', time() - 3600, '/');

header('Location: /bookstore/index.php');
//header('Location:'.$_SERVER['DOCUMENT_ROOT'].'/index.php');

exit;

?>
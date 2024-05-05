<?php
session_start();

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$response = $_POST['g-recaptcha-response'];
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_secret = '6Lf7bNEpAAAAAK1wvnbIO-AKLYbCmzpTvEcWDZCs';

$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $response);
$recaptcha = json_decode($recaptcha, true);

if($recaptcha['success'] == 1){
    if ($username != null && $password != null) {
        require('../model/config.php');
        $query = 'SELECT * FROM user WHERE username = :username AND password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        echo $statement->rowCount();
        $user = $statement->fetch();
        $statement->closeCursor();
    
        echo $user['username'];
        echo $user['password'];
    
        if ($user['username'] == $username && $user['password'] == $password) {
            if ($user['isadmin'] == 1) {
                $_SESSION['admin_name'] = $user['username'];
                $_SESSION['admin_id'] = $user['id'];
                header("Location:../admin/index.php");
                exit;
            }
            if ($user['isadmin'] == 0) {
                $_SESSION['user_name'] = $user['username'];
                $_SESSION['user_id'] = $user['id'];
                header("Location:/bookstore/index.php");
                exit;
            }
        } else{
            header("Location:login.php?err=1");
        }
    } else {
        header("Location:login.php?err=2");
    }
}else{
    header("Location:login.php?err=3");
}

?>
<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$re_password = filter_input(INPUT_POST, 're_password');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');

$response = $_POST['g-recaptcha-response'];
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_secret = '6Lf7bNEpAAAAAK1wvnbIO-AKLYbCmzpTvEcWDZCs';

$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $response);
$recaptcha = json_decode($recaptcha, true);

if($recaptcha['success'] == 1){
    if ($password == $re_password) {
        require_once('../model/config.php');
        $query_select = 'SELECT * FROM user WHERE username = :username';
        $statement = $db->prepare($query_select);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $user = $statement->fetch();
    
        if ($username == $user['username']) {
            header("Location:register.php?err=1");
        } else {
            $query_insert = 'INSERT INTO user
        (username, password, email, address, isadmin) VALUES
        (:username, :password, :email, :address, 0)';
            $statement = $db->prepare($query_insert);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':address', $address);
            $statement->execute();
            header("Location:register.php?err=3");
        }
        $statement->closeCursor();
    } else {
        header("Location:register.php?err=2");
    }
}else{
    header("Location:register.php?err=4");
}
 ?> 

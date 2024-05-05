<?php
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$subject = filter_input(INPUT_POST, 'subject');
$message = filter_input(INPUT_POST, 'message');

$response = $_POST['g-recaptcha-response'];
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_secret = '6Lf7bNEpAAAAAK1wvnbIO-AKLYbCmzpTvEcWDZCs';

$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $response);
$recaptcha = json_decode($recaptcha, true);

if($recaptcha['success'] == 1){
    if ($name != null && $email != null && $subject != null && $message != null) {
        require_once('../model/config.php');
        $query_insert = 'INSERT INTO message
        (name, email, subject, message) VALUES
        (:name, :email, :subject, :message)';
        $statement = $db->prepare($query_insert);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':subject', $subject);
        $statement->bindValue(':message', $message);
        $statement->execute();
        $statement->closeCursor();
        header("Location: contactus.php?message_err=1");
    } else {
        header("Location:contactus.php?message_err=2");
    }
}else{
    header("Location:contactus.php?message_err=3");
}

?>

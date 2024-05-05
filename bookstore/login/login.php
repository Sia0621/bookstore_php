<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head>
<body>
<?php
include '../view/header.php'
?>
<div id="bigBoxLogin" class="bigBox">
    <h1>Log in</h1>

    <form id="loginform" action="loginaction.php" method="post">
        <div class="inputBox">
            <div class="inputText">
                <input type="text" id="name" name="username" placeholder="Username" value="">
            </div>
            <div class="inputText">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <br >
            <div class="g-recaptcha" data-sitekey="6Lf7bNEpAAAAAAh0gSnxn-lOvHinH-GUcde1Kyr_"></div>
            <div style="color: white;font-size: 12px" >
                <?php
                $err = isset($_GET["err"]) ? $_GET["err"] : "";
                switch ($err) {
                    case 1:
                        echo "Username or password incorrect!";
                        break;

                    case 2:
                        echo "Username or password cannot be empty!";
                        break;

                    case 3:
                        echo "This field is required!";
                        break;
                } ?>
            </div>
        </div>
        <div>
            <input type="submit" id="login" name="login" value="LOG IN" class="loginButton m-left">
        </div>
</div>
</div>
</form>
</body>
</html>

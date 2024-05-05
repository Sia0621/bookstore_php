<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="content-type"; charset="UTF-8">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<?php
include '../view/header.php'
?>
<div id="bigBoxRegister" class="bigBox">
    <h1>Register</h1>


    <form action="registeraction.php" method="post">
        <div class="inputBox">

            <div class="inputText">
                <input type="text" id="id_name" name="username" required="required" placeholder="Username">
            </div>
            <div class="inputText">
                <input type="password" id="password" name="password" required="required" placeholder="Password">
            </div>
            <div class="inputText">
                <input type="password" id="re_password" name="re_password" required="required" placeholder="Confirm Password">
            </div>
            <div class="inputText">
                <input type="email" id="email" name="email" required="required" placeholder="Email">
            </div>
            <div class="inputText">
                <input type="text" id="address" name="address" required="required" placeholder="Address">
            </div>
            <br>
            <div class="g-recaptcha" data-sitekey="6Lf7bNEpAAAAAAh0gSnxn-lOvHinH-GUcde1Kyr_"></div>
            <div style="color: white;font-size: 12px" >
                <?php
                $err = isset($_GET["err"]) ? $_GET["err"] : "";
                switch ($err) {
                    case 1:
                        echo "Username already exists!";
                        break;

                    case 2:
                        echo "Password and confirm password do not match!";
                        break;

                    case 3:
                        echo "Register successful!";
                        break;
                        
                    case 4:
                        echo "This field is required！";
                        break;
                }
                ?>
            </div>
        </div>
        <div>
            <input type="submit" id="register" name="register" value="REGISTER" class="loginButton m-left">
        </div>
    </form>
</div>
</body>
</html>

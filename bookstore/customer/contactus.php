<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact us</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<?php
include '../view/header.php'
?>

<div class="ctgry-Header">
    <h2 style="text-align: center">Contact Us</h2>
</div>

<div id="contactrow">
    <!-- page is divided into two columns -->
    <div id="leftcolumn">
        <h2 class="heading">Chapters Bookstore</h2>
        <!-- Table makes layout more neat -->
        <table>
            <tr>
                <td valign="top" class="orange"><b>&#8962</b></td>
                <td>21, Marian Place,<br>
                    Mardyke Walk,<br>
                    Cork. T12FT45,<br>
                    Co.Cork.<br></td>
            </tr>
            <tr>
                <td class="orange"><b>&#8481</b></td>
                <td><a href="tel:089 2760187" class="contact_link">089 1234567</a></td>
            </tr>
            <tr>
                <td class="orange"><b>&#9993</b></td>
                <td><a href="mailto:chaptersbookstore@google.com" class="contact_link">chaptersbookstore@google.com</a></td>
            </tr>
            <tr>
                <td class="orange"><b>in</b></td>
                <!-- links to external resources -->
                <td><a href="https://www.linkedin.com/in/siyang-fan-70578a2a0/" class="contact_link">Linkedin</a></td>
            </tr>
        </table>
        <img id="contact-us-image" src="../img/contact-us-image.png" alt="contact-us-image">
    </div>

    <div id="rightcolumn">
        <h2 class="heading">Send us a message</h2>
        <!-- a division contains user's information -->
        <form action="contactaction.php" method="post">
            <div class="sendinfo">
                <label for="name" class="infotitle">Name</label><br>
                <input type="text" id="name" name="name" class="infoinput"><br>
                <label for="email" class="infotitle">Email</label><br>
                <input type="text" id="email" name="email" class="infoinput"><br>
                <label for="subject" class="infotitle">Subject</label><br>
                <input type="text" id="subject" name="subject" class="infoinput"><br>
                <label for="message" class="infotitle">Message</label><br>
                <textarea type="text" id="message" name="message" class="infomessage"></textarea><br>
                <div style="margin-top:20px" class="g-recaptcha" data-sitekey="6Lf7bNEpAAAAAAh0gSnxn-lOvHinH-GUcde1Kyr_"></div>
            </div>
        <div style="color: #7FCAFF;font-size: 20px" >
            <?php
            $err = isset($_GET["message_err"]) ? $_GET["message_err"] : "";
            switch ($err) {
                case 1:
                    echo "Your message has been submitted.";
                    break;

                case 2:
                    echo "Input cannot be empty!";
                    break;

                case 3:
                    echo "This field is required!";
                    break;
            } ?>
        </div>
            <input type="submit" value="Submit" name="submitMessage" class="submitbutton">
        </form>
    </div>
</div>
<?php
require('../../model/config.php');

$query = 'SELECT * FROM message ORDER BY id';
$statement = $db->prepare($query);
$statement->execute();
$messages = $statement->fetchAll();
$statement->closeCursor();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../style.css">
    <title>Document</title>
</head>
<body>
<h1 class="cms-header">All Messages</h2>
<section>
<div class="cms-main">
<div class="cms-table">
<table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th >Message</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($messages as $message) : ?>
            <tr>
                <td><?php echo $message['name']; ?></td>
                <td><?php echo $message['email']; ?></td>
                <td><?php echo $message['subject']; ?></td>
                <td><?php echo $message['message']; ?></td>
                <td><form action="message_delete.php" method="post">
                        <input type="hidden" name="id"
                               value="<?php echo $message['id']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
</section>
</body>
</html>


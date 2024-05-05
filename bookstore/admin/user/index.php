<?php
require('../../model/config.php');

$queryUsers = 'SELECT * FROM user ORDER BY id';
$statement = $db->prepare($queryUsers);
$statement->execute();
$users = $statement->fetchAll();
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
    <h1 class="cms-header">All Users</h2>
<section>
<div class="cms-main">
<div class="cms-table">
<table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>isAdmin</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['address']; ?></td>
                <td><?php echo $user['isadmin']; ?></td>
                <td><form action="user_edit_form.php" method="post">
                        <input type="hidden" name="user_id"
                               value="<?php echo $user['id']; ?>">
                        <input type="submit" value="Edit">
                    </form></td>
                <td><form action="user_delete.php" method="post">
                        <input type="hidden" name="user_id"
                               value="<?php echo $user['id']; ?>">
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


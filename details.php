<?php
session_start()


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Account Information</h2>
    <p><strong>User ID:</strong> <?php echo $_SESSION['cid']; ?></p>
    <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
    <p><strong>First Name:</strong> <?php echo $_SESSION['fname']; ?></p>
    <p><strong>Last Name:</strong> <?php echo $_SESSION['lname']; ?></p>
</body>
</html>
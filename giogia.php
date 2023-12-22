<?php
    include('database.php');
    $password = "abd1malikkk";
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


    $sql = "INSERT INTO administrator (fname,lname,email,password,phoneno) VALUES ('Abdullah','Waqar','abdullahwaqar29august@gmail.com',''"
?>
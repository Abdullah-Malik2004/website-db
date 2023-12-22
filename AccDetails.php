<?php
session_start(); // Start the session

// Check if user_id is set in the session
if (isset($_SESSION['loggedin'])) {
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="stylesheet" href="border.css">
    <link rel="icon" href="headerCOSMOS.png">

</head>
<body>
    
    <a href="main.php">
        <div class = 'logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>

    <div class="myorders">
        <label for="myorders"> My Orders </label>
        <br>
        <a href ="details.php" > Account Information </a>
        
    </div>
    <br>
    <div class="logout">
        <a href="logout.php"> Logout </a>
    </div>


    

</body>
</html>
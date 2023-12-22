<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:signIn.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="stylesheet" href="border.css">
    <link rel="stylesheet" href="details.css">
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

    
    <div class="border">
        <div class="acc">
            <h1>Account Details</h1>
        </div>
        
        <div class="info">
            <p><strong>User ID:</strong> <?php echo $_SESSION['cid']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            <p><strong>First Name:</strong> <?php echo $_SESSION['fname']; ?></p>
            <p><strong>Last Name:</strong> <?php echo $_SESSION['lname']; ?></p>
        </div>
    </div>
    
    <br>

    <div class="orders border">
        <div class="acc">
            <h1>Your Orders</h1>
        </div>
        <div class="both">
            <div class="pending">
            <ul>
                <li class="pen" onclick="showPen()">Pendings</li>
                <li class="pen" onclick="showRec()">Received</li>
            </ul>

            </div>
        </div>
    </div>

    <div class="logout">
        <input type="submit" value="Logout" onclick='logout()'>
    </div>

    <script>
        function logout()
        {
            window.location.href = 'logout.php';
        }
        function showPen()
        {
            
        }
        function showRec()
        {

        }
    </script>
    

</body>
</html>